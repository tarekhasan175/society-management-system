<?php

namespace Module\Society\Controllers;

use PDF;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Month;
use Illuminate\Support\Facades\DB;
use Module\Society\Models\AdvBillGenerate;
use Module\Society\Models\Block;
use Module\Society\Models\Flat;
use Module\Society\Models\Year;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\UsageType;

class AdvanceBillController extends Controller
{
    private $service;

    public function __construct() {}















    public function list()
    {
        $years  = Year::orderBy('year', 'desc')->get();
        $months = Month::all()->unique('name');
        $blocks = Block::all()->unique('blockName');
        $advBills = AdvBillGenerate::with('flat', 'block', 'road', 'plot', 'year', 'month', 'gettype')->paginate(10);

        $data = [
            'years'   => $years,
            'months'  => $months,
            'blocks'  => $blocks,
            'advBills' => $advBills,
        ];

        return view('advanceBill.list', $data);
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















    public function getFlatInfoByPlot($plotName)
    {
        $flats = Flat::where('plot_id', $plotName)
            ->with('getflat')
            ->get()
            ->unique('flatID');

        return response()->json($flats);
    }









    public function advBillGenerate(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'year'              => 'required|string',
                'month'             => 'required|array',
                'month.*'           => 'string',
                'block_id'          => 'required|string',
                'road'              => 'required|string',
                'plot'              => 'required|string',
                'flat'              => 'required|string',
            ]);

            $year                   = $request->input('year');
            $months                 = $request->input('month') ?: Month::pluck('id')->toArray();
            $block                  = $request->input('block_id');
            $road                   = $request->input('road');
            $plot                   = $request->input('plot');
            $flat_id                = $request->input('flat');

            $flat                   = Flat::where('id', $flat_id)->first();


            if (GenerateBill::whereIn('month_id', $months)
                ->where(['year_id' => $year, 'block_id' => $block, 'road_id' => $road, 'flat_id' => $flat->id, 'plot_id' => $plot])
                ->exists()
            ) {
                return redirect()->back()->with('error', "Already generated.");
            }


            $this->createBillForFlat($year, $months, $block, $road, $flat, $plot);

            DB::commit();

