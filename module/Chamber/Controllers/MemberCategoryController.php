<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\MemberCategory;

class MemberCategoryController extends Controller
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
        $memberCategories = MemberCategory::latest()->get();
        return view("memberCategory.create",compact('memberCategories'));
    }


    public function edit($id){
        $memberCategories = MemberCategory::findOrFail($id);
        return view("memberCategory.edit",compact('memberCategories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            "memberCategoryName"=> "string",
        ]);

        MemberCategory::create([
            "memberCategoryName"=> $request->memberCategoryName,
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $memberCategories = MemberCategory::findOrFail($id);

        $this->validate($request, [
            "memberCategoryName"=> "string",
        ]);

        $memberCategories->update([
            "memberCategoryName"=> $request->memberCategoryName,
        ]);

        return redirect(route('memberCategory.create'));
    }

    public function destroy($id)
    {
        $memberCategories = MemberCategory::findOrFail($id);
        $memberCategories->delete();
        return redirect(route('memberCategory.create'));
    }

}
