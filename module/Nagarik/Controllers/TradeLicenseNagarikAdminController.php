<?php

namespace Module\Nagarik\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Services\PaymentService;

class TradeLicenseNagarikAdminController extends Controller
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
        $data['old_licenses'] = OldTradeLicenseModel::where('is_new_license', 1)
            ->where('status', 0)
            ->paginate(10);
        return view('Admin.Trade-License.New-trade-license.new-trade-license-index', $data);
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
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['old_license'] = OldTradeLicenseModel::find($id);
        return view('Admin.Trade-License.New-trade-license.new-trade-license-show', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['old_license'] = OldTradeLicenseModel::find($id);
        return view('Admin.Trade-License.New-trade-license.tradePrintView', $data);
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

    public function approvedNewTradeApplication($id)
    {
        OldTradeLicenseModel::where('id', $id)->update(['status'=>1]);
        $trade = OldTradeLicenseModel::find($id);
        $this->paymentService->generateDuePayment($trade, OldTradeLicenseModel::class);
        return redirect(route('trade-license-approval.index'));
    }

    public function newTradeLicenseApprovedIndex()
    {

        $data['old_licenses'] = OldTradeLicenseModel::where('is_new_license', 1)
            ->where('status', 1)
            ->paginate(10);
        return view('Admin.Trade-License.New-trade-license.approved-new-trade-license-index', $data);
    }
}
