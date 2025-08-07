<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Month;
use Module\Society\Models\Flat;
use Module\Society\Models\Road;
use Module\Society\Models\GenerateBill;
use Module\Society\Models\Payment;
use Illuminate\Support\Facades\DB;
use Module\Society\Models\Year;
use App\Models\Company;
use Module\Society\Models\PaySlip;
use PDF;


class PaidUnpaidController extends Controller
{
    private $service;

    public function __construct() {}

    public function list()
    {
        // $years = Year::orderBy('year', 'desc')->get();
        // $months = Month::all()->unique('name');
        // $blocks = Flat::all()->unique('blockName')->sortBy('blockName')->values();

        $years  = Year::orderBy('year', 'desc')->get();
        $months = Month::all()->unique('name');
        // $blocks = Flat::all()->unique('block_id')->sortBy('block_id')->values();
        $blocks = Flat::with('getblock') // Load the related Block model
            ->get() // Retrieve all records
            ->unique('block_id'); // Ensure uniqueness by block_id
        return view('paidUnpaid.list', compact('years', 'months', 'blocks'));
    }


    // public function filterPaidUnpaidBill(Request $request)
    // {
    //     $generateBills = GenerateBill::query()
    //         ->when($request->filled('year'), function ($q) use ($request) {
    //             $q->where('year', $request->year);
    //         })
    //         ->when($request->filled('month'), function ($q) use ($request) {
    //             $q->where('month', $request->month);
    //         })
    //         ->when($request->filled('block'), function ($q) use ($request) {
    //             $q->where('block', $request->block);
    //         })
    //         ->when($request->filled('road'), function ($q) use ($request) {
    //             $q->where('road', $request->road);
    //         })
    //         ->when($request->filled('billingStatus'), function ($q) use ($request) {
    //             if ($request->billingStatus == 'paid') {
    //                 $q->where('monthlyDue', 0)
    //                     ->where('payment_status', 1);
    //             } elseif ($request->billingStatus == 'unpaid') {
    //                 $q->where(function ($query) {
    //                     $query->where('monthlyDue', '!=', 0)
    //                         ->orWhere('payment_status', '!=', 1);
    //                 });
    //             }
    //         })
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     $roads = null;
    //     if ($request->block) {
    //         $roads = Flat::where('blockName', $request->block)
    //             ->distinct()
    //             ->pluck('roadName');
    //     }

    //     $uniqueFlatIds = $generateBills->pluck('flats')->unique();
    //     $flats = collect();

    //     foreach ($uniqueFlatIds as $uniqueFlatId) {
    //         $flats = $flats->merge(Flat::where('flatID', $uniqueFlatId)->get());
    //     }

    //     $years = Year::orderBy('year', 'desc')->get();
    //     $months = Month::all()->unique('name');
    //     $blocks = Flat::all()->unique('blockName')->sortBy('blockName')->values();

    //     return view('paidUnpaid.list', compact('generateBills', 'flats', 'blocks', 'months', 'years', 'roads'));
    // }



