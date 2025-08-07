<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\FinancialYear;

class FinancialYearController extends Controller
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












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $years = FinancialYear::all();
        return view('Admin.Business-system.Financial-Year.financialYear' , compact('years'));
    }



//Financial-Year









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

        FinancialYear::create([
                'start_year' => $request->input('start_year'),
                'end_year' => $request->input('end_year'),
            ]);
        return redirect()->back()->with('message' , 'আর্থিক বছর তৈরি  সফল হয়েছে ');


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
        $editYear = FinancialYear::find($id);
       return view('Admin.Business-system.Financial-Year.edit' , compact('editYear'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $FinanceYear = FinancialYear::find($id);
        $FinanceYear->update([
            'start_year' => $request->input('start_year'),
            'end_year' => $request->input('end_year'),
        ]);
        return redirect()->route('financial-years.index')->with('message' , 'আর্থিক বছরের আপডেট সফল হয়েছে');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
       $year = FinancialYear::find($id);
       $year->delete();
       return redirect()->back()->with('message' , 'আর্থিক বছর মুছে ফেলা সফল হয়েছে');
    }
}
