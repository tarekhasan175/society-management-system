<?php

namespace Module\Account\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\Account_Quotation;
use Module\Account\Models\AccountQuotationDetails;
use Module\Account\Models\ClientCompay;
use Module\Account\Models\PoAccounts;
use Module\Account\Models\Product;
use Module\Account\Models\RfqCustomer;
use Module\Account\Models\RfqJobNumberDetails;
use Module\Account\Services\RfqJobNumber;

class RfqJobController extends Controller
{
    private $service;
    public $RfqJobNumber;
    //rfq-job-number
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->RfqJobNumber  = new RfqJobNumber();

    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = \Module\Account\Models\RfqJobNumber::query();

        if ($request->has('invoice_no') && !empty($request->invoice_no)) {
            $query->where('invoice_no', 'like', '%' . $request->invoice_no . '%');
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

         $data['quotation'] = $query->with('poId')->latest()->paginate(25);
         return view('RFQ.Job-Number.index',$data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['companies']       = ClientCompay::all();
        $data['product_orders']  = PoAccounts::all();
        $data['customers']       = RfqCustomer::with('customer')->get();
        $data['products']        = Product::userCompanies()->with('category', 'unit')->whereIn('product_type', ['0', 'account_prod'])->userLog()->latest()->get();
//return $data;
        return view('RFQ.Job-Number.create',$data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
//        return $request->all();
        try {

//            $this->RfqJobNumber->validateData($request);

//            $this->RfqJobNumber->invoiceNumberService->setNextInvoiceNo($request->company_id, 'Purchase', date('Y'));

            DB::transaction(function () use($request) {


                $this->RfqJobNumber->storePurchase($request);


                $this->RfqJobNumber->storePurchaseDetails($request);


//                $this->RfqJobNumber->makeTransaction();


//                $this->RfqJobNumber->invoiceNumberService->setNextInvoiceNo($request->company_id, 'Purchase', date('Y'));
            });


        } catch (Exception $ex) {


            return redirect()->back()->with('error', $ex->getMessage());
        }


        return redirect()->route('rfq-job-number.index')->with('message', 'Purchase Created Successfully!');

    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['QuotationShow'] =\Module\Account\Models\RfqJobNumber::with('poId','details','customer','company','ClientCompany','rfqCustomer')->find($id);

        return view('RFQ.Job-Number.show',$data);
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data['RfNumber'] =\Module\Account\Models\RfqJobNumber::with('poId','details','customer','company','ClientCompany','rfqCustomer')->find($id);
        $data['companies']       = ClientCompay::all();
        $data['product_orders']  = PoAccounts::all();
        $data['customers']       = RfqCustomer::with('customer')->get();
        $data['products']        = Product::userCompanies()->with('category', 'unit')->whereIn('product_type', ['0', 'account_prod'])->userLog()->latest()->get();
//        return $data;

         return view('RFQ.Job-Number.edit',$data);
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {



        try {

            DB::transaction(function () use($request, $id) {


                $this->RfqJobNumber->validateData($request);


                $this->RfqJobNumber->updatePurchase($request, $id);



                $this->RfqJobNumber->updatePurchaseDetails($request);


//                $this->RfqJobNumber->makeTransaction();


            });


        } catch (Exception $ex) {


            return redirect()->back()->withInput()->with('error', $ex->getMessage());
        }


//return $request->all();
//
//        try {
//
//            DB::transaction(function () use($request, $id) {
//
//        $purchases = \Module\Account\Models\RfqJobNumber::find($id);
//
//        if (!$purchases) {
//            throw new \Exception("RfqJobNumber not found.");
//        }
//
//
//        $purchases->update([
//            'client_company_id'       => $request->client_company_id,
//            'rfq_customers_id'        => $request->rfq_customers_id,
//            'po_accounts_id'          => $request->po_accounts_id,
//            'date'                    => now(),
//            'discount_amount'         => $request->discount_amount ?? 0,
//            'amount'                  => $request->amount ?? 0,
//            'discount_percentage'     => $request->discount_percentage ?? 0,
//            'total_amount'            => $request->total_amount ?? 0,
//        ]);
//
//        RfqJobNumberDetails::where('rfq_job_numbers_id', $purchases->id)->delete();
//
//        foreach ($request->product_id as $key => $product_id) {
//
//            RfqJobNumberDetails::create([
//                'rfq_job_numbers_id' => $purchases->id,
//                'products_id' => $product_id,
//                'quantity' => $request->quantity[$key],
//                'price' => $request->price[$key],
//                'item' => $request->item[$key],
//                'description' => $request->description[$key],
//                'worker_name' => $request->worker_name[$key] ?? null,
//            ]);
//        }
//
//
//            });
//
//
//        } catch (Exception $ex) {
//
//
//            return redirect()->back()->withInput()->with('error', $ex->getMessage());
//        }


        return redirect()->route('rfq-job-number.index')->with('message', 'Purchase Updated Successfully!');
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
            $quotation = \Module\Account\Models\RfqJobNumber::find($id);
            if (!$quotation) {
                return response()->json(['message' => 'Quotation not found'], 404);
            }
            $quotationDetails = RfqJobNumberDetails::where('rfq_job_numbers_id', $id)->get();
            foreach ($quotationDetails as $detail) {
                $detail->delete();
            }
            $quotation->delete();
            DB::commit();
            return redirect()->back()->with('message','Deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withMessage($e->getMessage());
        }
    }
}
