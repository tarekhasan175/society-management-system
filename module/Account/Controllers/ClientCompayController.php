<?php

namespace Module\Account\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\ClientCompay;

class ClientCompayController extends Controller
{
    private $service;

//client-company
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
         $company =ClientCompay::latest()->paginate(15);
        return view('RFQ.Company.index', compact('company'));
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {

        return view('RFQ.Company.create' );
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
       ClientCompay::create([
           'name'=>$request->name,
           'sort_name'=>$request->sort_name,
       ]);
       return redirect()->route('client-company.index')->with('message', 'Company Create successfully!');
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
      $company = ClientCompay::find($id);
      return view('RFQ.Company.edit', compact('company'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $company = ClientCompay::find($id);
        $company->update([
            'name' => $request->name,
            'sort_name' => $request->sort_name,
        ]);
        return redirect()->route('client-company.index')->with('message', 'Company Update successfully!');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
         $company = ClientCompay::find($id);
         $company->delete();
         return redirect()->route('client-company.index')->with('message', 'Company Deleted successfully!');
    }
}
