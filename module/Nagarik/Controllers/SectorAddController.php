<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikSector;
use Module\Nagarik\Models\NagorikWordAdd;

class SectorAddController extends Controller
{
    private $service;

//region-sector
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

        $nagorikWordName = NagorikWordAdd::all();

        $NagorikSector = NagorikSector::with('wordareya')->get();
        return view('Admin.Region-City.Sector_add.create' , compact('nagorikWordName' , 'NagorikSector'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        NagorikSector::create([
            'name'            => $request->input('name'),
            'nagorik_word_id'    => $request->input('nagorik_word_id')
        ]);
        return redirect()->back()->with('message' , 'সেক্টর তৈরি  সফল হয়েছে');
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

        $sectore = NagorikSector::find($id);
        $NagorWord = NagorikWordAdd::all();
        return view('Admin.Region-City.Sector_add.edit' , compact('sectore' , 'NagorWord'));

    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {

        $NagorikWord = NagorikSector::find($id);

        $NagorikWord->update([
            'nagorik_word_id ' => $request->input('nagorik_word_id '),
            'name' => $request->input('name')
        ]);
        return redirect()->route('region-sector.create')->with('message' , 'সেক্টর আপডেট সফল হয়েছে');


    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $sectorDelete = NagorikSector::find($id);
        $sectorDelete->delete();
        return redirect()->back()->with('message' , 'সেক্টর মুছে ফেলা সফল হয়েছে');
    }
}
