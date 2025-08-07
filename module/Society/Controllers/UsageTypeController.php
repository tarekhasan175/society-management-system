<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Module\Society\Models\Flat;
use Module\Society\Models\UsageType;


class UsageTypeController extends Controller
{
    private $service;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct() {}

    public function create()
    {
        $usageTypes = UsageType::latest()->paginate(10);
        return view('usageType.create', compact('usageTypes'));
    }

    public function edit($id)
    {
        $usageType = UsageType::findOrFail($id);
        return view('usageType.edit', compact('usageType'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'typeName' => ['nullable', 'string'],
            'title'    => ['nullable', 'string'],
            'amount'   => ['nullable', 'integer'],
        ]);

        UsageType::create([
            "typeName" => $request->input("typeName"),
            "title"    => $request->input("title"),
            "amount"   => $request->input("amount"),
        ]);

        return redirect(route('usageType.create'))->with('success', 'Usage Type Created Successfully');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'typeName'  => ['nullable', 'string'],
            'title'     => ['nullable', 'string'],
            'amount'    => ['nullable', 'integer'],
        ]);
        DB::beginTransaction(); // Start transaction

        try {
            $usageType = UsageType::findOrFail($id);
            $flats = Flat::where('usage_type_id', $id)->get();

            // Update the UsageType
            $usageType->update([
                "typeName" => $request->input("typeName"),
                "title"    => $request->input("title"),
                "amount"   => $request->input("amount"),
            ]);

            // Update the amount for all related flats
            foreach ($flats as $flat) {
                $flat->update([
                    "amount" => $request->input("amount"),
                ]);
            }

            DB::commit(); // Commit the transaction if everything succeeds
            return redirect(route('usageType.create'))->with('success', 'Usage Type Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of an error
            return redirect()->back()->with('error', 'An error occurred while updating Usage Type. Please try again.');
        }
    }

    // public function delete($id)
    // {
    //     $usageType = UsageType::findOrFail($id);
    //     $usageType->delete();
    //     return back()->with('failed','Usage Type Deleted Successfully');
    // }


    public function delete($id)
    {
        try {
            $usageType = UsageType::findOrFail($id);

            // Attempt to delete the Usage Type
            $usageType->delete();

            return back()->with('success', 'Usage Type deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle relational constraint violations or database errors
            return back()->with('error', 'Unable to delete Usage Type as it is linked to other records.');
        } catch (\Exception $e) {
            // Handle general exceptions
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
