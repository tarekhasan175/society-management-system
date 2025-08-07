<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class FlatinfoExport implements FromView, WithStyles
{
    protected $flats;
    protected $companies;

    public function __construct($flats, $companies)
    {
        $this->flats = $flats;
        $this->companies = $companies;
    }

    public function view(): View
    {
        // Group flats by Block Name, Road Name, and Plot/House Name
        $flats = $this->flats->groupBy(function ($flat) {
            return optional($flat->getblock)->blockName .
                   optional($flat->road)->roadName .
                   optional($flat->getplot)->plotName;
        });

        // Flatten the grouped flats and assign serial numbers
        $flatData = [];
        $serial = 1;
        foreach ($flats as $flatGroup) {
            // Sort each group by flatID in descending order
            $flatGroup = $flatGroup->sortByDesc('flatID');
            foreach ($flatGroup as $flat) {
                $flat->serial = $serial; // Assign the same serial to all flats in this group
                $flatData[] = $flat; // Add the flat to the final array
            }
            $serial++; // Increment serial for the next group
        }

        return view('flat.flatexport', [
            'flats' => $flatData,
            'companies' => $this->companies
        ]);
    }

    // Using the WithStyles concern to set column widths manually and apply left alignment
    public function styles(Worksheet $sheet)
    {
        // Set width for all columns based on your table structure
        $sheet->getColumnDimension('A')->setWidth(10); // Serial
        $sheet->getColumnDimension('B')->setWidth(20); // Flat ID
        $sheet->getColumnDimension('C')->setWidth(15); // Block Name
        $sheet->getColumnDimension('D')->setWidth(15); // Road Name
        $sheet->getColumnDimension('E')->setWidth(20); // Plot/House Name
        $sheet->getColumnDimension('F')->setWidth(10); // Storey
        $sheet->getColumnDimension('G')->setWidth(10); // Total Unit
        $sheet->getColumnDimension('H')->setWidth(15); // Flat Name
        $sheet->getColumnDimension('I')->setWidth(30); // Owner Name
        $sheet->getColumnDimension('J')->setWidth(20); // Owner Contact No
        $sheet->getColumnDimension('K')->setWidth(30); // Tenant Name
        $sheet->getColumnDimension('L')->setWidth(20); // Tenant Contact No
        $sheet->getColumnDimension('M')->setWidth(15); // Type Name
        $sheet->getColumnDimension('N')->setWidth(15); // Society Member ID
        $sheet->getColumnDimension('O')->setWidth(10); // Amount
        $sheet->getColumnDimension('P')->setWidth(15); // Total Due
        $sheet->getColumnDimension('Q')->setWidth(10); // Advance
        $sheet->getColumnDimension('R')->setWidth(25); // Remarks

        // Set left alignment for all columns except the company info row (A1:R1)
        foreach (range('A', 'R') as $column) {
            $sheet->getStyle($column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        }

        // Center-align the company info in the header (first row)
        $sheet->mergeCells('A1:R1'); // Merge the header cells for company info
        $sheet->getStyle('A1:R1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:R1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    }
}
