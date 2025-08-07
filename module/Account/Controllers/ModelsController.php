<?php

namespace Module\Account\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\ProductModels;

class ModelsController extends Controller
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
        $Model = ProductModels::all();
        return view('product.Model.index', compact('Model'));
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('product.Model.create');
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([ 'name' => 'required']);

        ProductModels::create($request->all());

        return redirect()->route('models.index')->with('message', 'Unit Create Successful');
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
        $unit = ProductModels::find($id);
        return view('product.Model.edit', compact('unit'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {

        $request->validate([ 'name' => 'required']);

        ProductModels::find($id)->update(['name' => $request->name]);

        return redirect()->route('models.index')->with('message', 'Brand Update Successful');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {

        try {
            ProductModels::destroy($id);
            return redirect()->route('models.index')->with('message', 'Model Successfully Deleted!');
        } catch (\Exception $ex) {
            return redirect()->back()->withMessage($ex->getMessage());
        }
    }
}
