<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikBlock;
use Module\Nagarik\Models\NagorikSector;

class AreaAddController extends Controller
{
    private $service;

//region-area
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

        $nagorikSector = NagorikSector::all();

        $NagorikBloc = NagorikBlock::with('nagoriksector')->get();

        return view('Admin.Region-City.Block_add.create' , compact('nagorikSector' , 'NagorikBloc'));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        NagorikBlock::create([
            'name'            => $request->input('name'),
            'nagorik_sector_id'    => $request->input('nagorik_sector_id')
        ]);
        return redirect()->back()->with('message' , 'ব্লক তৈরি  সফল হয়েছে');
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
        $NagorSector = NagorikSector::all();
        $nagorikBloc = NagorikBlock::find($id);
        return view('Admin.Region-City.Block_add.edit' , compact('NagorSector' , 'nagorikBloc'));

    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $blogupdate = NagorikBlock::find($id);

        $blogupdate->update([
            'nagorik_sector_id' => $request->input('nagorik_sector_id'),
            'name' => $request->input('name')
        ]);
        return redirect()->route('region-area.create')->with('message' , 'ব্লক আপডেট সফল হয়েছে');


    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $sectorDelete = NagorikBlock::find($id);
        $sectorDelete->delete();
        return redirect()->back()->with('message' , 'ব্লক মুছে ফেলা সফল হয়েছে');
    }
}
