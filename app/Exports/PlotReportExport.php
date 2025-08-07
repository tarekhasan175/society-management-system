<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;
use Module\Society\Models\Block;

class PlotReportExport implements FromView, WithStyles, WithHeadings, WithEvents
{
    public function view(): View
    {
        $blocks = Block::orderBy('blockName', 'asc')->get();


        $roadCounts = DB::table('roads')
            ->select('block_name_id', DB::raw('count(*) as count'))
            ->groupBy('block_name_id')
            ->pluck('count', 'block_name_id');


        $plotCounts = DB::table('plots')
            ->select('block_id', DB::raw('count(*) as count'))
            ->groupBy('block_id')
            ->pluck('count', 'block_id');


        $buildingCounts = DB::table('house_or_building')
            ->select('block_id', DB::raw('count(*) as count'))
            ->groupBy('block_id')
            ->pluck('count', 'block_id');

        $flatCounts = DB::table('house_or_building')
            ->select('block_id', DB::raw('sum(totalFlat) as total_flat'))
            ->groupBy('block_id')
            ->pluck('total_flat', 'block_id')->toArray();


        // $completeFlatCounts = DB::table('house_or_building')
        //     ->select('block_id', DB::raw('sum(totalFlat) as total_flat'))
        //     ->where('houseStatus', 'building')
        //     ->groupBy('block_id')
        //     ->pluck('total_flat', 'block_id')
        //     ->toArray();



        $completeFlatCounts = DB::table('flats')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', '!=', 7)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');




        // dd($completeFlatCounts);


        // Step 1: Fetch the concatenated strings for `house_or_building`.
        // $housesArrayString = DB::table('house_or_building')
        //     ->select(DB::raw('CONCAT(block_id, "-", road_id, "-", plot_id) as house_id'))
        //     ->pluck('house_id')
        //     ->toArray();


        // $pendingPlotsCounts = [];
        // $plotsArrayString = DB::table('plots')
        //     ->select('block_id', 'road_id', 'id')
        //     ->whereNotNull('ownerName')
        //     ->where('ownerName', '!=', '')
        //     ->get()
        //     ->each(function ($plot) use (&$pendingPlotsCounts, $housesArrayString) {
        //         $plotKey = $plot->block_id . ' ' . $plot->road_id . ' ' . $plot->id;
        //         $pendingPlotsCounts[$plot->block_id] = !in_array($plotKey, $housesArrayString)
        //             ? ($pendingPlotsCounts[$plot->block_id] ?? 0) + 1
        //             : ($pendingPlotsCounts[$plot->block_id] ?? 0);
        //     });

        //     dd($pendingPlotsCounts);



        // Step 1: Fetch all houses and create a unique string to identify them
        $housesArrayString = DB::table('house_or_building')
            ->select(DB::raw('CONCAT(block_id, "-", road_id, "-", plot_id) as house_id'))
            ->pluck('house_id')
            ->toArray();

        // Step 2: Fetch all plots with valid owner names
        $plots = DB::table('plots')
            ->select('block_id', 'road_id', 'id', 'ownerName')
            ->whereNotNull('ownerName')
            ->where('ownerName', '!=', '')
            ->get();

        // Step 3: Calculate pending plots by comparing houses and plots
        $pendingPlotsCounts = [];
        foreach ($plots as $plot) {
            // Create a key for the plot
            $plotKey = "{$plot->block_id}-{$plot->road_id}-{$plot->id}";

            // Initialize the block's count if not already set
            if (!isset($pendingPlotsCounts[$plot->block_id])) {
                $pendingPlotsCounts[$plot->block_id] = 0;
            }

            // Increment count if the plot is not linked to any house
            if (!in_array($plotKey, $housesArrayString)) {
                $pendingPlotsCounts[$plot->block_id]++;
            }
        }



        $pendingPlotsCounts = DB::table('plots')
            ->whereRaw('CONCAT(block_id, "-", road_id, "-", id) NOT IN ("' . implode('","', $housesArrayString) . '")')
            ->whereNotNull('ownerName')
            ->where('ownerName', '!=', '')
            ->select('block_id', DB::raw('count(*) as count'))
            ->groupBy('block_id')
            ->pluck('count', 'block_id')
            ->toArray();





