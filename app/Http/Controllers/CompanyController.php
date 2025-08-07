<?php

namespace App\Http\Controllers;

use App\Models\BusinessType;
use App\Models\Company;
use App\Models\CompanyBankAccount;
use App\Models\CompanyDetails;
use App\Models\User;
use App\Traits\CheckPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use CheckPermission;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->hasAccess("company.infos.view");     // check permission

        $companies = auth()->id() == 1
            ? Company::with('group', 'business', 'company_details', 'company_bank_account')
                        ->latest()
                        ->paginate(30)

            : Company::with('group', 'business', 'company_details', 'company_bank_account')
                ->whereIn('id', auth()->user()->companies->pluck('id'))
                ->latest()
                ->paginate(30);


        return view('global.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->hasAccess("company.infos.create");     // check permission

        $data['business_types'] = BusinessType::all();

        return view('global.companies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();

        $company->validate($request);

        try {
            $slug = str_slug($request->name, '_');
            $logo = $request->file('logo');
            if ($logo) {
                $logoName = $company->logoUpload($logo, $slug);
                $id = $company->storeCompany($request, $logoName);
                if ($request->vat_no) {
                    $company->storeCompanyDetails($request, $id);
                } elseif ($request->account_name) {
                    $company->storeCompanyBankAccount($request, $id);
                }
            } else {
                $logoName = 'default.png';
                $id = $company->storeCompany($request, $logoName);
                if ($request->vat_no) {
                    $company->storeCompanyDetails($request, $id);
                } elseif ($request->account_name) {
                    $company->storeCompanyBankAccount($request, $id);
                }
            }
            $this->uploadHeaderFooter($request, $id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
        return redirect()->back()->with('message', 'Company Added Successful');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->hasAccess("company.infos.edit");     // check permission


        $data['business_types'] = BusinessType::all();

        $data['company'] = Company::findorFail($id);

        return view('global.companies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $company = new Company();

        $company->updateValidate($request);

        try {
            $slug = str_slug($request->name, '_');
            $logo = $request->file('logo');

            if ($logo) {
                $logoName = $company->logoUpdate($logo, $slug, $id);
                $company->updateCompany($request, $logoName, $id);
                $company->updateCompanyDetails($request, $id);
                $company->updateCompanyBankAccount($request, $id);
            } else {
                $getLogo = $company->where('id', $id)->select('logo')->firstOrFail();
                $logoName = $getLogo->logo;
                $company->updateCompany($request, $logoName, $id);
                $company->updateCompanyDetails($request, $id);
                $company->updateCompanyBankAccount($request, $id);
            }
            $this->uploadHeaderFooter($request, $id);
        } catch (\Exception $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error', 'You Can not delete or update because this information is use in another table.')->withInput();
            }
        }
        return redirect()->back()->with('message', 'Company Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->hasAccess("company.infos.delete");     // check permission
        $company = Company::findOrFail($id);
        try {
            $getUser = User::where('company_id', $id)->first();
            if (!$getUser) {

                $details = CompanyDetails::where('company_id', $id)->first();
                if($details){
                    if($details->header) {
                        @unlink('uploads/company/extra/' . $details->header);
                    }
                    if($details->footer) {
                        @unlink('uploads/company/extra/' . $details->footer);
                    }
                    $details->delete();
                }

                CompanyBankAccount::where('company_id', $id)->delete();
                if ($company->logo != 'default.png') {
                    @unlink('uploads/company/' . $company->logo);
                }
                $company->delete();
            } else {
                return redirect()->back()->with('error', 'You Can not delete this Company because this company is use in another table!');
            }
        } catch (\Exception $e) {
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error', 'You Can not delete this Company because this company is use in another table!');
            } else {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        return redirect()->back()->with('message', 'Your Company Info Deleted Successful');
    }

    private function uploadHeaderFooter($request, $id)
    {
        $details = CompanyDetails::firstOrCreate(['company_id' => $id]);
        if($request->has('header'))
        {
            $details->header = $this->upload($request->header, str_slug($request->name . '_header', '_'), $details->header);
        }

        if($request->has('footer'))
        {
            $details->footer = $this->upload($request->footer, str_slug($request->name . '_footer', '_'), $details->footer);
        }

        if($request->has('organogram'))
        {
            $details->organogram = $this->upload($request->organogram, str_slug($request->name . '_organogram', '_'), $details->organogram);
        }
        $details->save();
    }

    public function upload($file, $slug, $path)
    {
        $currentDate = Carbon::now()->toDateString();
        $name   = $slug . '_' . $currentDate . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        if (!file_exists('uploads/company/extra')) {
            mkdir('uploads/company/extra', 0777, true);
        }
        if($path && file_exists('uploads/company/extra/'.$path))
        {
            @unlink('uploads/company/extra/' . $path);
        }
        $file->move('uploads/company/extra',$name);

        return $name;
    }
}
