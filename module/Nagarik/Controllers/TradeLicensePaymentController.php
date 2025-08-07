<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\Account;
use Module\Nagarik\Models\FinancialYear;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Models\PaymentModel;
use Module\Nagarik\Services\PaymentService;

class TradeLicensePaymentController extends Controller
{
    private $service;
    protected $paymentService;


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
        $data['payments'] = PaymentModel::with('source')
            ->where('status', 1)
            ->where('source_type', OldTradeLicenseModel::class)->get();
        return view('Admin.Payment.Trade-license-payment.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['financialYears'] = FinancialYear::all();
        $data['licenses'] = OldTradeLicenseModel::where('status', 1)
            ->with(['payment' => function ($query) {
                $query->where('status', 0);
            }])
            ->get();
        $data['accounts'] = Account::where('balance_type', 'credit')
            ->where('account_group_id', 1)
            ->where('status', 1)->get();
        return view('Admin.Payment.Trade-license-payment.create', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $payment = $this->paymentService->newPayment($request, OldTradeLicenseModel::class);
        return redirect(route('trade-license-payment.show', $payment));
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['invoice'] = PaymentModel::where('id', $id)->with('source')->where('source_type', OldTradeLicenseModel::class)->first();
        return view('Admin.Payment.Trade-license-payment.show', $data);
    }

    public function posShow($id)
    {
        $data['invoice'] = PaymentModel::where('id', $id)->with('source')->where('source_type', OldTradeLicenseModel::class)->first();
        return view('Admin.Payment.Trade-license-payment.pos-invoice', $data);
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
