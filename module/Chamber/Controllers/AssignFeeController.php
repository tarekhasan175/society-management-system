<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\AccountYear;
use Module\Chamber\Models\AssignFee;
use Module\Chamber\Models\MemberCategory;
use Module\Chamber\Models\PaymentHead;

class AssignFeeController extends Controller
{
    private $service;

    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

    }
    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $memberCategories = MemberCategory::all();
        $sessions = AccountYear::all();
        // $assignfees = AssignFee::all();
        $paymentHeads = PaymentHead::all();
        return view('assignFee.index', [
            'memberCategories' => $memberCategories,
            'sessions' => $sessions,
            // 'fees' => $assignfees,
            'paymentHeads' => $paymentHeads,
        ]);
    }

    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data = [];
        return view('', $data);
    }


    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            "year_id" => "nullable|string",
            "membercategory_id" => "nullable|string",
            "select" => "nullable|array",
            "paymenthead_id" => "nullable|array",
            "LastPaymentDate" => "nullable|array",
            "LastPaymentDate.*" => "nullable|string",
            "Amount" => "nullable|array",
            "Amount.*" => "nullable|string",
        ]);
        
         if ($request->has('select') && is_array($request->select)) {
            foreach ($request->select as $key => $paymenthead_id) {
                // Add similar checks for other arrays
                AssignFee::create([
                    'year_id' => $request->year_id,
                    'membercategory_id' => $request->membercategory_id,
                    'select' => $paymenthead_id,
                    'paymenthead_id' => $request->paymenthead_id[$key],
                    'LastPaymentDate' => $request->LastPaymentDate[$key],
                    'Amount' => $request->Amount[$key],
                ]);
            }
        }

        return redirect(route('assignfees.index'));


    }


    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        # code...
    }


    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        # code...
    }


    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        # code...
    }

    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        # code...
    }

    public function checkAssignments(Request $request)
    {
        $yearId = $request->input('year_id');
        $categoryId = $request->input('member_category_id');

        $data["assignments"] = AssignFee::where('year_id', $yearId)
            ->where('membercategory_id', $categoryId)
            ->pluck('paymenthead_id');
        $data["assign_fee_data"] = AssignFee::where('year_id', $yearId)
            ->where('membercategory_id', $categoryId)
            ->select('id','Amount','LastPaymentDate')->get();

        return response()->json($data);
    }
}