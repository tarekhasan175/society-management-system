<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikLandType;

class LandTypeController extends Controller
{
    private $service;

//holding-land-type
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
        $showType = NagorikLandType::all();
      return view('Admin.Holding-tex-rate.Land-type.create' , compact('showType'));
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

        NagorikLandType::create([
            'type' => $request->input('type')
        ]);
        return redirect()->back()->with('message' , 'Nagorik Land Type create successful ');

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
        $showType = NagorikLandType::find($id);
        return view('Admin.Holding-tex-rate.Land-type.edit' , compact('showType'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $buisType = NagorikLandType::find($id);
        $buisType->update([
            'type' => $request->input('type')
        ]);
        return redirect()->route('holding-land-type.index')->with('message' , 'Business Type update successful ');


    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $landType = NagorikLandType::find($id);
        $landType->delete();
        return redirect()->back()->with('message' , 'Business Type Delete successful ');
    }
}