    public function filterPaidUnpaidBill(Request $request)
    {
        $generateBills = GenerateBill::query()
        ->when($request->filled('year'), function ($q) use ($request) {
            // Assuming 'year_id' is the foreign key in 'generate_bills' table
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
            ->when($request->filled('billingStatus'), function ($q) use ($request) {
                if ($request->billingStatus == 'paid') {
                    $q->where('monthlyDue', 0)
                        ->where('payment_status', 1);
                } elseif ($request->billingStatus == 'unpaid') {
                    $q->where(function ($query) {
                        $query->where('monthlyDue', '!=', 0)
                            ->orWhere('payment_status', '!=', 1);
                    });
                }
            })
            ->when($request->filled('previousDueStatus'), function ($q) use ($request) {
                if ($request->previousDueStatus == 'withDue') {
                    $q->whereHas('flat', function ($query) {
                        $query->where('totalDue', '>', 0);
                    });
                } elseif ($request->previousDueStatus == 'withoutDue') {
                    $q->whereHas('flat', function ($query) {
                        $query->where('totalDue', '=', 0);
                    });
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(30);

         // Fetch roads based on the selected block
         $roads = null;
         if ($request->block) {
             $roads = Road::where('block_name_id', $request->block)
                 ->get()
                 ->unique('roadName');
                 // ->pluck('id');
         }



         $uniqueFlatIds = $generateBills->pluck('flat_id')->unique();
         $flats = collect();
         foreach ($uniqueFlatIds as $uniqueFlatId) {
             $flats = $flats->merge(Flat::where('id', $uniqueFlatId)->get());
         }

         // Pass necessary data to the view
         $years = Year::orderBy('year', 'desc')->get();
         $months = Month::all()->unique('name');
         // $blocks = Flat::all()->unique('block_id')->sortBy('block_id')->values();

         $blocks = Flat::with('getblock') // Load the related Block model
         ->get() // Retrieve all records
         ->unique('block_id'); // Ensure uniqueness by block_id


        return view('paidUnpaid.list', compact('generateBills', 'flats', 'blocks', 'months', 'years', 'roads'));
    }




    // public function previewBill()
    // {

    //     // Access query parameters using the request() helper
    //     $year = request('year');
    //     $month = request('month');
    //     $block = request('block');
    //     $road = request('road');
    //     $billingStatus = request('billingStatus');
    //     $previousDueStatus = request('previousDueStatus');


    //     // Dump and die all the items
    //     dd([
    //         'year' => $year,
    //         'month' => $month,
    //         'block' => $block,
    //         'road' => $road,
    //         'billingStatus' => $billingStatus,
    //         'previousDueStatus' => $previousDueStatus
    //     ]);




    //     // Start building the query
    //     $generateBills = GenerateBill::leftJoin('flats', 'generate_bills.flats', '=', 'flats.flatID')
    //         ->where('generate_bills.year', $year)
    //         ->where(function ($query) use ($month) {
    //             if ($month) {
    //                 $query->where('generate_bills.month', $month);
    //             } else {
    //                 $query->whereNull('generate_bills.month');
    //             }
    //         })
    //         ->where('flats.blockName', $block)
    //         ->where('flats.roadName', $road)
    //         ->select('generate_bills.*', 'flats.*')
    //         ->orderBy('generate_bills.units')
    //         ->get();







    //     if ($generateBills->isEmpty()) {
    //         abort(404);
    //     }

    //     $companies = Company::all();
    //     $pdf = PDF::loadView('paidUnpaid.bill', compact('generateBills', 'companies', 'previousDueStatus'));
    //     return $pdf->stream('billing_report.pdf');
    // }



    // public function previewBill()
    // {
    //     // Access query parameters using the request() helper
    //     $year = request('year');
    //     $month = request('month');
    //     $block = request('block');
    //     $road = request('road');
    //     $billingStatus = request('billingStatus');
    //     $previousDueStatus = request('previousDueStatus');

    //     // Start building the query
    //     $generateBills = GenerateBill::leftJoin('flats', 'generate_bills.flats', '=', 'flats.flatID')
    //         ->where('generate_bills.year', $year)
    //         ->where(function ($query) use ($month) {
    //             if ($month) {
    //                 $query->where('generate_bills.month', $month);
    //             } else {
    //                 $query->whereNull('generate_bills.month');
    //             }
    //         })
    //         ->where('flats.blockName', $block)
    //         ->where('flats.roadName', $road)
    //         ->when($billingStatus === 'paid', function ($query) {
    //             // Filter where monthlyDue == 0 and payment_status == 1
    //             $query->where('generate_bills.monthlyDue', 0)
    //                 ->where('generate_bills.payment_status', 1);
    //         })
    //         ->when($billingStatus === 'unpaid', function ($query) {
    //             // Filter where monthlyDue != 0 and payment_status != 1
    //             $query->where('generate_bills.monthlyDue', '!=', 0)
    //                 ->where('generate_bills.payment_status', '!=', 1);
    //         })
    //         ->select('generate_bills.*', 'flats.*')
    //         ->orderBy('generate_bills.units')
    //         ->get();

    //     if ($generateBills->isEmpty()) {
    //         abort(404);
    //     }


    //     $companies = Company::all();
    //     $pdf = PDF::loadView('paidUnpaid.bill', compact('generateBills', 'companies', 'previousDueStatus'));
    //     return $pdf->stream('billing_report.pdf');
    // }



    public function previewBill(Request $request)
    {

        // return $request->all();
        // Access query parameters using the request() helper
        $year = request('year');
        $month = request('month');
        $block = request('block');
        $road = request('road');
        $billingStatus = request('billingStatus');
        $data['previousDueStatus'] = request('previousDueStatus'); // Ensure this is not null

        // Start building the query
         $data['generateBills'] = GenerateBill::leftJoin('flats', 'generate_bills.flat_id', '=', 'flats.id')
            ->where('generate_bills.year_id', $year)
            ->where(function ($query) use ($month) {
                if ($month) {
                    $query->where('generate_bills.month_id', $month);
                } else {
                    $query->whereNull('generate_bills.month_id');
                }
            })
            ->where('flats.block_id', $block)
            ->where('flats.road_id', $road)
            ->when($billingStatus === 'paid', function ($query) {
                // Filter where monthlyDue == 0 and payment_status == 1
                $query->where('generate_bills.monthlyDue', 0)
                    ->where('generate_bills.payment_status', 1);
            })
            ->when($billingStatus === 'unpaid', function ($query) {
                // Filter where monthlyDue != 0 and payment_status != 1
                $query->where('generate_bills.monthlyDue', '!=', 0)
                    ->where('generate_bills.payment_status', '!=', 1);
            })
            ->select('generate_bills.*', 'flats.*')
            ->orderBy('generate_bills.units')
            ->paginate(50);

        // if ($data['generateBills'] ->isEmpty()) {
        //     abort(404);
        // }

        $data['companies'] = Company::all();

        // return $data;

        // Load the view and pass variables, including previousDueStatus
        // $pdf = PDF::loadView('paidUnpaid.bill', [
        //     'generateBills' => $generateBills,
        //     'companies' => $companies,
        //     'previousDueStatus' => $previousDueStatus
        // ]);

        // return $pdf->stream('billing_report.pdf');


        return view('paidUnpaid.bill', $data);
    }





    public function previewMoneyReceipt()
    {
        // Access query parameters using the request() helper
        $year = request('year');
        $month = request('month');
        $block = request('block');
        $road = request('road');
        // $billingStatus = request('billingStatus');
        // $previousDueStatus = request('previousDueStatus');

        $billingStatus = request('billingStatus');
        $data['previousDueStatus'] = request('previousDueStatus'); // Ensure this is not null

        // Start building the query
        // $generateBills = GenerateBill::leftJoin('flats', 'generate_bills.flats', '=', 'flats.flatID')
        //     ->where('generate_bills.year', $year)
        //     ->where(function ($query) use ($month) {
        //         if ($month) {
        //             $query->where('generate_bills.month', $month);
        //         } else {
        //             $query->whereNull('generate_bills.month');
        //         }
        //     })
        //     ->where('flats.blockName', $block)
        //     ->where('flats.roadName', $road)
        //     ->select('generate_bills.*', 'flats.*')
        //     ->orderBy('generate_bills.units')
        //     ->paginate(50);


         // Start building the query
         $data['generateBills'] = GenerateBill::leftJoin('flats', 'generate_bills.flat_id', '=', 'flats.id')
            ->where('generate_bills.year_id', $year)
            ->where(function ($query) use ($month) {
                if ($month) {
                    $query->where('generate_bills.month_id', $month);
                } else {
                    $query->whereNull('generate_bills.month_id');
                }
            })
            ->where('flats.block_id', $block)
            ->where('flats.road_id', $road)
            ->when($billingStatus === 'paid', function ($query) {
                // Filter where monthlyDue == 0 and payment_status == 1
                $query->where('generate_bills.monthlyDue', 0)
                    ->where('generate_bills.payment_status', 1);
            })
            ->when($billingStatus === 'unpaid', function ($query) {
                // Filter where monthlyDue != 0 and payment_status != 1
                $query->where('generate_bills.monthlyDue', '!=', 0)
                    ->where('generate_bills.payment_status', '!=', 1);
            })
            ->select('generate_bills.*', 'flats.*')
            ->orderBy('generate_bills.units')
            ->paginate(50);

        // if ($generateBills->isEmpty()) {
        //     abort(404);
        // }

        // $companies = Company::all();


        $data['companies'] = Company::all();


        // $pdf = PDF::loadView('paidUnpaid.moneyReceipt', compact('generateBills', 'companies', 'previousDueStatus'));
        // return $pdf->stream('money_receipt.pdf');


        return view('paidUnpaid.moneyReceipt', $data);
    }
}
