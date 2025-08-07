<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\AccountYear;

class AccountYearController extends Controller
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
        $accountYears = AccountYear::latest()->get();
        return view("accountYear.create", compact('accountYears'));
    }

    public function edit($id)
    {
        $accountYear = AccountYear::findOrFail($id);
        return view('accountYear.edit', compact('accountYear'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fromDate' => 'nullable|date',
            'toDate' => 'nullable|date',
            'sessionName' => 'nullable|string',
            'lock' => 'nullable|integer'
        ]);
        AccountYear::create([
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate'),
            'sessionName' => $request->input('sessionName'),
            'lock' => $request->has('lock') ? 1 : 0,

        ]);

        return redirect()->route('accountYear.create');

    }

    public function update(Request $request, $id)
    {
        $accountYear = AccountYear::findOrFail($id);
        
        $accountYear->update([
            'fromDate' => $request->input('fromDate'),
            'toDate' => $request->input('toDate'),
            'sessionName' => $request->input('sessionName'),
            'lock' => $request->has('lock') ? 1 : 0,

        ]);

        return redirect()->route('accountYear.create');

    }

    public function delete($id)
    {
        $accountYear = AccountYear::findOrFail($id);
        $accountYear->delete();
        return redirect()->route('accountYear.create');
    }

}
