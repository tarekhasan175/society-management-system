<?php

namespace Module\Society\Controllers;

use PDF;
use App\Models\Month;
use App\Models\Company;
use Illuminate\Http\Request;
use Module\Society\Models\Flat;
use Module\Society\Models\Year;
use App\Http\Controllers\Controller;
use Module\Society\Models\Block;
use Module\Society\Models\UsageType;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\Plot;
use Module\Society\Models\Road;
use App\Exports\PlotReportExport;
use Maatwebsite\Excel\Facades\Excel;


class reportController extends Controller
{
    private $service;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct() {}












    public function report()
    {
        $years                  = Year::orderBy('id', 'desc')->get();
        $months                 = Month::all()->unique('name');
        $bills                  = Flat::all()
            ->unique('block_id')
            ->sortBy('block_id')
            ->values();
        $blocks                 = Block::all();
        $usageTypes             = UsageType::all();

        $data = [
            'years'             => $years,
            'months'            => $months,
            'bills'             => $bills,
            'blocks'            => $blocks,
            'usageTypes'        => $usageTypes,
        ];

        return view('report.report', $data);
    }

















    public function exportPlotReport()
    {
        return Excel::download(new PlotReportExport, 'plot_report.xlsx');
    }













    public function getRoadInfoByBlock($blockName)
    {
        $flats = Flat::where('block_id', $blockName)
            ->with('road')
            ->get()
            ->unique('road_id');

        return response()->json($flats);
    }






    

    public function getPlotInfoByRoad($roadName)
    {
        $flats = Flat::where('road_id', $roadName)
            ->with('plot')
            ->get()
            ->unique('plotID');

        return response()->json($flats);
    }
















    public function filteredBill(Request $request)
    {
        $query = GenerateBill::query();

        if ($request->has('year') && $request->year) {
            $query->where('year_id', $request->year);
        }

        if ($request->has('month') && $request->month) {
            $query->where('month_id', $request->month);
        }

        if ($request->has('block') && $request->block) {
            $query->where('block_id', $request->block);
        }

        if ($request->has('road') && $request->road) {
            $query->where('road_id', $request->road);
        }

        if ($request->has('plot') && $request->plot) {
            $query->where('plot_id', $request->plot);
        }

        if ($request->has('usageType') && $request->usageType) {
            $query->where('usage_type_id', $request->usageType);
        }


        $data = [
            'generateBills' => $query->get(),
            'years'         => Year::latest('id')->get(),
            'months'        => Month::all()->unique('name'),
            'bills'         => Flat::all()->unique('block_id')->sortBy('block_id')->values(),
            'blocks'        => Block::all(),
            'usageTypes'    => UsageType::all(),
        ];

        return view('report.report', $data);
    }














    public function printInfo(Request $request)
    {
        $searchingYear          = $request->query('year');
        $searchingMonth         = $request->query('month');
        $searchingBlock         = $request->query('block');
        $searchingRoad          = $request->query('road');
        $searchingPlot          = $request->query('plot');
        $searchingusageType     = $request->query('usageType');

        $year                   = Year::where('id', $searchingYear)->first();
        $month                  = Month::where('id', $searchingMonth)->first();
        $block                  = Block::where('id', $searchingBlock)->first();
        $road                   = Road::where('id', $searchingRoad)->first();
        $plot                   = Plot::where('id', $searchingPlot)->first();
        $usageType              = UsageType::where('id', $searchingusageType)->first();


        $query                  = GenerateBill::with(['roads', 'block', 'flat', 'plot', 'month', 'year', 'gettype']);


        if (!empty($searchingYear)) {

            $query->where('year_id', $searchingYear);
        }
        if (!empty($searchingMonth)) {
            $query->where('month_id', $searchingMonth);
        }
        if (!empty($searchingBlock)) {
            $query->where('block_id', $searchingBlock);
        }
        if (!empty($searchingRoad)) {
            $query->where('road_id', $searchingRoad);
        }
        if (!empty($searchingPlot)) {
            $query->where('plot_id', $searchingPlot);
        }
        if (!empty($searchingusageType)) {
            $query->where('usage_type_id', $searchingusageType);
        }

        $generateBills      = $query->get();
        $groupedBills       = $generateBills->groupBy('month_id');
        $companies          = Company::all();

        // Pass data to the view
        $data              = [
            'generateBills'         => $groupedBills,
            'searchingYear'         => $year,
            'searchingMonth'        => $month,
            'searchingBlock'        => $block,
            'searchingRoad'         => $road,
            'searchingPlot'         => $plot,
            'companies'             => $companies,
            'usageType'             => $usageType,
        ];

        // return $data;

        // Generate PDF
        $pdf = PDF::loadView('report.pdf', $data);
        return $pdf->stream('billing-report.pdf');
    }



    public function getPlot(Request $request)
    {
        $block          = $request->query('block');
        $road           = $request->query('road');

        $plots = Plot::where('block_id', $block)
            ->where('road_id', $road)
            ->distinct('plotName')
            ->get();


        return response()->json(['plots' => $plots]);
    }




    public function getFilteredBills(Request $request)
    {
        dd($request->all());
        $query = GenerateBill::query();

        // Apply filters based on request
        if ($request->filled('block')) {
            $query->whereHas('Block', function ($q) use ($request) {
                $q->where('block_id', $request->block);
            });
        }

        if ($request->filled('roadName')) {
            $query->whereHas('roads', function ($q) use ($request) {
                $q->where('road_id', $request->roadName);
            });
        }

        if ($request->filled('plotName')) {
            $query->whereHas('plot', function ($q) use ($request) {
                $q->where('plot_id', $request->plotName);
            });
        }

        if ($request->filled('usageType')) {
            $query->whereHas('gettype', function ($q) use ($request) {
                $q->where('id', $request->usageType); // Filtering by usage type ID
            });
        }

        $usageTypes = UsageType::all();

        // Fetch the filtered data
        $generateBills = $query->with(['roads', 'Block', 'plot', 'flat', 'gettype'])->get();

        return response()->json([
            'generateBills' => $generateBills,
            'usageTypes' => $usageTypes
        ]);
    }
}
