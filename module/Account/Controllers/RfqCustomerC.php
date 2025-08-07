<?php

namespace Module\Account\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\ClientCompay;
use Module\Account\Models\Customer;
use Module\Account\Models\RfqCustomer;

class RfqCustomerC extends Controller
{
    private $service;

//rfq-customer
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
         $customer = RfqCustomer::with('rfqCompany','customer')->get();
        return view('RFQ.Customer.index' , compact('customer'));
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $companies = ClientCompay::all();
        $customers  = Customer::all();
        return view('RFQ.Customer.create', compact('companies','customers'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        RfqCustomer::create([
            'client_company_id' => $request->client_company_id ,
//            'name' => $request->name,
            'acc_customer_id' => $request->acc_customer_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('rfq-customer.index')->with('message', ' Customer created successfully');
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
        $companies = ClientCompay::all();
        $customer = RfqCustomer::find($id);
        $customers  = Customer::all();
        return view('RFQ.Customer.edit' , compact('customer','companies','customers'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
      $client = RfqCustomer::find($id);
      $client->update([
          'client_company_id' => $request->client_company_id ,
//          'name' => $request->name,
          'acc_customer_id' => $request->acc_customer_id,
          'phone' => $request->phone,
          'address' => $request->address,
      ]);
      return redirect()->route('rfq-customer.index')->with('message', ' Customer Update successfully');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        RfqCustomer::find($id)->delete();
        return redirect()->route('rfq-customer.index')->with('message', ' Customer deleted successfully');
    }
}