        $underConstructionCount = DB::table('house_or_building')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', 7)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');




        // $vacantPlotCounts = DB::table('plots')
        //     ->whereNotIn(DB::raw('CONCAT(block_id, " ", road_id, " ", id)'), $housesArrayString)
        //     ->select('block_id', DB::raw('count(*) as count'))
        //     ->groupBy('block_id')
        //     ->pluck('count', 'block_id')
        //     ->toArray();

        // Step 2: Filter plots that are not in the list and count vacant plots by `block_id`.
        $vacantPlotCounts = DB::table('plots')
            ->whereRaw('CONCAT(block_id, "-", road_id, "-", id) NOT IN ("' . implode('","', $housesArrayString) . '")')
            ->select('block_id', DB::raw('count(*) as count'))
            ->groupBy('block_id')
            ->pluck('count', 'block_id')
            ->toArray();


        // dd($vacantPlotCounts);

        $undefinedPlotCounts = DB::table('plots')
            ->whereNull('ownerName')
            ->orWhere('ownerName', '')
            ->select('block_id', DB::raw('count(*) as count'))
            ->groupBy('block_id')
            ->pluck('count', 'block_id')
            ->toArray();

        $storyCounts = DB::table('house_or_building')
            ->select('block_id', DB::raw('sum(storey) as total_storey'))
            ->groupBy('block_id')
            ->pluck('total_storey', 'block_id')
            ->toArray();

        $storeyCounts = DB::table('house_or_building')
            ->select('block_id', 'storey', DB::raw('count(*) as count'))
            ->groupBy('block_id', 'storey')
            ->get()
            ->groupBy('block_id')
            ->map(function ($items) {
                return $items->pluck('count', 'storey');
            });




        $tinShadeCount = DB::table('house_or_building')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', 8)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');


        // Count residential flats
        $residentialFlatCount = DB::table('flats')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', 1)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');


        // Count commercial flats
        $commercialFlatCount = DB::table('flats')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', 2)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');


        // Count uc flats
        $flatCountsUnderConstruction = DB::table('flats')
            ->select('block_id', DB::raw('count(*) as count'))
            ->where('usage_type_id', 7)
            ->groupBy('block_id')
            ->pluck('count', 'block_id');


        // $flatCountsUnderConstruction = DB::table('house_or_building')
        //     ->select('block_id', DB::raw('sum(totalFlat) as total_flat'))
        //     ->where('usage_type_id', 7)
        //     ->groupBy('block_id')
        //     ->pluck('total_flat', 'block_id')->toArray();



        return view('Society::report.download_plot_report', compact(
            'blocks',
            'roadCounts',
            'plotCounts',
            'buildingCounts',
            'flatCounts',
            'pendingPlotsCounts',
            'vacantPlotCounts',
            'underConstructionCount',
            'undefinedPlotCounts',
            'storyCounts',
            'storeyCounts',
            'tinShadeCount',
            'completeFlatCounts',
            'residentialFlatCount',
            'commercialFlatCount',
            'flatCountsUnderConstruction',
        ));
    }


    public function headings(): array
    {
        return [
            [],
        ];
    }

    public function styles(Worksheet $sheet)
    {

        $blocks = Block::orderBy('blockName', 'asc')->get();
        $headerHeight = 50;
        $sheet->getRowDimension(1)->setRowHeight($headerHeight);
        $dynamicColumns = range('A', 'B');
        $blockColumnStart = 'C';
        $blockColumnEnd = chr(ord($blockColumnStart) + count($blocks) - 1);

        foreach (array_merge($dynamicColumns, range($blockColumnStart, $blockColumnEnd)) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
            2 => ['font' => ['bold' => true]],
            'A1:J1' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => 'F0F8FF'],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
            ],
            'A:A' => ['font' => ['bold' => true]],
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastRow = $sheet->getHighestRow();
                $lastColumn = $sheet->getHighestColumn();
                $sheet->mergeCells("A1:{$lastColumn}1");
                $range = 'A1:' . $lastColumn . $lastRow;

                // Apply border style
                $sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Center align cells from B to M
                $sheet->getStyle('B1:M' . $lastRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Right align text in column A from row 8 to 31 and 34 to 35, set font size to 9px
                $sheet->getStyle('A8:A31')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                    'font' => [
                        'size' => 9,
                    ],
                ]);

                $sheet->getStyle('A34:A35')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                    'font' => [
                        'size' => 9,
                    ],
                ]);

                // Center align cell A1
                $sheet->getStyle('A1')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Set page orientation to landscape
                $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                // Set the last column width to 200px
                $lastColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($lastColumn);
                $sheet->getColumnDimensionByColumn($lastColumnIndex)->setWidth(20);

                // Center align all items in the last column
                $sheet->getStyle($lastColumn . '1:' . $lastColumn . $lastRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $sheet->freezePane('A3');
            }
        ];
    }
}
