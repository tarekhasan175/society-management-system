<?php

namespace Module\Nagarik\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\Account;
use Module\Nagarik\Models\HoldingTexApply;
use Module\Nagarik\Models\PaymentModel;
use Module\Nagarik\Services\PaymentService;

class HoldingPamentController extends Controller
{
    private $service;
    protected $paymentService;
//holding-tex-payment
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }













    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $paymentLists = PaymentModel::where('status',1)->with('holdingtex')->get();

        return view('Admin.Payment.Holding-tex-Payment.index' , compact('paymentLists'));
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $HoldingWoners = HoldingTexApply::with('user','nagorikbloc','nagoriksector','cityarea','wordareya','paymentModel','landType')
            ->where('h_apply_status', 1)
            ->whereHas('paymentModel', function ($query) {
                $query->where('status', 0);
            })
            ->get();

        $accounts = Account::where('balance_type', 'credit')
            ->where('account_group_id', 1)
            ->where('status', 1)->get();
        return view('Admin.Payment.Holding-tex-Payment.create' , compact('HoldingWoners','accounts'));

    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
//        return $request->all();
        $this->paymentService->newHoldingPayment($request, HoldingTexApply::class);

        return redirect(route('holding-tex-payment.index'));
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $ShowPaymentList = PaymentModel::where('status',1)->with('holdingtex')->find($id);

        return view('Admin.Payment.Holding-tex-Payment.show' , compact('ShowPaymentList'));
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
}
