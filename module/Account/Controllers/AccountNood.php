<?php

namespace Module\Account\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\AccountNote;

class AccountNood extends Controller
{
    private $service;

//notes
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
        $Notes = AccountNote::orderBy('id', 'asc')->get();
        return view('Note.note', compact('Notes'));

    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
         return view('Note.create');
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $lastAccountNote = AccountNote::orderBy('id', 'desc')->first();
        $lastMainBalance = $lastAccountNote ? $lastAccountNote->main_balance : 0;

        // Calculate the new balance
        $balance = $request->credit - $request->debit;

        // Calculate the new main_balance
        $mainBalance = $lastMainBalance + $balance;
       AccountNote::create([
           'name'                   => $request->name,
           'date'                   => $request->date,
           'description'            => $request->description,
           'quote_number'           => $request->quote_number,
           'po_number'              => $request->po_number,
           'job_number'             => $request->job_number,
           'work_done_by'           => $request->work_done_by,
           'quantity'               => $request->quantity,
           'units_price'            => $request->units_price,
           'total_price'            => $request->total_price,
           'total_cost'             => $request->total_cost,
           'job_report'             => $request->job_report,
           'bill_number'            => $request->bill_number,
           'bill_amount'            => $request->bill_amount,
           'paid_amount'            => $request->paid_amount,
           'debit'                  => $request->debit,
           'credit'                 => $request->credit,
           'balance'                => $request->credit - $request->debit ,
           'main_balance'           => $mainBalance  ,
           'debit_purpose'          => $request->debit_purpose,
           'credits_purpose'        => $request->credits_purpose,
           'invest_paid'            => $request->invest_paid,
       ]);
       return redirect()->route('notes.index')->with('message', 'Note created successfully.');
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
        $note = AccountNote::find($id);
        return view('Note.edit', compact('note'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $lastAccountNote = AccountNote::orderBy('id', 'desc')->first();
        $lastMainBalance = $lastAccountNote ? $lastAccountNote->main_balance : 0;
        $balance = $request->credit - $request->debit;
        $mainBalance = $lastMainBalance + $balance;
        $note = AccountNote::find($id);

        $note->update([

            'name'                   => $request->name,
            'date'                   => $request->date,
            'description'            => $request->description,
            'quote_number'           => $request->quote_number,
            'po_number'              => $request->po_number,
            'job_number'             => $request->job_number,
            'work_done_by'           => $request->work_done_by,
            'quantity'               => $request->quantity,
            'units_price'            => $request->units_price,
            'total_price'            => $request->total_price,
            'total_cost'             => $request->total_cost,
            'job_report'             => $request->job_report,
            'bill_number'            => $request->bill_number,
            'bill_amount'            => $request->bill_amount,
            'paid_amount'            => $request->paid_amount,
            'debit'                  => $request->debit,
            'credit'                 => $request->credit,
            'balance'                => $request->credit - $request->debit ,
            'main_balance'           => $mainBalance  ,
            'debit_purpose'          => $request->debit_purpose,
            'credits_purpose'        => $request->credits_purpose,
            'invest_paid'            => $request->invest_paid,

        ]);

        return redirect()->route('notes.index')->with('message', 'Note Update successfully.');

    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
       AccountNote::find($id)->delete();
       return redirect()->back()->with('message', 'Note Delete successfully.');
    }
}
