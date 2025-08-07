<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikBlock;
use Module\Nagarik\Models\NagorikRoadAdd;

class RoadAddController extends Controller
{
    private $service;

//region-road
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
        $nagorikBloc = NagorikBlock::all();
        $NagorikRoad = NagorikRoadAdd::with('nagorikbloc')->get();
        return view('Admin.Region-City.Road_add.create' , compact('nagorikBloc' , 'NagorikRoad'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

       NagorikRoadAdd::create([
           'name'            => $request->input('name'),
           'nagorik_block_id'    => $request->input('nagorik_block_id')
       ]);
        return redirect()->back()->with('message' , 'রোড তৈরি  সফল হয়েছে');
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {

    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $nagorikRoad = NagorikRoadAdd::find($id);
        $NagorBlock = NagorikBlock::all();
        return view('Admin.Region-City.Road_add.edit' , compact('nagorikRoad' , 'NagorBlock'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {

        $NagorikRoad = NagorikRoadAdd::find($id);
        $NagorikRoad->update([
            'nagorik_block_id ' => $request->input('nagorik_block_id '),
            'name' => $request->input('name')
        ]);
        return redirect()->route('region-road.create')->with('message' , 'রোড আপডেট সফল হয়েছে');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $RoadDelete = NagorikRoadAdd::find($id);
        $RoadDelete->delete();
        return redirect()->back()->with('message' , 'রোড মুছে ফেলা সফল হয়েছে');
    }
}
