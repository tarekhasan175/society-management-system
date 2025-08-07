<?php

namespace Module\Account\Controllers;

use App\Helpers\file_upload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\Account_Quotation;
use Module\Account\Models\ClientCompay;
use Module\Account\Models\PoAccounts;
use App\Traits\FileSaver;
use Module\Account\Models\RfqCustomer;
use function React\Promise\all;

class AccountPOController extends Controller
{
    private $service;
    use FileSaver;

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
    public function index(Request $request)
    {

        $query = PoAccounts::query();

        if ($request->has('invoice_no') && !empty($request->invoice_no)) {
            $query->where('invoice', 'like', '%' . $request->invoice_no . '%');
        }

        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $data['PO'] = $query->with('ClientCompany','rfqCustomer')->latest()->paginate(15);
        return view('RFQ.PO.index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data['companies']  = ClientCompay::all();
        $data['customers']  = RfqCustomer:: with('customer')->get();
//        return $data;
        return view('RFQ.PO.create' ,$data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
//return $request->all();
        $PO = PoAccounts::create([
            'invoice'=> $request->invoice,
            'client_company_id'=> $request->client_company_id,
            'rfq_customers_id'=> $request->rfq_customers_id,
        ]);

        $this->upload_file($request->file, $PO, 'file', 'image/PO_upload');


        return redirect()->route('po.index')->with('message', 'PO Create successfully!');

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
        $PO = PoAccounts::find($id);
        $data['companies']  = ClientCompay::all();
        $data['customers']  = RfqCustomer::with('customer')->get();
//        return $data;
        return view('RFQ.PO.edit', compact('PO'),$data);
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {

        $PO = PoAccounts::find($id);
        $PO->update([
            'invoice'=> $request->invoice,
        ]);



        if ($request->hasFile('file')) {
             $oldFilePath = public_path('assets/image/PO_upload/' . $PO->file);
            if (file_exists($oldFilePath) && is_file($oldFilePath)) {
                unlink($oldFilePath);
            }
             $this->upload_file($request->file, $PO, 'file', 'image/PO_upload');
        }


        return redirect()->route('po.index')->with('message', 'PO Create successfully!');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $po = PoAccounts::find($id);
        $po->delete();
        return redirect()->back()->with('message', 'PO Delete successfully!');
    }
}
