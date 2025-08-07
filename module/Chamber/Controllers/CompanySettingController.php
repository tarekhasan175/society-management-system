<?php

namespace Module\Chamber\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\CompanySetting;

class CompanySettingController extends Controller
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
        return view("companySetting.create");
    }

    public function list()
    {
        $companySettings = CompanySetting::latest()->get();
        return view("companySetting.list",compact('companySettings'));
    }

    public function edit($id)
    {
        $companySetting = CompanySetting::findOrFail($id);
        return view('companySetting.edit', compact('companySetting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=> "nullable|string",
            'address'=> "nullable|string",
            'isDefault'=> "nullable|string",
            'phone'=> "nullable|string",
            'fax'=> "nullable|string",
            'mobile'=> "nullable|string",
            'web'=> "nullable|string",
            'email'=> "nullable|string",
            'logo'=> "nullable|image",
            'sign'=> "nullable|image",
            'shortName'=> "nullable|string",
        ]);
        

        $imageName = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $imageName = rand() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('chamber/company/logo/'), $imageName);
        }
        

        $imageName1 = null;
        if ($request->hasFile('sign')) {
            $sign = $request->file('sign');
            $imageName1 = rand() . '.' . $sign->getClientOriginalExtension();
            $sign->move(public_path('chamber/company/sign/'), $imageName1);
        }
        
        CompanySetting::create([
            "name"=> $request->name,
            "address"=> $request->address,
            "isDefault"=> $request->has('isDefault') ? 1 : 0,
            "phone"=>$request->phone,
            "fax"=>$request->fax,
            "mobile"=>$request->mobile,
            "web"=>$request->web,
            "email"=>$request->email,
            "shortName"=>$request->shortName,
            "logo"=>$imageName, 
            "sign"=>$imageName1,
        ]);

        
        
        return redirect()->route("companySetting.list");
        
    }
    public function update(Request $request, $id)
    {
        $companySetting = CompanySetting::findOrFail($id);

        $request->validate([
            "name"=> "nullable|string",
            'address'=> "nullable|string",
            'isDefault'=> "nullable|string",
            'phone'=> "nullable|string",
            'fax'=> "nullable|string",
            'mobile'=> "nullable|string",
            'web'=> "nullable|string",
            'email'=> "nullable|string",
            'shortName'=> "nullable|string",
        ]);
        
        $imageName = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $imageName = rand() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('chamber/company/logo/'), $imageName);
        }
        

        $imageName1 = null;
        if ($request->hasFile('sign')) {
            $sign = $request->file('sign');
            $imageName1 = rand() . '.' . $sign->getClientOriginalExtension();
            $sign->move(public_path('chamber/company/sign/'), $imageName1);
        }
        $updateData = [];

        if ($imageName) {
            $updateData['logo'] = $imageName;
        }

        if ($imageName1) {
            $updateData['ownerImage'] = $imageName1;
        }

        if (!empty($updateData)) {
            $companySetting->update($updateData);
        }
        $companySetting->update([
            "name"=> $request->name,
            "address"=> $request->address,
            "isDefault"=> $request->has('isDefault') ? 1 : 0,
            "phone"=>$request->phone,
            "fax"=>$request->fax,
            "mobile"=>$request->mobile,
            "web"=>$request->web,
            "email"=>$request->email,
            "shortName"=>$request->shortName,
        ]);

        
        return redirect()->route("companySetting.list");
        
    }


    public function delete($id)
    {
        $companySetting = CompanySetting::findOrFail($id);
        @unlink('chamber/company/logo/'.$companySetting->logo);
        @unlink('chamber/company/sign/'.$companySetting->sign);
        $companySetting->delete();
        return redirect()->route('companySetting.list');
    }



}
