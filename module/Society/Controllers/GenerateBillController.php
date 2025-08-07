<?php

namespace Module\Society\Controllers;

use PDF;
use Exception;
use App\Models\Month;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Flat;
use Module\Society\Models\Year;
use Module\Society\Models\Block;
use Module\Society\Models\UsageType;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\AdvBillGenerate;
use Module\Society\Models\TempGenerateBill;
use Module\Society\Models\GenerateSingleBill;
use Module\Society\Models\TempGenerateSingleBill;
use Module\Society\Models\GenerateSingleBillDetails;

class GenerateBillController extends Controller
{
    private $service;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct() {}


















    public function create()
    {
        $years                              = Year::orderBy('year', 'desc')->get();
        $usage_types                        = UsageType::orderBy('typeName', 'desc')->get();
        $months                             = Month::all();
        $bloks                              = Block::all();
        $roads                              = Flat::all()->unique('roadName')
            ->sortBy('roadName')
            ->values();

        $plots                              = Flat::all()->unique('plotID')
            ->sortBy('plotID')
            ->values();

        $latestBillsSubquery                = GenerateBill::selectRaw('MAX(id) as id')
            ->groupBy('billingID');

        $generateBills                      = GenerateBill::joinSub($latestBillsSubquery, 'latest_bills', function ($join) {
            $join->on('generate_bills.id', '=', 'latest_bills.id');
        })
            ->with(['block', 'road', 'year', 'month', 'AssignBlock', 'AssignRoad', 'Assignyear', 'Assignmonth'])
            ->orderBy('generate_bills.created_at', 'desc')
            ->get(['generate_bills.*']);

        $generateBillsUnique = $generateBills
            ->unique(function ($item) {
                return $item->year_id . $item->month_id . $item->block_id . $item->road_id;
            });


        $temp_generate_bills                = TempGenerateBill::all();

        $data = [
            'years'                         => $years,
            'months'                        => $months,
            'bloks'                         => $bloks,
            'roads'                         => $roads,
            'plots'                         => $plots,
            'usage_types'                   => $usage_types,
            'generateBillsUnique'           => $generateBillsUnique,
            'generateBills'                 => $generateBills,
            'temp_generate_bills'           => $temp_generate_bills,
        ];

        return view('generateBill.create', $data);
    }















    public function singleBillCreate()
    {
        $years                              = Year::orderBy('year', 'desc')->get();
        $usage_types                        = UsageType::orderBy('typeName', 'desc')->get();
        $months                             = Month::all();
        $bloks                              = Block::all();
        $roads                              = Flat::all()->unique('roadName')
            ->sortBy('roadName')
            ->values();

        $plots                              = Flat::all()->unique('plotID')
            ->sortBy('plotID')
            ->values();

        $latestBillsSubquery                = GenerateBill::selectRaw('MAX(id) as id')
            ->groupBy('billingID');

        // $generateBills                      = GenerateBill::joinSub($latestBillsSubquery, 'latest_bills', function ($join) {
        //     $join->on('generate_bills.id', '=', 'latest_bills.id');
        // })
        //     ->with(['block', 'road', 'year', 'month', 'AssignBlock', 'AssignRoad', 'Assignyear', 'Assignmonth'])
        //     ->orderBy('generate_bills.created_at', 'desc')
        //     ->get(['generate_bills.*']);

        // $generateBillsUnique = $generateBills
        //     ->unique(function ($item) {
        //         return $item->year_id . $item->month_id . $item->block_id . $item->road_id;
        //     });

        $generateBills = GenerateSingleBill::all();


        $temp_generate_bills                = TempGenerateSingleBill::all();

        $data = [
            'years'                         => $years,
            'months'                        => $months,
            'bloks'                         => $bloks,
            'roads'                         => $roads,
            'plots'                         => $plots,
            'usage_types'                   => $usage_types,
            // 'generateBillsUnique'           => $generateBillsUnique,
            'generateBills'                 => $generateBills,
            'temp_generate_bills'           => $temp_generate_bills,
        ];

        return view('generateBill.single-bill-create', $data);
    }















