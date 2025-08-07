<?php

namespace Module\Account\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\Account;
use Module\Account\Models\Account_Quotation;
use Module\Account\Models\AccountQuotationDetails;
use Module\Account\Models\ClientCompay;
use Module\Account\Models\Customer;
use Module\Account\Models\Product;
use Module\Account\Models\RfqCustomer;
use Module\Account\Services\AccQuotation;
use Module\Account\Services\AccReceiveVoucherService;
use Module\Account\Services\AccSaleService;
use Module\Account\Services\DataService;

class Rfquotationcontroller extends Controller
{

    private $QuotationService;
//quotations
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

        $this->QuotationService              = new AccQuotation();

    }











    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {

        $query = Account_Quotation::query();

        if ($request->has('invoice_no') && !empty($request->invoice_no)) {
            $query->where('invoice_no', 'like', '%' . $request->invoice_no . '%');
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $data['quotation'] = $query->latest()->paginate(25);
        return view('RFQ.Quotation.index', $data);
    }














    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {

        $data['companies']  = ClientCompay::all();
        $data['customers']  = RfqCustomer::with('customer')->get();
        $data['products']   = Product::userCompanies()->with('category', 'unit')->whereIn('product_type', ['0', 'account_prod'])->userLog()->latest()->get();

//return $data;
        return view('RFQ.Quotation.create',$data);
    }



//    public  function companyToCustomer(Request $request)
//    {
//        return $request->all();
//
//        $Company = $request->input('Company');
//
//        $customer =  RfqCustomer::where('client_company_id', $Company)
//
//            ->get();
//        return $customer;
//    }










    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
//return $request->all();
        try {

            DB::transaction(function () use($request) {


                $this->QuotationService->validateData($request);


                $this->QuotationService->storeSale($request);


                $this->QuotationService->storeSaleDetails($request);


//                $this->QuotationService->makeTransaction();


                $this->QuotationService->invoiceNumberService->setNextInvoiceNo($request->company_id, 'quotation', date('Y'));

            });


        } catch (Exception $ex) {

            if ($ex->getCode() == '23000') {
//                $this->saleService->invoiceNumberService->setNextInvoiceNo($request->company_id, 'Sale', date('Y'));
//
//                $this->store($request);
            }

            return redirect()->back()->withInput()->with('error', $ex->getMessage());
        }
        return  redirect()->route('quotations.index')->with('message', 'Quotation created successfully');

//        return redirect()->route('acc-sales.show', $this->saleService->sale->id)->with('message', 'Sale Created Successfully!');

    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
            $data['QuotationShow'] = Account_Quotation::with('details','customer','company','ClientCompany','rfqCustomer')->find($id);

        return view('RFQ.Quotation.show',$data);
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
        DB::beginTransaction();
        try {
             $quotation = Account_Quotation::find($id);
             if (!$quotation) {
                return response()->json(['message' => 'Quotation not found'], 404);
            }
             $quotationDetails = AccountQuotationDetails::where('quotation_id', $id)->get();
             foreach ($quotationDetails as $detail) {
                $detail->delete();
            }
             $quotation->delete();
             DB::commit();
            return redirect()->back()->with('message','Quotation and its details deleted successfully');
        } catch (\Exception $e) {
             DB::rollBack();
            return redirect()->back()->withMessage($e->getMessage());
        }
    }
}
