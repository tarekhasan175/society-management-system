<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Plot;

use Module\Society\Models\UsageType;
use Module\Society\Models\Block;
use Module\Society\Models\MoneyCollector;
use Module\Society\Models\Road;
class PlotController extends Controller
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

        $usageTypes = UsageType::all();
        // $roads = Road::all()->unique('blockName')->values();
        $roads = Road::all();
        $block = Block::all();
           $plotInfos = Plot::with('block','road')->latest()->paginate(30);
        return view('plot.create', compact('roads', 'usageTypes', 'plotInfos', 'block'));
    }



    public function edit($id)
    {
          $plot = Plot::find($id);
        $usageTypes = UsageType::all();
          $roads = Road::all();
           $block = Block::all();
        return view('plot.edit', compact('roads', 'usageTypes', 'plot' , 'block'));
    }

    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'plotID'      => ['nullable', 'string'],
            'plotName'    => ['nullable', 'string'],
            'road_id'     => ['nullable', 'string'],
            'roadName'    => ['nullable', 'string'],
            'block_id'    => ['nullable', 'string'],
            'ownername.*' => ['nullable', 'string'],
            'remarks'     => ['nullable', 'string'],
        ]);



        $road = Road::where('id', $request->road_id)->first();
        $block = Block::where('id', $request->block_id)->first();
        $roadID = $block->blockName . '-' . $road->roadName;
        $plotID = $roadID . '-' . $request->input("plotName");


        $ownerNamesArray = $request->input('ownername');
        $ownerName = implode(',', $ownerNamesArray);
        Plot::create([
            "plotName"    => $request->input("plotName"),
            "roadID"      => $roadID,
            "plotID"      => $plotID,
            "road_id"     => $request->input("road_id"),
            "block_id"    => $request->input("block_id"),
            "ownername"   => $ownerName,

        ]);

        return redirect(route('plot.create'))->with('success', 'Plot is Created Successfully');
    }



    public function update(Request $request, $id)
    {

        // return $request->all();
        $plot = Plot::findOrFail($id);
        $request->validate([
            'plotID' => ['nullable', 'string'],
            'plotName' => ['nullable', 'string'],
            'roadID' => ['nullable', 'string'],
            'road_id' => ['nullable', 'string'],
            'block_id' => ['nullable', 'string'],
            'ownername.*' => ['nullable', 'string'],
            'remarks' => ['nullable', 'string'],
        ]);

       $ownerNamesArray = $request->input('ownername');
        $ownerName = implode(',', $ownerNamesArray);


        $road = Road::where('id', $request->road_id)->first();
        $block = Block::where('id', $request->block_id)->first();
        $roadID = $block->blockName . '-' . $road->roadName;
        $plotID = $roadID . '-' . $request->input("plotName");

        $plot->update([
            "plotName" => $request->input("plotName"),


            "roadID" => $roadID,
            "plotID" => $plotID,
            "road_id" => $request->input("road_id"),
            "block_id" => $request->input("block_id"),
            "ownername" => $ownerName,
            // "remarks" => $request->input("remarks"),
        ]);

        return redirect(route('plot.create'))->with('success', 'Plot is Updated Successfully');
    }




    // public function delete($id)
    // {
    //     $plot = Plot::findOrFail($id);
    //     $plot->delete();
    //     return redirect(route('plot.create'))->with('failed', 'Plot is Delered Successfully');
    // }



    public function delete($id)
{
    try {
        $plot = Plot::findOrFail($id);

        // Attempt to delete the plot
        $plot->delete();

        return redirect(route('plot.create'))->with('success', 'Plot deleted successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
        // Handle relational constraint violations or database errors
        return back()->with('error', 'Unable to delete the plot as it is linked to other records.');
    } catch (\Exception $e) {
        // Handle general exceptions
        return back()->with('error', 'An unexpected error occurred. Please try again.');
    }
}





    public function getRoadsByBlock($blockName)
    {
        $roads = Road::where('block_name_id', $blockName)->get();
        return response()->json($roads);
    }
}