    public function yearlyBillCreate()
    {
        $years                              = Year::orderBy('year', 'desc')->get();
        $bloks                              = Block::all();
        $roads                              = Flat::all()->unique('roadName')->sortBy('roadName')->values();

        $latestBillsSubquery                = GenerateBill::selectRaw('MAX(id) as id')->groupBy('billingID');

        $generateBills                      = GenerateBill::joinSub($latestBillsSubquery, 'latest_bills', function ($join) {
            $join->on('generate_bills.id', '=', 'latest_bills.id');
        })
            ->with(['block', 'road', 'year', 'month', 'AssignBlock', 'AssignRoad', 'Assignyear', 'Assignmonth'])
            ->orderBy('generate_bills.created_at', 'desc')
            ->get(['generate_bills.*']);

        $generateBillsUnique                = $generateBills->unique(function ($item) {
            return $item->year . $item->month . $item->block . $item->road;
        });
        return view('generateBill.yearlyBillCreate', compact('years', 'bloks', 'roads', 'generateBillsUnique', 'generateBills'));
    }




















    public function list($billingID)  //For show generated bill list
    {

        $billingID                          = str_replace('xxx', '/', $billingID);

        if (empty($billingID) || !is_string($billingID)) {
            abort(400, 'Invalid billing ID');
        }

        $generateBills                      = GenerateBill::where('billingID', $billingID)
            ->with(['flat', 'block'])
            ->orderBy('road_id')
            ->get();

        if ($generateBills->isEmpty()) {
            abort(404, 'No records found for this Billing ID');
        }


        $companies                          = Company::all();

        return view('generateBill.list', compact('generateBills', 'companies'));
    }













    public function roadList($roadID)  //For show generated bill list
    {
        $generateBills                      = GenerateBill::where('road_id', $roadID)
            ->with(['flat', 'block'])
            ->orderBy('road_id')
            ->get();

        if ($generateBills->isEmpty()) {
            abort(404, 'No records found for this Billing ID');
        }

        $data = [
            'generateBills'                 => $generateBills,
            'companies'                     => Company::all(),
        ];

        return view('generateBill.list', $data);
    }



















    public function billedit($id)
    {
        $bill = GenerateBill::findOrFail($id);


        return view('generateBill.edit', compact('bill'));
    }


















    public function billupdate(Request $request, $id)
    {

        $validatedData                      = $request->validate([
            'monthlyDue'                    => 'required|numeric',
        ]);


        $bill                               = GenerateBill::findOrFail($id);
        $bill->monthlyDue                   = $request->input('monthlyDue');

        $bill->save();

        $billingID                          = $bill->billingID;


        return redirect()->route('generateBill.list', ['billingID' => $billingID])
            ->with('success', 'Monthly Due updated successfully!');
    }

















    public function billdelete($id)
    {
        $bill           = GenerateBill::findOrFail($id);
        $billingID      = $bill->billingID;
        $bill->delete();

        return redirect()->route('generateBill.list', ['billingID' => $billingID])
            ->with('success', 'Bill deleted successfully!');
    }




















    public function bill($id)
    {
        $billingID                          = str_replace('xxx', '/', $id);
        $query                              = GenerateBill::with('flat')->orderBy('units');

        if (is_numeric($id)) {
            $query->where(function ($q) use ($id) {
                $q->where('block_id', $id)->orWhere('road_id', $id)->orWhere('plot_id', $id);
            });
        } else {
            $query->where('billingID', $billingID);
        }

        $generateBills                      = $query->get();

        if ($generateBills->isEmpty()) {
            abort(404);
        }

        $data = [
            'generateBills'                 => $generateBills,
            'companies'                     => Company::all(),
        ];

        if (request()->filled('export_type')) {
            $filename                       = 'generateBills_' . fdate(request('from_date'), 'Y_m_d');
            return $this->exportData($data, 'generateBill/', $filename);
        }

        return view('generateBill.bill', $data);
    }















    public function singleBill($id)
    {
        $generateBills          = GenerateSingleBill::where('id', $id)
            ->with('plot')
            ->first();

        if (!$generateBills) {
            abort(404);
        }

        $data = [
            'bill'                 => $generateBills,
            'companies'                     => Company::all(),
        ];

        if (request()->filled('export_type')) {
            $filename                       = 'generateBills_' . fdate(request('from_date'), 'Y_m_d');
            return $this->exportSingleBillData($data, 'generateBill/', $filename);
        }

        return view('generateBill.single-bill', $data);
    }















