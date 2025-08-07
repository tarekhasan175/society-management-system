<?php

namespace Module\Permission\Controllers;

use Exception;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Module\HRM\Models\Employee\Employee;

class UserController extends Controller
{



    public function index(Request $request)
    {
        $users = User::when(!isSystemAdmin(), function($q) {
                            $q->whereHas('companies');
                        })
                        ->where('type', 'admin')
                        ->active()
                        ->paginate(20);

        return view('users.index', compact('users'));
    }







    public function create()
    {
        $companies = Company::userCompanies();
        return view('users.create', compact('companies'));
    }






    public function store(Request $request)
    {

        $request->validate([
            'name'              => 'required',
            'email'             => 'required|unique:users,email',
            'password'          => 'required',
            'phone'             => 'required',
            'confirm_password'  => 'same:password',
        ]);
        
        try {
            User::create([
                'name'              => $request->name,
                'type'              => 'admin',
                'email'             => $request->email,
                'phone'             =>$request->phone,
                'company_id'        => $request->company_id ?? 1,
                'password'          => Hash::make($request->password)
            ]);

        } catch(\Exception $ex) {

            return redirect()->back()->withInput($request->all())->withError($ex->getMessage());
        }

        return redirect()->route('users.index')->withMessage('User Successfully Created');
    }





    public function edit($id)
    {
        $data['user']       = User::findOrFail($id);
        $data['companies']  = Company::userCompanies();

        return view('users.edit', $data);
    }






    public function update(Request $request, $id)
    {

        // <!-- Validation Data -->
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|unique:users,email,'.$id,
        ]);




        // <!-- Store Data -->
        try {
            User::where('id', $id)->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'company_id'        => $request->company_id,
            ]);

        } catch(\Exception $ex) {

            return redirect()->back()->withError($ex->getMessage());
        }


        return redirect()->route('users.index')->withMessage('User Successfully Updated');
    }






    public function destroy($id)
    {
        try {

            User::destroy($id);

            return redirect()->back()->withMessage('User Successfully Deleted!');

        } catch(\Exception $ex) {

            return redirect()->back()->withError('This user allready used in another');
        }
    }






    // password change page
    public function changePassword()
    {
        return view('users.change_password');
    }






    // admin change any users password
    public function AdminChangePassword($id)
    {
        return view('users.change_password_by_admin', ['user' => User::find($id)]);
    }






    // update users password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            return redirect()->back()->with('message', 'Password change successfully');

        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'Some error please check');
        }
    }



    // update users password by admin
    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'email'             => ['required'],
            'new_password'      => ['required'],
            'confirm_password'  => ['same:new_password'],
        ]);

        try {
            User::find($request->id)->update([

                'email'    => $request->email,
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('message', 'Password change successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Some error please check');
        }
    }



    public function addUserFromEmployee()
    {
        $employees = Employee::whereDoesntHave('user')->whereNotNull('email')->take(50)->get()
        ->map(function($employee) {
            return [
                'name'          => $employee->name,
                'employee_id'   => $employee->id,
                'company_id'    => $employee->company_id,
                'email'         => $employee->email,
                'password'      => Hash::make(12345678),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        })->toArray();

        User::insert($employees);

        return count($employees) . ' user created successfully';
    }
}
