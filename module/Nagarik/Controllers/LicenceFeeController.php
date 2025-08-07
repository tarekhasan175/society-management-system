<?php

namespace Module\Nagarik\Controllers;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\FinancialYear;
use Module\Nagarik\Models\NagorikBusinessType;
use Module\Nagarik\Models\NagoriLicenceFee;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Services\PaymentService;

class LicenceFeeController extends Controller
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








//licence-fee


    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {

        $fees = NagoriLicenceFee::with('financeyear', 'nagorikbusinesstype')->get();
//        dd($fees);

        return view('Admin.Business-system.Licence-Fee.index', compact('fees'));
    }


    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {

        $financYear = FinancialYear::all();
        $nagorikBusinessType = NagorikBusinessType::all();
        return view('Admin.Business-system.Licence-Fee.create', compact('financYear', 'nagorikBusinessType'));
    }


    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $licenseFeeForFinancialYear = NagoriLicenceFee::create([
            'financial_year_id' => $request->input('financial_year_id'),
            'nagorik_business_type_id' => $request->input('nagorik_business_type_id'),
            'l_fee' => $request->input('l_fee'),
        ]);
        $this->paymentService->generateDuePaymentForAll($licenseFeeForFinancialYear, OldTradeLicenseModel::class);
        return redirect()->route('licence-fee.index')->with('message', 'আর্থিক বছরের আপডেট সফল হয়েছে');

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
        $edirfee = NagoriLicenceFee::find($id);
        $nagorikBusinessType = NagorikBusinessType::all();

        $financYear = FinancialYear::all();
        return view('Admin.Business-system.Licence-Fee.edit', compact('edirfee', 'nagorikBusinessType', 'financYear'));
    }


    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $updatefee = NagoriLicenceFee::find($id);

        $updatefee->update([
            'financial_year_id' => $request->input('financial_year_id'),
            'nagorik_business_type_id' => $request->input('nagorik_business_type_id'),
            'l_fee' => $request->input('l_fee'),
        ]);

        return redirect()->route('licence-fee.index')->with('message', 'আর্থিক বছরের আপডেট সফল হয়েছে');
    }


    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {

        $licencefeeDelete = NagoriLicenceFee::find($id);
        $licencefeeDelete->delete();
        return redirect()->back()->with('message', 'আর্থিক বছরের ডিলিট সফল হয়েছে');

    }
}