    public function yearlyBill($billingID)
    {
        $billingID                          = str_replace('xxx', '/', $billingID);

        $generateBills                      = GenerateBill::where('billingID', $billingID)
            ->with('flat')
            ->orderBy('units')
            ->get();

        if ($generateBills->isEmpty()) {
            abort(404);
        }

        $companies                          = Company::all();

        return view('generateBill.yearlyBill', compact('generateBills', 'companies'));
    }





















    // Generate PDF Plot wise
    public function generatePDF($billingID)
    {
        $billingID                              = str_replace('xxx', '/', $billingID);

        $generateBills = GenerateBill::where('billingID', $billingID)
            ->with('flat')
            ->orderBy('units')
            ->get();


        if ($generateBills->isEmpty()) {
            abort(404);
        }

        $data = [
            'generateBills'     => $generateBills,
            'companies'         => Company::all(),
        ];

        return view('generateBill.pdf', $data);
    }


















    // Generate PDF Road wise
    public function roadGeneratePDF($roadID)
    {
        $generateBills = GenerateBill::where('road_id', $roadID)
            ->with('flat')
            ->orderBy('units')
            ->get();


        if ($generateBills->isEmpty()) {
            abort(404);
        }

        $data = [
            'generateBills'     => $generateBills,
            'companies'         => Company::all(),
        ];

        return view('generateBill.pdf', $data);
    }












    // Generate PDF Block Wise
    public function blockGeneratePDF($blockID)
    {
        $generateBills          = GenerateBill::where('block_id', $blockID)
            ->with('flat')
            ->orderBy('units')
            ->get();


        if ($generateBills->isEmpty()) {
            abort(404);
        }


        $data = [
            'generateBills'     => $generateBills,
            'companies'         => Company::all(),
        ];

        return view('generateBill.pdf', $data);
    }

















    // Generate PDF Block Wise
    public function generateSingleBillPDF($id)
    {
        $generateBills          = GenerateSingleBill::where('id', $id)
            ->with('plot')
            ->first();


        if (!$generateBills) {
            abort(404);
        }


        $data = [
            'bill'     => $generateBills,
            'companies'         => Company::all(),
        ];

        return view('generateBill.single-pdf', $data);
    }


















    public function generateYearlyPdf($billingID)
    {
        $billingID                              = str_replace('xxx', '/', $billingID);
        $generateBills                          = GenerateBill::where('billingID', $billingID)
            ->with('flat')
            ->orderBy('units')
            ->get();

        if ($generateBills->isEmpty()) {
            abort(404);
        }


        $companies                              = Company::all();
        $data['generateBills']                  = $generateBills;
        $data['companies']                      = $companies;



        if ($generateBills->isNotEmpty()) {
            $firstBill                          = $generateBills->first();
            $fileName                           = "Yearly_Bills_for_Block #{$firstBill->block}, Road #{$firstBill->road}, {$firstBill->year}.pdf";
        }


        return view('generateBill.yearlyPdf', $data);
    }



















    public function exportData($data, $file_path, $filename)
    {
        if (request('export_type') !== 'export_pdf') {
            return response()->json(['error' => 'Invalid export type.'], 400);
        }

        ini_set("pcre.backtrack_limit", "50000000");

        $pdf = PDF::loadView("{$file_path}bill", $data, [
            'margin_header'             => 10,
            'margin_footer'             => 5,
            'mode'                      => 'utf-8',
            'format'                    => 'Legal',
            'orientation'               => 'P'
        ]);

        optional($pdf->getMpdf())->setFooter("{PAGENO} / {nb}");

        return $pdf->stream("{$filename}.pdf");
    }

















    public function exportSingleBillData($data, $file_path, $filename)
    {
        if (request('export_type') !== 'export_pdf') {
            return response()->json(['error' => 'Invalid export type.'], 400);
        }

        ini_set("pcre.backtrack_limit", "50000000");

        $pdf = PDF::loadView("{$file_path}single-bill", $data, [
            'margin_header'             => 10,
            'margin_footer'             => 5,
            'mode'                      => 'utf-8',
            'format'                    => 'Legal',
            'orientation'               => 'P'
        ]);

        optional($pdf->getMpdf())->setFooter("{PAGENO} / {nb}");

        return $pdf->stream("{$filename}.pdf");
    }



















