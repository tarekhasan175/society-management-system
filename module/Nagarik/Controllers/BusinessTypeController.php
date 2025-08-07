<?php

namespace Module\Nagarik\Controllers;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikBusinessType;

class BusinessTypeController extends Controller
{
    private $service;

//business-type
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
        $showType = NagorikBusinessType::all();
       return view('Admin.Business-system.Business-Type.index' , compact('showType'));
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
//        return $request->all();
       NagorikBusinessType::create([
           'type' => $request->input('type')
       ]);
       return redirect()->back()->with('message' , 'Business Type create successful ');
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
        $busType = NagorikBusinessType::find($id);
        return view('Admin.Business-system.Business-Type.edit' , compact('busType'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
       $buisType = NagorikBusinessType::find($id);
       $buisType->update([
               'type' => $request->input('type')
           ]);
        return redirect()->route('business-type.index')->with('message' , 'Business Type update successful ');


    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $deleteItem = NagorikBusinessType::find($id);
        $deleteItem->delete();
        return redirect()->back()->with('message' , 'Business Type Delete successful ');
    }
}
