<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\MoneyCollector;

class MoneyCollectorController extends Controller
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
        $moneyCollectors = MoneyCollector::latest()->paginate(10);
        return view('moneyCollector.create',compact('moneyCollectors'));
    }

    public function edit($id)
    {
        $moneyCollector = MoneyCollector::findOrFail($id);
        return view('moneyCollector.edit',compact('moneyCollector'));
    }


    public  function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
        MoneyCollector::create([
            "name" => $request['name'],
        ]);

        return back()->with(['success'=>'Money Collector Created Successfully']);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => ['required', 'string'],
    ]);

    $moneyCollector = MoneyCollector::findOrFail($id);
    $moneyCollector->update([
        "name" => $request->name,
    ]);
    return redirect()->route('moneyCollector.create')
                     ->with('success', 'Money Collector Successfully Updated');
}


    // public function delete($id)
    // {
    //     $moneyCollector = MoneyCollector::findOrFail($id);
    //     $moneyCollector->delete();
    //     return back()->with('faild','Money Collector Deleted Successfully');
    // }


    public function delete($id)
{
    try {
        $moneyCollector = MoneyCollector::findOrFail($id);

        // Attempt to delete the Money Collector
        $moneyCollector->delete();

        return back()->with('success', 'Money Collector deleted successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
        // Handle relational constraint violations or database errors
        return back()->with('error', 'Unable to delete Money Collector as it is linked to other records.');
    } catch (\Exception $e) {
        // Handle general exceptions
        return back()->with('error', 'An unexpected error occurred. Please try again.');
    }
}



}
