<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NagorikAdditionalDescriptController extends Controller
{
    private $service;

//add-additional
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
        $data = [];
        return view('', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $types = \Module\Nagarik\Models\NagorikAdditionalDescript::all();
        return view('Admin.Add-Description.create' , compact('types'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        \Module\Nagarik\Models\NagorikAdditionalDescript::create([
            'type' => $request->input('type'),
        ]);
        return redirect()->back()->with('message' , 'সংযুক্তি তৈরি  সফল হয়েছে');
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
       $type = \Module\Nagarik\Models\NagorikAdditionalDescript::find($id);
       return view('Admin.Add-Description.edit', compact('type'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $type = \Module\Nagarik\Models\NagorikAdditionalDescript::find($id);
        $type->update([
            'type'=> $request->input('type')
        ]);
        return redirect()->route('add-additional.create')->with('message' , 'অঞ্চল আপডেট  সফল হয়েছে');

    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $delete = \Module\Nagarik\Models\NagorikAdditionalDescript::find($id);
        $delete->delete();
        return redirect()->back()->with('message' , 'সংযুক্তি মুছে ফেলা সফল হয়েছে');
    }
}
