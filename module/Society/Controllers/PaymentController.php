<?php

namespace Module\Society\Controllers;

use PDF;
use Exception;
use App\Models\Month;
use App\Models\Company;
use Illuminate\Http\Request;
use Module\Society\Models\Flat;
use Module\Society\Models\Year;
use Illuminate\Support\Facades\DB;
use Module\Society\Models\PaySlip;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\Plot;
use Module\Society\Models\Road;

class PaymentController extends Controller
{
    private $service;
    public function __construct() {}













    public function create()
    {
        $years          = Year::orderBy('year', 'desc')->get();
        $months         = Month::all()->unique('name');

        $blocks         = Flat::with('getblock')
            ->get()
            ->unique('block_id');

        $ownerNames     = Flat::distinct()->pluck('ownerName')->filter();

        $data = [
            'years'         => $years,
            'months'        => $months,
            'blocks'        => $blocks,
            'ownerNames'    => $ownerNames,
        ];

        return view('payments.create', $data);
    }










    public function filterBillPaymentEntry(Request $request)
    {
        $generateBills = GenerateBill::query()
            ->when($request->filled('year'), function ($q) use ($request) {
                $q->whereHas('year', function ($query) use ($request) {
                    $query->where('id', $request->year);
                });
            })
            ->when($request->filled('month'), function ($q) use ($request) {
                $q->whereHas('month', function ($query) use ($request) {
                    $query->where('id', $request->month);
                });
            })
            ->when($request->filled('block'), function ($q) use ($request) {
                $q->whereHas('block', function ($query) use ($request) {
                    $query->where('id', $request->block);
                });
            })
            ->when($request->filled('road'), function ($q) use ($request) {
                $q->whereHas('road', function ($query) use ($request) {
                    $query->where('id', $request->road);
                });
            })
            ->when($request->filled('plot'), function ($q) use ($request) {
                $q->whereHas('AssignPlot', function ($query) use ($request) {
                    $query->where('id', $request->plot);
                });
            })
            ->when($request->filled('name'), function ($q) use ($request) { // Owner name filter
                if ($request->name) {
                    $q->whereHas('flat', function ($query) use ($request) {
                        $query->where('ownerName', $request->name);
                    });
                }
            })
            ->where(function ($q) {
                $q->where('monthlyDue', '!=', 0)
                    ->orWhere('payment_status', '!=', 1);
            })
            ->orderBy('id', 'desc')
            ->paginate(30);




        $roads = null;
        if ($request->block) {
            $roads = Road::where('block_name_id', $request->block)
                ->get()
                ->unique('roadName');
        }

        $plots = null;
        if ($request->road) {
            $plots = Plot::where('road_id', $request->road)
                ->get()
                ->unique('plotName');
        }


        $uniqueFlatIds = $generateBills->pluck('flat_id')->unique();
        $flats = collect();
        foreach ($uniqueFlatIds as $uniqueFlatId) {
            $flats = $flats->merge(Flat::where('id', $uniqueFlatId)->get());
        }

        $years = Year::orderBy('year', 'desc')->get();
        $months = Month::all()->unique('name');

        $blocks = Flat::with('getblock')
            ->get()
            ->unique('block_id');

        $ownerNames = Flat::distinct()->pluck('ownerName')->filter();

        return view('payments.create', compact('generateBills', 'flats', 'blocks', 'months', 'years', 'roads', 'plots', 'ownerNames'));
    }










    public function getRoadInfoByBlock($block_id)
    {
        $flats = Flat::where('block_id', $block_id)
            ->with('road')
            ->get()
            ->unique('road_id');

        Log::info($flats);

        return response()->json($flats);
    }


    public function getPlotInfoByRoad($road_id)
    {
        $flats = Flat::where('road_id', $road_id)
            ->with('plot')
            ->get()
            ->unique('plotID');

        return response()->json($flats);
    }










