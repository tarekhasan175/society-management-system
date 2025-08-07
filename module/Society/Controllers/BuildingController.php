<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Block;
use Module\Society\Models\Plot;
use Module\Society\Models\Road;
use Module\Society\Models\UsageType;
use Illuminate\Support\Facades\Log;

use Module\Society\Models\HouseOrBuilding;


class BuildingController extends Controller
{
    private $service;

    public function __construct() {}

    public function create()
    {
        $blocks  = Block::all();
        // $blocks = Plot::select('block_id')->distinct()->get();
           $houses = HouseOrBuilding::with('block','road','plot','usagestatus')->latest()->paginate(30);
         $usage_type = UsageType::all();
        return view('building.create', compact('blocks', 'houses', 'usage_type'));
    }





    public function store(Request $request)
    {

        // return $request->all();
        $request->validate([
            'block_id' => ['required', 'string'],
            'road_id' => ['required', 'string'],
            'plot_id' => ['required', 'string'],
            'houseOrBuildingName' => ['required', 'string'],
            'storey' => ['nullable', 'string'],
            'totalFlat' => ['nullable', 'string'],
            'usage_type_id' => ['required', 'string'],
        ]);

        $road = Road::where('id', $request->road_id)->first();
        $block = Block::where('id', $request->block_id)->first();
        $plot = Plot::where('id', $request->plot_id)->first();


        $houseOrBuildingId = $block->blockName . '-' .  $road->roadName . '-' . $plot->plotName . '-' . $request->input("houseOrBuildingName");

        HouseOrBuilding::create([
            "block_id" => $request->input("block_id"),
            "road_id" => $request->input("road_id"),
            "plot_id" => $request->input("plot_id"),
            "houseOrBuildingName" => $request->input("houseOrBuildingName"),
            "houseOrBuildingId" => $houseOrBuildingId,
            "storey" => $request->input("storey"),
            "totalFlat" => $request->input("totalFlat"),
            "usage_type_id" => $request->input("usage_type_id"),
        ]);

        return redirect(route('building.create'))->with('success', 'House/Building created successfully');
    }



    public function edit($id)
    {
        $houseOrBuilding = HouseOrBuilding::findOrFail($id);
        // $blocks = Plot::select('block')->distinct()->get();
        $roads = [];
        $plots = [];

        $blocks  = Block::all();
        $roadss = Road::all();

        $plotss = Plot::all();

        // $blocks = Plot::select('block_id')->distinct()->get();
        $usage_type = UsageType::all();

        if ($houseOrBuilding->block) {
            $roads = Road::where('blockName', $houseOrBuilding->block)->distinct()->get();
        }

        if ($houseOrBuilding->road) {
            $plots = Plot::where('roadName', $houseOrBuilding->road)->distinct()->get();
        }

        return view('building.edit', compact('blocks', 'houseOrBuilding', 'roads', 'plots' ,'roadss','plotss' , 'usage_type'));
    }



    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'block_id' => ['required', 'string'],
            'road_id' => ['required', 'string'],
            'plot_id' => ['required', 'string'],
            'houseOrBuildingName' => ['required', 'string'],
            'storey' => ['nullable', 'string'],
            'totalFlat' => ['nullable', 'string'],
            'usage_type_id' => ['required', 'string'],
        ]);

        // Find the house or building by ID
        $houseOrBuilding = HouseOrBuilding::findOrFail($id);

        // Construct IDs based on the input
        $road = Road::where('id', $request->road_id)->first();
        $block = Block::where('id', $request->block_id)->first();
        $plot = Plot::where('id', $request->plot_id)->first();


        $houseOrBuildingId = $block->blockName . '-' .  $road->roadName . '-' . $plot->plotName . '-' . $request->input("houseOrBuildingName");

        // Update the house or building attributes
        $houseOrBuilding->update([
            "block_id" => $request->input("block_id"),
            "road_id" => $request->input("road_id"),
            "plot_id" => $request->input("plot_id"),
            "houseOrBuildingName" => $request->input("houseOrBuildingName"),
            "houseOrBuildingId" => $houseOrBuildingId,
            "storey" => $request->input("storey"),
            "totalFlat" => $request->input("totalFlat"),
            "usage_type_id" => $request->input("usage_type_id"),
        ]);

        // Redirect back to the edit page or a relevant page with success message
        return redirect()->route('building.create', $houseOrBuilding->id)
            ->with('success', 'House/Building updated successfully');
    }


    // public function delete($id)
    // {
    //     $houseOrBuilding = HouseOrBuilding::findOrFail($id);
    //     $houseOrBuilding->delete();

    //     return redirect()->route('building.create')
    //         ->with('success', 'House/Building deleted successfully');
    // }



    public function delete($id)
    {
        try {
            $houseOrBuilding = HouseOrBuilding::findOrFail($id);

            // Attempt to delete the House or Building
            $houseOrBuilding->delete();

            return redirect()->route('building.create')
                ->with('success', 'House/Building deleted successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle relational constraint violations or database errors
            return back()->with('error', 'Unable to delete the House/Building as it is linked to other records.');
        } catch (\Exception $e) {
            // Handle general exceptions
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }



    public function getRoadsByplot($blockName)
    {
        $roads = Road::where('block_name_id', $blockName)->get();
        return response()->json($roads);
    }


    public function getRoadInfoByBlock($blockName)
    {
        // $roads = Plot::where('block_id', $blockName)->with('road')->get();

        $roads = Road::where('block_name_id', $blockName)
            ->get()
            ->unique('id');

        return response()->json($roads);
    }

    public function getPlotInfoByRoad($roadName)
    {
        $plots = Plot::where('road_id', $roadName)->get();
        return response()->json($plots);
    }

}
