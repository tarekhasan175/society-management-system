<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Year;

class YearController extends Controller
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
        $years = Year::latest()->paginate(20);
        return view('year.create', compact('years'));
    }

    public function edit($id)
    {
        $year = Year::findOrFail($id);
        return view('year.edit', compact('year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => ['required']
        ]);
        Year::create([
            "year" => $request['year'],
        ]);
        return redirect(route("year.create"))->with('success','Year Added Successfully');
    }
    public function update(Request $request, $id)
    {
        $year = Year::findOrFail($id);
        $request->validate([
            'year' => ['required']
        ]);
        $year->update([
            "year" => $request['year'],
        ]);
        return redirect(route("year.create"))->with('success','Year Updated Successfully');
    }

    public function delete($id)
    {
        $year = Year::findOrFail($id);
        $year->delete();
        return redirect(route("year.create"))->with('failed','Year Deleted Successfully');

    }



}
