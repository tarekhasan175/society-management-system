<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\PaymentHead;

class PaymentHeadController extends Controller
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
        $paymentHeads = PaymentHead::all();
        return view('paymentHead.index',[
            'paymentHeads'=>$paymentHeads 
        ]);
    }


    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
       
        return view('paymentHead.create');
    }

    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        
        $rules = [
            'PaymentHeadName' => 'nullable|string|max:50',
            'PaymentHeadDescription' => 'nullable|string|max:2000',
            'PaymentType' => 'nullable|string|max:50',
            'IsActive' => 'nullable|boolean',
            'IsMandatory' => 'nullable|boolean',
            'IsOld' => 'nullable|boolean',
            'IsNew' => 'nullable|boolean',
        ];
        //validate check
        $validatedData = $request->validate($rules);
        $validatedData['IsActive'] = $request->has('IsActive') ? 1:0;
        $validatedData['IsOld'] = $request->has('IsOld') ? 1:0;
        $validatedData['IsMandatory'] = $request->has('IsMandatory') ? 1:0;
        $validatedData['IsNew'] = $request->has('IsNew') ? 1:0;

        
        //store data database
        PaymentHead::create($validatedData);
        //return redirectpaymentheads.index
        return redirect(route('paymentheads.index'))->withSuccess('New Payment Head Information Created');
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
        $paymentHead = PaymentHead::find($id);
        return view('paymentHead.edit',[
            'paymentHead'=> $paymentHead 
        ]);
    }


    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $paymentHead = PaymentHead::find($id);
        $rules = [
            'PaymentHeadName' => 'nullable|string|max:50',
            'PaymentHeadDescription' => 'nullable|string|max:2000',
            'PaymentType' => 'nullable|string|max:50',
            'IsActive' => 'nullable|boolean',
            'IsMandatory' => 'nullable|boolean',
            'IsOld' => 'nullable|boolean',
            'IsNew' => 'nullable|boolean',
        ];
        //validate check
        $validatedData = $request->validate($rules);
        $validatedData['IsActive'] = $request->has('IsActive') ? 1:0;
        $validatedData['IsOld'] = $request->has('IsOld') ? 1:0;
        $validatedData['IsMandatory'] = $request->has('IsMandatory') ? 1:0;
        $validatedData['IsNew'] = $request->has('IsNew') ? 1:0;
        //update data database
        $paymentHead->update($validatedData);
        //return redirect
        return redirect()->route('paymentheads.index')->withSuccess('Payment Head Information updated!');
       
    }

    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $paymentHead = PaymentHead::find($id);
        $paymentHead->delete();
        return back()->withSuccess('Payment Head Information Deleted');
    }
}