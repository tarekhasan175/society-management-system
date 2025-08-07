<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\CityAreaAdd;

class RegionController extends Controller
{
    private $service;


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
     | CREATE METHOD            ------------------অঞ্চল-----------------
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $area = CityAreaAdd::all();
        return view('Admin.Region-City.Area_add.create' , compact('area'));
    }




    public function store(Request $request)
    {
//        dd($request);
     $dd =  CityAreaAdd::create([
           'name' => $request->input('name')
       ]);

       return redirect()->back()->with( 'message' , 'অঞ্চল তৈরি  সফল হয়েছে');
    }






    public function show($id)
    {
        # code...
    }



    public function edit($id)
    {
        $region = CityAreaAdd::find($id);
        return view('Admin.Region-City.Area_add.edit' , compact('region'));
    }



    public function update($id, Request $request)
    {
        $cityUp = CityAreaAdd::find($id);
        $cityUp->update([
            'name'=>$request->input('name')
        ]);
        return redirect()->route('region.create')->with('message' , 'অঞ্চল আপডেট  সফল হয়েছে');
    }



    public function destroy($id)
    {
       $city = CityAreaAdd::find($id);
       $city->delete();
       return redirect()->back()->with('message' , 'অঞ্চল মুছে ফেলা সফল হয়েছে');
    }





}