    public function store(Request $request)
    {
        $request->validate([
            'bill_no'               => 'required|array',
            'flat_id'               => 'required|array',
            'charge'                => 'required|array',
            'paid_amount'           => 'required|array',
        ], [
            'bill_no.required'      => 'Bill number is required.',
            'flat_id.required'      => 'Flat ID is required.',
            'charge.required'       => 'Charge is required.',
            'paid_amount.required'  => 'Paid amount is required.',
        ]);

        $billNos                    = $request->input('bill_no');
        $flatIds                    = $request->input('flat_id');
        $charges                    = $request->input('charge');
        $paidAmounts                = $request->input('paid_amount');

        if (count($billNos) !== count($flatIds) || count($flatIds) !== count($charges) || count($charges) !== count($paidAmounts)) {
            return back()->withErrors(['msg' => 'Input arrays must have the same number of elements.']);
        }
        
        DB::beginTransaction();
        
        try {
            $messages               = [];

            foreach ($billNos as $index => $billNo) {
                $billNo             = explode(',', $billNo);
                $flatIds            = explode(',', $flatIds[0]);
                $charges            = explode(',', $charges[0]);
                $paidAmounts        = explode(',', $paidAmounts[0]);

                foreach ($billNo as $index => $bill_No) {
                    $flatId         = $flatIds[$index];
                    $charge         = (float)$charges[$index];
                    $paidAmount     = (float)$paidAmounts[$index];
                    
                    $bill           = GenerateBill::where('billNo', $bill_No)
                    ->where('flat_id', $flatId)
                    ->first();
                    
                    if (!$bill) {
                        $messages[] = "Bill $bill_No not found for Flat ID $flatId.";
                        continue;
                    }
                    
                    if ($bill->monthlyDue == 0 || $bill->payment_status == 1) {
                        $messages[] = "Bill $bill_No is already paid.";
                        continue;
                    }
                    
                    $flat           = Flat::where('id', $flatId)->first();
                    
                    if (!$flat) {
                        $messages[] = "Flat ID $flatId not found.";
                        continue;
                    }
                    
                    $originalMonthlyDue = $bill->monthlyDue;
                    $difference         = $paidAmount - $charge;
                    
                    if ($difference > 0) {
                        $flat->advance += $difference;
                    } elseif ($difference < 0) {
                        $amountToDeduct     = abs($difference);
                        if ($flat->advance >= $amountToDeduct) {
                            $flat->advance -= $amountToDeduct;
                        } else {
                            $messages[]     = "Insufficient advance for Bill $bill_No.";
                            continue;
                        }
                    }
                    
                    $bill->update([
                        'monthlyDue'     => 0,
                        'payment_status' => 1,
                    ]);
                    
                    $flat->update([
                        'totalDue'      => max(0, $flat->totalDue - $originalMonthlyDue),
                        'advance'       => $flat->advance,
                    ]);
                }
            }

            DB::commit();

            if (!empty($messages)) {
                return redirect()->route('payments.create')->with('error', implode(', ', $messages));
            }

            return redirect()->route('payments.create')->with('success', 'Bill(s) Payment Successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Update failed, Something went wrong.']);
        }
    }











    public function printAcknowledgement(Request $request, $flatID)
    {
        $generateBills = PaySlip::where('flat_id', $flatID)
            ->when($request->month, function ($query) use ($request) {
                return $query->where('bill_month', $request->month)
                    ->where('bill_year', $request->year);
            }, function ($query) use ($request) {
                return $query->where('bill_year', $request->year)
                    ->whereNull('bill_month');
            })
            ->leftJoin('flats', 'pay_slips.flat_id', '=', 'flats.flatID')
            ->select('pay_slips.*', 'flats.*')
            ->orderBy('pay_slips.id', 'desc')
            ->get();


        if ($generateBills->isEmpty()) {
            $year = $request->year;
            $month = $request->month;
            return view('payments.warning', compact('year', 'month'));
        }

        $companies = Company::all();

        $data['generateBills'] = $generateBills;
        $data['companies'] = $companies;

        $pdf = PDF::loadView('payments.acknowledgement', $data);

        return $pdf->stream('acknowledgement.pdf');
    }









    public function getMonths(Request $request)
    {
        $year       = $request->input('year');
        $flatID     = $request->input('flatID');

        $months     = DB::table('generate_bills')
            ->where('flats', $flatID)
            ->where('year', $year)
            ->distinct()
            ->pluck('month');

        return response()->json(['months' => $months]);
    }
}