            return redirect(route('advanceBill.list'))->with('success', 'Advance Bill Generated Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', "Something went wrong. Please try again.");
        }
    }










    protected function createBillForFlat($year, $months, $block, $road, $flat, $plot)
    {
        $units                          = $flat->unitName;
        $usageTypeData                  = Flat::where('id', $flat->id)->first();
        $usageType                      = optional($usageTypeData)->usage_type_id;
        $amountData                     = UsageType::where('id', $usageType)->first(['amount', 'title']);
        $auserType                      = UsageType::where('id', $usageType)->first();
        $amount                         = optional($amountData)->amount;
        $usageTypeTitle                 = optional($amountData)->title;
        $billingID                      = "$road-$block-$plot-$flat->id";


        $billExists = GenerateBill::where([
            'billingID'                 => $billingID,
            'year_id'                   => $year,
            'block_id'                  => $block,
            'road_id'                   => $road,
            'flat_id'                   => $flat->id,
            'plot_id'                   => $plot,
        ])
            ->whereIn('month_id', $months)
            ->exists();

        if ($billExists) {
            return;
        }

        $billNo                         = $this->generateUniqueBillNo($year, $months, $road);
        $flat_charge                    = $flat->payable_amount ?? $flat->amount;
        $total_charge                   = $flat_charge * count($months);
        $final_amount                   = max(0, $total_charge - $flat->advance);



        AdvBillGenerate::create([
            "billingID"                 => $billingID,
            "year_id"                   => $year,
            "block_id"                  => $block,
            "road_id"                   => $road,
            "plot_id"                   => $plot,
            "flat_id"                   => $flat->id,
            "plotID"                    => $flat->plotID,
            "flats"                     => $flat->flatID,
            "units"                     => $units,
            "usage_type_id"             => $flat->usage_type_id,
            "usageType"                 => $auserType->typeName ?? null,
            "month_id"                  => json_encode($months),
            "amount"                    => $amount,
            "billNo"                    => $billNo,
            "usageTypeTitle"            => $usageTypeTitle,
            "monthlyDue"                => $final_amount,
            "payment_status"            => ($flat->advance >= $amount) ? 1 : 0,
        ]);

        foreach ($months as $m) {
            GenerateBill::create([
                'billingID'         => $billingID,
                'year_id'           => $year,
                'block_id'          => $block,
                'road_id'           => $road,
                'plot_id'           => $plot,
                'flat_id'           => $flat->id,
                'plotID'            => $flat->plotID,
                'flats'             => $flat->flatID,
                'units'             => $units,
                'usage_type_id'     => $flat->usage_type_id,
                'usageType'         => $usageType,
                'month_id'          => $m,
                'amount'            => $amount,
                'billNo'            => $billNo,
                'usageTypeTitle'    => $usageTypeTitle,
                'monthlyDue'        => $flat_charge,
                'payment_status'    => ($flat->advance >= $amount) ? 1 : 0,
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








    protected function generateUniqueBillNo($year, $textMonth, $road)
    {
        if (is_array($textMonth)) {
            $textMonth          = reset($textMonth);
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
            $sequencePadded     = str_pad($sequence, 4, '0', STR_PAD_LEFT);
            $billNo             = $yearLastTwoDigits . $monthPadded . $road . $sequencePadded;
            $sequence++;
        } while (GenerateBill::where('billNo', $billNo)->exists());

        return $billNo;
    }













    public function generatePDF($billingID)
    {
        $billingID                  = str_replace('xxx', '/', $billingID);

        $generateBills              = AdvBillGenerate::where('billingID', $billingID)
            ->with('flat')
            ->orderBy('units')
            ->get();


        foreach ($generateBills as $bill) {
            $bill->month_id         = json_decode($bill->month_id, true);
        }

        if ($generateBills->isEmpty()) {
            abort(404);
        }

        $data = [
            'companies'             => Company::all(),
            'generateBills'         => $generateBills,
        ];

        return view('generateBill.pdf', $data);
    }












    public function bill($id)
    {
        $billingID                          = str_replace('xxx', '/', $id);
        $query                              = AdvBillGenerate::with('flat')->orderBy('units');

        if (is_numeric($id)) {
            $query->where(function ($q) use ($id) {
                $q->where('block_id', $id)->orWhere('road_id', $id)->orWhere('plot_id', $id);
            });
        } else {
            $query->where('billingID', $billingID);
        }

        $generateBills                      = $query->get();
        foreach ($generateBills as $bill) {
            $bill->month_id = json_decode($bill->month_id, true);
        }

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

















    public function exportData($data, $file_path, $filename)
    {
        $exportType                     = request('export_type');


        if (!$exportType || $exportType !== 'export_pdf') {
            return response()->json(['error' => 'Invalid export type.'], 400);
        }

        ini_set("pcre.backtrack_limit", "50000000");


        $viewPath                       = $file_path . 'bill';

        $pdf = PDF::loadview($viewPath, $data, [], [
            'margin_header'             => 10,
            'margin_footer'             => 5,
            'mode'                      => 'utf-8',
            'format'                    => 'Legal',
            'orientation'               => 'P'
        ]);


        if (method_exists($pdf, 'getMpdf')) {
            $pdf->getMpdf()->setFooter("{PAGENO} / {nb}");
        }

        return $pdf->stream($filename . '.pdf');
    }










    public function billdelete($id)
    {
        $bill                   = AdvBillGenerate::findOrFail($id);
        $billingID              = $bill->billingID;
        $bill->delete();

        return redirect()->route('advanceBill.list', ['billingID' => $billingID])
            ->with('success', 'Bill deleted successfully!');
    }
}
