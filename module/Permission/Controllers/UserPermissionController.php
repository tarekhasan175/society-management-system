<?php

namespace Module\Permission\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;

use Module\Garments\Models\Merchandising\Order\OrderType;


use Module\Permission\Models\PermissionFeature;
use App\Models\User;
use App\Traits\CheckPermission;
use Exception;
use Illuminate\Http\Request;
use Module\Garments\Models\Merchandising\Setup\Buyer;
use Module\Permission\Models\EmployeePermission;
use Module\Permission\Models\Module;

class UserPermissionController extends Controller
{
    use CheckPermission;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index($id)
    {
        $this->hasAccess("permission.accesses.create");     // check permission
        
        $user                 = User::where('employee_id', $id)->where('status', 1)->first();

        

        $data['user']         = $user;
        $data['modules']      = Module::with('submodules.parent_permissions.permissions')->get();
        $data['companies']    = Company::pluck('name', 'id');
        $data['departments']  = Department::pluck('name', 'id');
        $data['designations'] = Designation::pluck('name', 'id');
        
        if(class_exists('Buyer')){ 
            $data['buyers']       = Buyer::pluck('name', 'id');
        }

        if(class_exists('OrderType')){ 
            $data['orderTypes']   = OrderType::orderBy('name')->pluck('name', 'id');
        }

        


        $data['isPermitted']      = $user->permissions()->pluck('slug')->toArray();
        $data['hasCompanies']     = $user->companies()->pluck('name')->toArray();
        $data['hasDepartments']   = $user->departments()->pluck('name')->toArray();
        $data['hasDesignations']  = $user->designations()->pluck('name')->toArray();
        $data['hasFeatures']      = PermissionFeature::where('status', 1)->pluck('name')->toArray();

        if(class_exists('Buyer')){ 
            $data['hasBuyers']        = $user->buyers()->pluck('name')->toArray();
        }

        if(class_exists('OrderType')){ 
            $data['hasOrderTypes']    = $user->order_types()->pluck('name')->toArray();
        }

        $user = User::where('status', 0)->where('employee_id', '!=', null)->pluck('employee_id');

        if(class_exists('Employee')){ 
            $data['employee_ids']       = Employee::whereNotIn('id', $user)->select('employee_full_id', 'email', 'company_id', 'department_id', 'designation_id', 'id','name')->with('department:name,id', 'designation:name,id')->get();
            $data['existing_employee']  = Employee::whereHas('user', function ($q) {
                $q->where('status', 1);
            })->get(['employee_full_id', 'id','name']);
        }

        return view('access.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $this->hasAccess("permission.accesses.create");     // check permission
    

        $data['existing_users'] = User::whereHas('permissions')->get();
        $data['new_users'] = User::whereDoesntHave('permissions')->where('id', '>', 1)->get();


        $data['modules']                = Module::where('name', '!=', 'Employee Permission')->with('submodules.parent_permissions.permissions')->active()->get();
        $data['companies']              = Company::pluck('name', 'id');

        $data['hasFeatures']            = $features = PermissionFeature::where('status', 1)->pluck('name')->toArray();

        if($request->filled('existing_user_id')) {

            $data['existingUser'] = $existingUser = User::find($request->existing_user_id);

            $data['isPermitted']      = $existingUser->permissions()->pluck('slug')->toArray();

            foreach($features as $feature) {

                if($feature == 'Company') {
                    $data['hasCompanies']     = $existingUser->companies()->pluck('name')->toArray();
                }

                if($feature == 'Department') {
                    $data['hasDepartments']   = $existingUser->departments()->pluck('name')->toArray();
                }
    
                if($feature == 'Designation') {
                    $data['hasDesignations']  = $existingUser->designations()->pluck('name')->toArray();
                }
    
                if($feature == 'Order Type' && class_exists('OrderType')) {
                    $data['hasOrderTypes']    = $existingUser->order_types()->pluck('name')->toArray();
                }
    
                if($feature == 'Buyer' && class_exists('Buyer')) {
                    $data['hasBuyers']        = $existingUser->buyers()->pluck('name')->toArray();
                }
            }
        }
        
        foreach($features as $feature) {

            if($feature == 'Company') {
                $data['companies'] = Company::pluck('name', 'id');
            }

            if($feature == 'Department') {
                $data['departments'] = Department::pluck('name', 'id');
            }

            // if($feature == 'Designation') {
            //     $data['designations'] = Designation::pluck('name', 'id');
            // }

            // if($feature == 'Order Type' && class_exists('OrderType')) {
            //     $data['orderTypes'] = OrderType::pluck('name', 'id');
            // }

            // if($feature == 'Buyer' && class_exists('Buyer')) {
            //     $data['buyers'] = Buyer::pluck('name', 'id');
            // }
            
        }


        return view('access.create', $data);
        // return view('access.create', $data);
    }

    
    
    // THIS METHOD WILL STORE USER PERMISSION
    public function store(Request $request)
    {


        $request->validate([
            'user_id'       => 'required',
        ]);




        try {
            $user = User::find($request->user_id);


            $hasFeatures     = PermissionFeature::where('status', 1)->pluck('name')->toArray();

            if (in_array('Company', $hasFeatures)) {
                $user->companies()->sync($request->companies);
            }
            

            if (in_array('Department', $hasFeatures)) {
                $user->departments()->sync($request->departments);
            }


            if (in_array('Designation', $hasFeatures)) {
                $user->designations()->sync($request->designations);
            }


            if (in_array('Buyer', $hasFeatures) && class_exists('Buyer')) {
                $user->buyers()->sync($request->buyers);
            }


            if (in_array('Order Type', $hasFeatures) && class_exists('OrderType')) {
                $user->order_types()->sync($request->order_types);
            }

            $user->permissions()->sync($request->permissions);

            return back()->with('message', 'Permission create success');

        } catch (Exception $ex) {

            return back()->with('error', $ex->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $this->hasAccess("permission.accesses.edit");     // check permission
      
        $data['user']         = User::find($id);
        $data['modules']      = Module::where('name', '!=', 'Employee Permission')->with('submodules.parent_permissions.permissions')->active()->get();
        $data['companies']    = Company::pluck('name', 'id');
        $data['departments']  = Department::pluck('name', 'id');
        $data['designations'] = Designation::pluck('name', 'id');
        if(class_exists('Buyer')) {

            $data['buyers']       = Buyer::pluck('name', 'id');
        }
        if(class_exists('OrderType')) {

            $data['orderTypes']   = OrderType::pluck('name', 'id');
        }

        $data['isPermitted']            = User::find($id)->permissions()->pluck('slug')->toArray();
        $data['hasCompanies']           = User::find($id)->companies()->pluck('name')->toArray();
        $data['hasDepartments']         = User::find($id)->departments()->pluck('name')->toArray();
        $data['hasDesignations']        = User::find($id)->designations()->pluck('name')->toArray();
        $data['hasFeatures']            = PermissionFeature::where('status', 1)->pluck('name')->toArray();
        if(class_exists('Buyer')) {

            $data['hasBuyers']              = User::find($id)->buyers()->pluck('name')->toArray();
        }
        if(class_exists('OrderType')) {

            $data['hasOrderTypes']          = User::find($id)->order_types()->pluck('name')->toArray();
        }

        return view('access.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user_created = User::find($id);

        
        $hasFeatures  = PermissionFeature::where('status', 1)->pluck('name')->toArray();

        if (in_array('Company', $hasFeatures)) {
            $user_created->companies()->sync($request->companies);
        }
        if (in_array('Department', $hasFeatures)) {
            $user_created->departments()->sync($request->departments);
        }
        if (in_array('Designation', $hasFeatures)) {
            $user_created->designations()->sync($request->designations);
        }
        if (in_array('Buyer', $hasFeatures) && class_exists('Buyer')) {
            $user_created->buyers()->sync($request->buyers);
        }
        if (in_array('Order Type', $hasFeatures) && class_exists('OrderType')) {
            $user_created->order_types()->sync($request->order_types);
        }

        $user_created->permissions()->sync($request->permissions);



        


        if(auth()->id() == $id) {
            session()->forget('slugs');
        }

        return back();
    }


    public function employeePermission(Request $request)
    {
        $this->hasAccess("permission.accesses.create");     // check permission
    

        $data['isEmployeePermitted']    = EmployeePermission::with('permission')->get()->pluck('permission.slug')->toArray();
        $data['modules']                = Module::where('name', 'Employee Permission')->with('submodules.parent_permissions.permissions')->active()->get();

        return view('access.employee-permission', $data);
    }

    public function employeePermissionStore(Request $request)
    {
        $this->hasAccess("permission.accesses.create");     // check permission
    
        try {
            
            // set permissions for employee
            EmployeePermission::whereNotIn('permission_id', $request->employee_permissions ?? [])->delete();

            $old_employee_permissions = EmployeePermission::pluck('permission_id')->toArray() ?? [];

            $new_items = array_diff(array_filter($request->employee_permissions), $old_employee_permissions);
            $employee_permissions = [];

            foreach ($new_items as $key => $new_item) {
                $employee_permissions[] = [
                    'permission_id' => $new_item
                ];
            }

            if (count($employee_permissions)) {
                EmployeePermission::insert($employee_permissions);
            }

            return back()->with('message', 'Permission assign successfully');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }







    // list of permitted users
    public function permittedUserList(Request $request)
    {

        $users = User::orderByDesc('id')
                ->select('name', 'id', 'email', 'company_id')
                ->with('company:name,id')
                ->where('status', '>', 0)
                ->whereHas('permissions')
                ->get();

        return view('permitted-user-list', compact('users'));
    }
}
