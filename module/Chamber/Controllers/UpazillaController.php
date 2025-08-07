<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\District;
use Module\Chamber\Models\Upazilla;

class UpazillaController extends Controller
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
        $districts = District::latest()->get();
        return view('upazillas.create',compact('districts'));
    }

    public function show()
    {
        $districts = District::latest()->get();
        $upazillas = Upazilla::latest()->get();
        return view('upazillas.create',compact('districts','upazillas'));
    }

    public function edit($id)
    {
        $upazillas = Upazilla::find($id);
        $districts = District::all();
        return view('upazillas.edit',compact('districts','upazillas'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $this->validate($request, [
            'district_id' => 'required|exists:districts,id',
            "name"=> "string",
        ]);
        Upazilla::create([
            'district_id' => $validated['district_id'],
            "name"=> $validated['name'],
        ]);
        return back();
    }


    public function update(Request $request, $id)
    {
        // Validate the request
        $upazillas = Upazilla::find($id);

        $validated = $this->validate($request, [
            'district_id' => 'required|exists:districts,id',
            "name"=> "string",
        ]);
        $upazillas->update([
            'district_id' => $validated['district_id'],
            "name"=> $validated['name'],
        ]);
        return redirect(route('upazillas.create'));
    }

    public function destroy($id)
    {
        $upazillas = Upazilla::find($id);
        $upazillas->delete();
        return redirect(route('upazillas.create'));
    }
}
