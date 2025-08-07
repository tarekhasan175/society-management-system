<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\NagoriHoldinTexRate;
use Module\Nagarik\Models\NagorikLandType;

class HoldingTexRateController extends Controller
{
    private $service;

    //holding-rates
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

        $holdingTexRate = NagoriHoldinTexRate::all();
        return view('Admin.Holding-tex-rate.texRate', compact('holdingTexRate'));

    }


    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $HoldingRegion = CityAreaAdd::all();
        $NagorikLandType = NagorikLandType::all();
        return view('Admin.Holding-tex-rate.texRateCreate', compact('HoldingRegion', 'NagorikLandType'));
    }


    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        NagoriHoldinTexRate::create([
            'nagorik_region_id' => $request->input('nagorik_region_id'),
            'nagorik_land_type_id' => $request->input('nagorik_land_type_id'),
            'holding_fee' => $request->input('holding_fee'),
        ]);

        return redirect()->route('holding-rates.index')->with('message', 'আপডেট সফল হয়েছে');
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

        $HoldingRegion = CityAreaAdd::all();
        $NagorikLandType = NagorikLandType::all();
        $HoldingTexEdit = NagoriHoldinTexRate::find($id);
        return view('Admin.Holding-tex-rate.texRateEdit', compact('HoldingTexEdit', 'HoldingRegion', 'NagorikLandType'));
    }


    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $updatefee = NagoriHoldinTexRate::find($id);

        $updatefee->update([
            'nagorik_region_id' => $request->input('nagorik_region_id'),
            'nagorik_land_type_id' => $request->input('nagorik_land_type_id'),
            'holding_fee' => $request->input('holding_fee'),
        ]);

        return redirect()->route('holding-rates.index')->with('message', ' আপডেট সফল হয়েছে');
    }


    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $HoldingFeeDelete = NagoriHoldinTexRate::find($id);
        $HoldingFeeDelete->delete();
        return redirect()->back()->with('message', 'ডিলিট সফল হয়েছে');
    }
}
