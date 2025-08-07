<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Block;
use Module\Society\Models\MoneyCollector;
use Module\Society\Models\Road;

class RoadController extends Controller
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
        $blocks             = Block::all();
        $moneyCollectors    = MoneyCollector::all();
        $roads              = Road::with('block','monycontroll')->latest()->paginate(10);
        return view('road.create', compact('roads', 'blocks', 'moneyCollectors'));
    }

    public function edit($id)
    {
        $road               = Road::findOrFail($id);
        $blocks             = Block::all();
        $moneyCollectors    = MoneyCollector::all();
        return view('road.edit', compact('road', 'blocks', 'moneyCollectors'));
    }

    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'roadID'                    => ['nullable', 'string'],
            'roadName'                  => ['nullable', 'string'],
            'block_name_id'             => ['nullable', 'string'],
            'blockName'                 => ['nullable', 'string'],
            'money_collector_name_id'   => ['nullable', 'string'],
            'moneyCollectorName'        => ['nullable', 'string'],
        ]);

        $blck   = Block::where('id', $request->block_name_id)->first();
        $roadID = $blck->blockName . '-' . $request->input("roadName");
        Road::create([
            "roadID"                                => $roadID,
            "roadName"                              => $request->input("roadName"),
            "block_name_id"                         => $request->input("block_name_id"),
            "blockName"                             => $request->input("blockName"),
            "money_collector_name_id"               => $request->input("money_collector_name_id"),
            "moneyCollectorName"                    => $request->input("moneyCollectorName"),
        ]);

        return back()->with('success', 'Road Information Created Successfully');

    }

    public function update(Request $request, $id)
    {

        $road = Road::find($id);
        $request->validate([
            'roadID'                        => ['nullable', 'string'],
            'roadName'                      => ['nullable', 'string'],
            'block_name_id'                 => ['nullable', 'string'],
            'blockName'                     => ['nullable', 'string'],
            'money_collector_name_id'       => ['nullable', 'string'],
            'moneyCollectorName'            => ['nullable', 'string'],
        ]);

        $blck   = Block::where('id', $request->block_name_id)->first();
        $roadID = $blck->blockName . '-' . $request->input("roadName");

        $road->update([
            "roadID"                            => $roadID,
            "roadName"                          => $request->input("roadName"),
            "block_name_id"                     => $request->input("block_name_id"),
            "blockName"                         => $request->input("blockName"),
            "money_collector_name_id"           => $request->input("money_collector_name_id"),
            "moneyCollectorName"                => $request->input("moneyCollectorName"),
        ]);
        return redirect(route('road.create'))->with('success', 'Road Information Updated Successfully');
    }


    // public function delete($id)
    // {
    //     $road = Road::find($id);
    //     $road->delete();
    //     return back()->with('failed','Road Information Deleted Successfully');
    // }



    public function delete($id)
    {
        try {
            $road = Road::findOrFail($id);

            // Attempt to delete the road
            $road->delete();

            return back()->with('success', 'Road information deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle relational constraint violations or database errors
            return back()->with('error', 'Unable to delete the road as it is linked to other records.');
        } catch (\Exception $e) {
            // Handle general exceptions
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }


}
