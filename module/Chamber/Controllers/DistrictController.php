<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\District;

class DistrictController extends Controller
{
    public function __construct()
    {

    }


    public function district_create()
    {
        return view("districts.create");
    }

    public function show(){
        $districts = District::latest()->get();
        return view("districts.create",compact('districts'));
    }

    public function edit($id){
        $districts = District::find($id);
        return view("districts.edit",compact('districts'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "string",
        ]);

        District::create([
            "name"=> $request->name,
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $districts = District::find($id);
        $this->validate($request, [
            "name"=> "string",
        ]);

        $districts->update([
            "name"=> $request->name,
        ]);

        return redirect(route('districts.create'));
    }

    public function destroy($id)    
    {
        District::find($id)->delete();
        return back();
    }

}
