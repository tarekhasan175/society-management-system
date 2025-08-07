<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikInstituteType;

class NagorikInstitutrTypeController extends Controller
{
    private $service;

//add-instituteType
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
        $institute = NagorikInstituteType::all();
        return view('Admin.Institute-Type.create' , compact('institute'));

    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        NagorikInstituteType::create([
            'type' => $request->input('type'),
        ]);
        return redirect()->back()->with('message' , 'ব্যবসা প্রতিষ্ঠানের প্রকৃতি তৈরি  সফল হয়েছে');
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
        $types = NagorikInstituteType::find($id);
        return view('Admin.Institute-Type.edit' , compact('types'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $type = NagorikInstituteType::find($id);
        $type->update([
            'type'=> $request->input('type')
        ]);
        return redirect()->route('add-instituteType.create')->with('message' , 'ব্যবসা প্রতিষ্ঠানের প্রকৃতি আপডেট  সফল হয়েছে');

    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {

        $delete = NagorikInstituteType::find($id);
        $delete->delete();
        return redirect()->back()->with('message' , 'ব্যবসা প্রতিষ্ঠানের প্রকৃতি মুছে ফেলা সফল হয়েছে');
    }
}
