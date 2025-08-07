<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\FirmStatus;

class FirmStatusController extends Controller
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
        $statuses = FirmStatus::latest()->get();
        return view('firmStatus.create',compact('statuses'));
    }

    public function edit($id)
    {
        $status = FirmStatus::find($id);
        return view('firmStatus.edit',compact('status'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $this->validate($request, [
            "firmStatusName"=> "string",
        ]);
        FirmStatus::create([
            "firmStatusName"=> $validated['firmStatusName'],
        ]);
        return back();
    }

    public function update(Request $request, $id)
    {
        $status = FirmStatus::find($id);
        // Validate the request
        $validated = $this->validate($request, [
            "firmStatusName"=> "string",
        ]);
        $status->update([
            "firmStatusName"=> $validated['firmStatusName'],
        ]);
        return redirect(route('firmStatus.create'));
    }


    public function delete($id)
    {
        $status = FirmStatus::find($id);
        $status->delete();
        return back();
    }


}