    public function getRoadInfoByBlock($blockName)
    {
        $flats = Flat::where('block_id', $blockName)
            ->with('road')
            ->get()
            ->unique('road_id');

        Log::info($flats);

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



















    // Monthly Bill Generate
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'year'              => 'required|string',
                'month'             => 'required|array',
                'month.*'           => 'string',
                'block_id'          => 'required|string',
                'road'              => 'nullable|array',
                'road.*'            => 'string',
                'plot'              => 'nullable|array',
                'plot.*'            => 'string',
                'usage_type'        => 'nullable|string',
            ]);

            $year                   = $request->input('year');
            $months                 = $request->input('month') ?: Month::pluck('id')->toArray();
            $block                  = $request->input('block_id');
            $roads                  = $request->input('road') ?? [];
            $plots                  = $request->input('plot') ?? [];
            $usage_type_id          = $request->input('usage_type');

            $is_exists = AdvBillGenerate::where('year_id', $year)
                ->where('block_id', $block)
                ->whereJsonContains('month_id', $months)
                ->where('road_id', $roads)
                ->exists();

            if ($is_exists == true) {
                return redirect(route('generateBill.create'))->with('error', "Already generated in advance bill.");
            }

            if (!empty($roads) && empty($plots)) {
                foreach ($months as $mon) {
                    if (GenerateBill::whereIn('road_id', $roads)
                        ->where(['year_id' => $year, 'month_id' => $mon, 'block_id' => $block])
                        ->exists()
                    ) {
                        return redirect(route('generateBill.create'))->with('error', "Already generated.");
                    }
                }
                $this->generateBillsForRoads($year, $months, $block, $roads, $usage_type_id);
            }

            if (!empty($roads) && !empty($plots)) {
                foreach ($months as $mon) {
                    if (GenerateBill::where('year_id', $year)
                        ->where('block_id', $block)
                        ->where('month_id', $mon)
                        ->whereIn('road_id', $roads)
                        ->whereIn('plot_id', $plots)
                        ->exists()
                    ) {
                        return redirect(route('generateBill.create'))->with('error', "Already generated.");
                    }
                }
                $this->generateBillsForPlots($year, $months, $block, $roads, $plots, $usage_type_id);
            }

            DB::commit();

            return redirect(route('generateBill.create'))->with('success', 'Monthly Bill Fetching Successful');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('generateBill.create'))->with('error', 'Error generating monthly bill');
        }
    }
















    protected function generateBillsForRoads($year, $month, $block, $roads, $usage_type_id)
    {
        DB::beginTransaction();

        try {
            $query = Flat::where('block_id', $block);

            if ($usage_type_id !== null) {
                $query->where('usage_type_id', $usage_type_id);
            }

            $flats = $query->whereIn('road_id', $roads)->get();

            if ($flats->isEmpty()) {
                DB::rollBack();
                return redirect()->back()->with('error', 'No data found.');
            }

            foreach ($flats as $flat) {
                $this->createBillForFlat($year, $month, $block, $flat->road_id, $flat, $flat->plot_id);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }















    protected function generateBillsForPlots($year, $month, $block, $roads, $plots, $usage_type_id)
    {
        DB::beginTransaction();

        try {
            $query = Flat::where('block_id', $block)
                ->whereIn('road_id', $roads)
                ->whereIn('plot_id', $plots);

            if ($usage_type_id !== null) {
                $query->where('usage_type_id', $usage_type_id);
            }

            $flats = $query->get();


            if ($flats->isEmpty()) {
                DB::rollBack();
                return redirect()->back()->with('error', 'No data found.');
            }

            foreach ($flats as $flat) {
                $this->createBillForFlat($year, $month, $block, $flat->road_id, $flat, $flat->plot_id);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }















    protected function createBillForFlat($year, $month, $block, $road, $flat, $plot)
    {
        $units                          = $flat->unitName;
        $usageTypeData                  = Flat::where('id', $flat->id)->first();
        $usageType                      = optional($usageTypeData)->usage_type_id;
        $amountData                     = UsageType::where('id', $usageType)->first(['amount', 'title']);
        $auserType                      = UsageType::where('id', $usageType)->first();
        $amount                         = $flat->payable_amount ?? ($amountData->amount ?? null);
        $usageTypeTitle                 = optional($amountData)->title;




        // dd($m);
        foreach ($month as $m) {
            $billingID = "$year-$m-$road-$block-$plot";

            $billExists = GenerateBill::where([
                'billingID'             => $billingID,
                'year_id'               => $year,
                'block_id'              => $block,
                'road_id'               => $road,
                'flat_id'               => $flat->id,
                'plot_id'               => $plot,
            ])
                ->whereIn('month_id', $month)
                ->exists();

            if ($billExists) {
                return;
            }


            $final_amount               = max(0, ($flat->payable_amount ?? $flat->amount) - $flat->advance);
            $billNo                     = $this->generateUniqueBillNo($year, $month, $road);


            TempGenerateBill::create([
                "billingID"             => $billingID,
                "year_id"               => $year,
                "block_id"              => $block,
                "road_id"               => $road,
                "plot_id"               => $plot,
                "flat_id"               => $flat->id,
                "plotID"                => $flat->plotID,
                "flats"                 => $flat->flatID,
                "units"                 => $units,
                "usage_type_id"         => $flat->usage_type_id,
                "usageType"             => $auserType->typeName ?? null,
                "month_id"              => $m,
                "amount"                => $amount,
                "billNo"                => $billNo,
                "usageTypeTitle"        => $usageTypeTitle,
                "monthlyDue"            => $final_amount,
                "payment_status"        => ($flat->advance >= $amount) ? 1 : 0,
            ]);
        }

        $newTotalDue                    = $flat->totalDue + $amount;

        if ($flat->advance > $newTotalDue) {
            $remainingAdvance           = $flat->advance - $newTotalDue;
            $flat->totalDue             = 0;
            $flat->advance              = $remainingAdvance;
        } else {
            $flat->totalDue             = $newTotalDue - $flat->advance;
            $flat->advance              = 0;
        }


        $flat->save();
    }









    public function saveGenerateBill(Request $request)
    {
        $validated                  = $request->validate([
            'bill_id'               => 'required|array',
            'bill_id.*'             => 'exists:temp_generate_bills,id',
        ]);

        $tempBills                  = TempGenerateBill::whereIn('id', $validated['bill_id'])->get();

        foreach ($tempBills as $tempBill) {
            GenerateBill::create([
                'billingID'         => $tempBill->billingID,
                'year_id'           => $tempBill->year_id,
                'block_id'          => $tempBill->block_id,
                'road_id'           => $tempBill->road_id,
                'plot_id'           => $tempBill->plot_id,
                'flat_id'           => $tempBill->flat_id,
                'plotID'            => $tempBill->plotID,
                'flats'             => $tempBill->flats,
                'units'             => $tempBill->units,
                'usage_type_id'     => $tempBill->usage_type_id,
                'usageType'         => $tempBill->usageType,
                'month_id'          => $tempBill->month_id,
                'amount'            => $tempBill->amount,
                'billNo'            => $tempBill->billNo,
                'usageTypeTitle'    => $tempBill->usageTypeTitle,
                'monthlyDue'        => $tempBill->monthlyDue,
                'payment_status'    => $tempBill->payment_status,
            ]);
        }

        TempGenerateBill::truncate();

        return response()->json(['success' => true]);
    }










    public function truncateTempGenerateBill()
    {
        try {
            TempGenerateBill::truncate();
            return response()->json(['success' => true, 'message' => 'Table truncated successfully!']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong please try again.'], 500);
        }
    }













    protected function generateUniqueBillNo($year, $textMonth, $road)
    {
        if (is_array($textMonth)) {
            $textMonth = reset($textMonth);
        }

        $monthMap = [
            'January'           => '01',
            'February'          => '02',
            'March'             => '03',
            'April'             => '04',
            'May'               => '05',
            'June'              => '06',
            'July'              => '07',
            'August'            => '08',
            'September'         => '09',
            'October'           => '10',
            'November'          => '11',
            'December'          => '12',
        ];

        $yearLastTwoDigits      = substr($year, -2);

        $monthPadded            = $monthMap[$textMonth] ?? '01';

        $sequence               = 1;

        do {
            $sequencePadded = str_pad($sequence, 4, '0', STR_PAD_LEFT);
            $billNo = $yearLastTwoDigits . $monthPadded . $road . $sequencePadded;
            $sequence++;
        } while (GenerateBill::where('billNo', $billNo)->exists());

        return $billNo;
    }




















    // Single Bill Generate - store in temp_generate_bills table
    public function singleBillStore(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $request->validate([
                'year'              => 'required|string',
                'month'             => 'required|array',
                'month.*'           => 'string',
                'block_id'          => 'required|string',
                'road'              => 'required|string',
                'plot'              => 'required|string',
                'flat'              => 'nullable|array',
                'flat.*'            => 'string',
            ]);

            $year                   = $request->input('year');
            $month                  = $request->input('month');
            $block                  = $request->input('block_id');
            $road                   = $request->input('road');
            $plot                   = $request->input('plot');
            $flats                  = $request->has('flat') ? Flat::whereIn('id', $request->input('flat'))->get() : Flat::where('plot_id', $plot)->get();

            $billExists = GenerateBill::where([
                'year_id'               => $year,
                'block_id'              => $block,
                'road_id'               => $road,
                'plot_id'               => $plot,
            ])
                ->whereIn('month_id', $month)
                ->exists();

            if ($billExists) {
                return redirect()->back()->with('error', 'This bill already generated');
            }


            foreach ($flats as $flat) {
                $this->createSingleBillForFlat($year, $month, $block, $road, $flat, $plot);
            }

            DB::commit();

            return redirect(route('generateBill.singleBillCreate'))->with('success', 'Monthly Bill Fetching Successful');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('generateBill.singleBillCreate'))->with('error', 'Error generating monthly bill');
        }
    }













    // Single Bill Generate 
    protected function createSingleBillForFlat($year, $month, $block, $road, $flat, $plot)
    {
        $units                          = $flat->unitName;
        $usageTypeData                  = Flat::where('id', $flat->id)->first();
        $usageType                      = optional($usageTypeData)->usage_type_id;
        $amountData                     = UsageType::where('id', $usageType)->first(['amount', 'title']);
        $auserType                      = UsageType::where('id', $usageType)->first();
        $amount                         = $flat->payable_amount ?? ($amountData->amount ?? null);
        $usageTypeTitle                 = optional($amountData)->title;




        foreach ($month as $m) {
            $billingID = "$year-$m-$road-$block-$plot";

            $billExists = GenerateBill::where([
                'billingID'             => $billingID,
                'year_id'               => $year,
                'block_id'              => $block,
                'road_id'               => $road,
                'flat_id'               => $flat->id,
                'plot_id'               => $plot,
            ])
                ->whereIn('month_id', $month)
                ->exists();

            if ($billExists) {
                return;
            }


            $final_amount               = max(0, ($flat->payable_amount ?? $flat->amount) - $flat->advance);
            $billNo                     = $this->generateUniqueBillNo($year, $month, $road);


            $bill = TempGenerateSingleBill::create([
                "billingID"             => $billingID,
                "year_id"               => $year,
                "block_id"              => $block,
                "road_id"               => $road,
                "plot_id"               => $plot,
                "flat_id"               => $flat->id,
                "plotID"                => $flat->plotID,
                "flats"                 => $flat->flatID,
                "units"                 => $units,
                "usage_type_id"         => $flat->usage_type_id,
                "usageType"             => $auserType->typeName ?? null,
                "month_id"              => $m,
                "amount"                => $amount,
                "billNo"                => $billNo,
                "usageTypeTitle"        => $usageTypeTitle,
                "monthlyDue"            => $final_amount,
                "payment_status"        => ($flat->advance >= $amount) ? 1 : 0,
            ]);
            // dd($bill);
        }

        $newTotalDue                    = $flat->totalDue + $amount;

        if ($flat->advance > $newTotalDue) {
            $remainingAdvance           = $flat->advance - $newTotalDue;
            $flat->totalDue             = 0;
            $flat->advance              = $remainingAdvance;
        } else {
            $flat->totalDue             = $newTotalDue - $flat->advance;
            $flat->advance              = 0;
        }


        $flat->save();
    }














    public function saveGenerateSingleBill(Request $request)
    {
        $validated                  = $request->validate([
            'bill_id'               => 'required|array',
            'bill_id.*'             => 'exists:temp_generate_single_bills,id',
        ]);

        $tempBills                  = TempGenerateSingleBill::whereIn('id', $validated['bill_id'])->get();

        $bill = GenerateSingleBill::create([
            'billingID'             => $tempBills[0]->billingID,
            'billNo'                => $tempBills[0]->billNo,
            'year_id'               => $tempBills[0]->year_id,
            'month_id'              => $tempBills[0]->month_id,
            'road_id'               => $tempBills[0]->road_id,
            'block_id'              => $tempBills[0]->block_id,
            'plot_id'               => $tempBills[0]->plot_id,
            'total_amount'          => $tempBills->sum('amount'),
            'total_monthlyDue'      => $tempBills->sum('monthlyDue'),
            'payment_status'        => $tempBills[0]->payment_status,
        ]);

        foreach ($tempBills as $tempBill) {
            GenerateSingleBillDetails::create([
                'main_id'           => $bill->id,
                'billingID'         => $tempBill->billingID,
                'year_id'           => $tempBill->year_id,
                'block_id'          => $tempBill->block_id,
                'road_id'           => $tempBill->road_id,
                'plot_id'           => $tempBill->plot_id,
                'flat_id'           => $tempBill->flat_id,
                'plotID'            => $tempBill->plotID,
                'flats'             => $tempBill->flats,
                'units'             => $tempBill->units,
                'usage_type_id'     => $tempBill->usage_type_id,
                'usageType'         => $tempBill->usageType,
                'month_id'          => $tempBill->month_id,
                'amount'            => $tempBill->amount,
                'billNo'            => $tempBill->billNo,
                'usageTypeTitle'    => $tempBill->usageTypeTitle,
                'monthlyDue'        => $tempBill->monthlyDue,
                'payment_status'    => $tempBill->payment_status,
            ]);
            GenerateBill::create([
                'billingID'         => $tempBill->billingID,
                'year_id'           => $tempBill->year_id,
                'block_id'          => $tempBill->block_id,
                'road_id'           => $tempBill->road_id,
                'plot_id'           => $tempBill->plot_id,
                'flat_id'           => $tempBill->flat_id,
                'plotID'            => $tempBill->plotID,
                'flats'             => $tempBill->flats,
                'units'             => $tempBill->units,
                'usage_type_id'     => $tempBill->usage_type_id,
                'usageType'         => $tempBill->usageType,
                'month_id'          => $tempBill->month_id,
                'amount'            => $tempBill->amount,
                'billNo'            => $tempBill->billNo,
                'usageTypeTitle'    => $tempBill->usageTypeTitle,
                'monthlyDue'        => $tempBill->monthlyDue,
                'payment_status'    => $tempBill->payment_status,
            ]);
        }

        TempGenerateSingleBill::truncate();

        return response()->json(['success' => true]);
    }
















    public function truncateTempGenerateSingleBill()
    {
        try {
            TempGenerateSingleBill::truncate();
            return response()->json(['success' => true, 'message' => 'Table truncated successfully!']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }













    // Yearly Bill Generate
    public function yearlyStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'year_id'       => 'required|string',
                'block_id'      => 'nullable|string',
                'road'          => 'nullable|array',
                'road.*'        => 'string',
            ]);

            $year               = $request->input('year_id');
            $block              = $request->input('block_id');
            $roads              = $request->input('road');

            $yearlyBillExists = GenerateBill::where('year_id', $year)
                ->where(function ($query) use ($block, $roads) {
                    if ($block) {
                        $query->where('block_id', $block);
                    }
                    if (!empty($roads)) {
                        $query->whereIn('road_id', $roads);
                    }
                })
                ->whereNull('month_id')
                ->exists();

            $monthlyBillExists = GenerateBill::where('year_id', $year)
                ->where(function ($query) use ($block, $roads) {
                    if ($block) {
                        $query->where('block_id', $block);
                    }
                    if (!empty($roads)) {
                        $query->whereIn('road_id', $roads);
                    }
                })
                ->whereNotNull('month_id')
                ->exists();

            if ($yearlyBillExists || $monthlyBillExists) {
                DB::rollBack();
                return redirect(route('generateBill.yearlyBillCreate'))
                    ->with('error', "A bill for the year $year (monthly or yearly) has already been generated" . ($block ? " for block $block." : "."));
            }

            if (empty($block)) {
                $blocks = Block::all();
                foreach ($blocks as $blk) {
                    $roads = Flat::where('block_id', $blk->id)->distinct()->pluck('road_id')->toArray();
                    foreach ($roads as $road) {
                        $this->generateYearlyBillForBlockRoads($year, $blk->blockName, $road);
                    }
                }
            } elseif (empty($roads)) {
                $roads = Flat::where('block_id', $block)->distinct()->pluck('road_id')->toArray();
                foreach ($roads as $road) {
                    $this->generateYearlyBillForBlockRoads($year, $block, $road);
                }
            } else {
                foreach ($roads as $road) {
                    $this->generateYearlyBillForBlockRoads($year, $block, $road);
                }
            }

            DB::commit();
            return redirect(route('generateBill.yearlyBillCreate'))->with('success', 'Yearly bill generated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect(route('generateBill.yearlyBillCreate'))->with('error', 'Error generating yearly bill: ' . $e->getMessage());
        }
    }





















    protected function generateYearlyBillForBlockRoads($year, $block, $road)
    {
        $flats                      = Flat::where('block_id', $block)->where('road_id', $road)->get();

        foreach ($flats as $flat) {
            $units                  = $flat->unitName;
            $usageTypeData          = Flat::where('id', $flat->id)->first();
            $usageType              = optional($usageTypeData)->usage_type_id;
            $amountData             = UsageType::where('id', $usageType)->first(['amount', 'title']);
            $auserType              = UsageType::where('id', $usageType)->first();
            $amount                 = $flat->payable_amount ?? ($amountData->amount ?? null);
            $usageTypeTitle         = optional($amountData)->title;

            $billingID              = "$year-$road-$block";

            GenerateBill::create([
                "billingID"         => $billingID,
                "year_id"           => $year,
                "block_id"          => $block,
                "road_id"           => $road,
                "plot_id"           => $flat->plot_id,
                "flat_id"           => $flat->id,
                "plotID"            => $flat->plotID,
                "flats"             => $flat->flatID,
                "units"             => $units,
                "usage_type_id"     => $flat->usage_type_id,
                "usageType"         => $auserType->typeName,
                "amount"            => $amount,
                "billNo"            => $this->generateUniqueBillNoForYearly($year, $block, $road),
                "usageTypeTitle"    => $usageTypeTitle,
                "monthlyDue"        => ($amount * 12),
            ]);

            $newTotalDue            = $flat->totalDue + ($amount * 12);

            if ($flat->advance > $newTotalDue) {
                $remainingAdvance   = $flat->advance - $newTotalDue;
                $flat->totalDue     = 0;
                $flat->advance      = $remainingAdvance;
            } else {
                $flat->totalDue     = $newTotalDue - $flat->advance;
                $flat->advance      = 0;
            }

            $flat->save();
        }
    }


















    protected function generateUniqueBillNoForYearly($year, $block, $road)
    {
        $yearLastTwoDigits          = substr($year, -2);
        $sequence                   = 1;

        do {
            $sequencePadded         = str_pad($sequence, 4, '0', STR_PAD_LEFT);
            $billNo                 = $yearLastTwoDigits . $block . $road . $sequencePadded;
            $sequence++;
        } while (GenerateBill::where('billNo', $billNo)->exists());

        return $billNo;
    }















    public function delete($id)
    {
        try {
            $bills = GenerateBill::where('road_id', $id)->get();

            if ($bills->isEmpty()) {
                return redirect(route('generateBill.create'))->with('error', 'No bills found for the specified road.');
            }

            foreach ($bills as $bill) {
                Flat::where('id', $bill->flat_id)
                    ->decrement('totalDue', $bill->monthlyDue);
            }

            GenerateBill::where('road_id', $bill->road_id)->delete();

            return redirect()->back()->with('success', 'Bills deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }












    public function singleBillDelete($id)
    {
        try {
            $singleBill = GenerateSingleBill::findOrFail($id);

            $billDetails = GenerateSingleBillDetails::where('main_id', $singleBill->id)->get();

            $bills = GenerateBill::where('billNo', $singleBill->billNo)->get();


            if ($bills->isEmpty()) {
                return redirect()->back()->with('error', 'Something went wrong, please try again.');
            }

            foreach ($bills as $bill) {
                Flat::where('id', $bill->flat_id)
                    ->decrement('totalDue', $bill->monthlyDue);
            }

            GenerateSingleBillDetails::where('main_id', $singleBill->id)->delete();
            GenerateBill::where('billNo', $singleBill->billNo)->delete();
            $singleBill->delete();

            return redirect()->back()->with('success', 'Bills deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }
}
