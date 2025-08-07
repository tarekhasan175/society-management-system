<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\BusinessNature;

class BusinessNatureController extends Controller
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


    public function create()
    {
        $businessNatures = BusinessNature::latest()->get();
        return view("businessNature.create",compact('businessNatures'));
    }

    public function edit($id)
    {
        $businessNature = BusinessNature::find($id);
        return view("businessNature.edit",compact('businessNature'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "businessNatureName"=> "required",
        ]);

        BusinessNature::create([
            "businessNatureName"=> $request->input("businessNatureName"),
        ]);


        return back();
    }

    public function update(Request $request, $id)
    {
        $businessNature = BusinessNature::find($id);
        $this->validate($request,[
            "businessNatureName"=> "required",
        ]);
        $businessNature->update([
            "businessNatureName"=> $request->input("businessNatureName"),
        ]);

        return redirect(route('businessNature.create'));
    }

    public function delete($id)
    {
        $businessNature = BusinessNature::find($id);
        $businessNature->delete();
        return redirect(route('businessNature.create'));
    }

}
