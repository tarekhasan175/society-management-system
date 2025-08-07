<?php

namespace Module\Society\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Society\Models\Block;

class BlockController extends Controller
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
        $blocks = Block::latest()->paginate(10);
        return view('block.create',compact('blocks'));
    }

    public function edit($id)
    {
        $block = Block::findOrFail($id);
        return view('block.edit', compact('block'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'blockName' => ['required', 'string'],
        ]);
        Block::create([
            "blockName"  => $request['blockName'],
        ]);

        return  redirect()->route("block.create")->with(['success'=>'Block Successfully Created']);

    }

    public function update(Request $request, $id)
    {
        $block = Block::findOrFail($id);
        $request->validate([
            'blockName' => ['nullable', 'string'],
        ]);
        $block->update([
            "blockName"  => $request['blockName'],
        ]);

        return  redirect()->route("block.create")->with(['success'=>'Block Successfully Created']);

    }

    // public function delete($id)
    // {
    //     $block = Block::findOrFail($id);
    //     $block->delete();
    //     return redirect()->route("block.create")->with(['failed'=>'Block Deleted Successfully']);
    // }



    public function delete($id)
    {
        try {
            $block = Block::findOrFail($id);

            // Attempt to delete the block
            $block->delete();

            return redirect()->route('block.create')->with('success', 'Block deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle relational constraint violations or other database errors
            return redirect()->route('block.create')->with('error', 'Unable to delete block as it is linked to other records.');
        } catch (\Exception $e) {
            // Handle general exceptions
            return redirect()->route('block.create')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

}
