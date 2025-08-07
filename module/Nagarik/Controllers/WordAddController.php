<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\NagorikWordAdd;

class WordAddController extends Controller
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
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $nagorikregionType = CityAreaAdd::all();
        $cityArea = NagorikWordAdd::with('cityarea')->get();
        return view('Admin.Region-City.Word_add.create' , compact('nagorikregionType' , 'cityArea'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        NagorikWordAdd::create([
            'name'            => $request->input('name'),
            'city_area_id'    => $request->input('city_area_id')
        ]);
        return redirect()->back()->with('message' , 'ওয়ার্ড তৈরি  সফল হয়েছে');
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
        $city = NagorikWordAdd::find($id);
        $NagorikArea = CityAreaAdd::all();
        return view('Admin.Region-City.Word_add.edit' , compact('city' , 'NagorikArea'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $word = NagorikWordAdd::find($id);

        $word->update([
            'city_area_id ' => $request->input('city_area_id '),
            'name' => $request->input('name')
         ]);
        return redirect()->route('region-words.create')->with('message' , 'ওয়ার্ড আপডেট সফল হয়েছে');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
       $word = NagorikWordAdd::find($id);
       $word->delete();
       return redirect()->back()->with('message' , 'ওয়ার্ড মুছে ফেলা সফল হয়েছে');
    }
}
