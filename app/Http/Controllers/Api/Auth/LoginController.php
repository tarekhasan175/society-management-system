<?php


namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController
{
    public function login(Request $request)
    {
        $res = ['status' => false, 'token' => '', 'message' => 'Sorry, email/employee id and password do not match'];

        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required|string'
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', $request->email)->orWhere('employee_full_id', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {

                $user->device_token = $request->device_token;
                $user->api_token = $user->id .'t'. Str::random(70);
                $user->save();

                $res['status']              = true;
                $res['token']               = $user->api_token;
                $res['device_token']        = $user->device_token;
                $res['message']             = '';
                $res['company_id']          = $user->company_id;
                $res['user_id']             = $user->id;
                $res['employee_id']         = $user->employee_id;
                $res['employee_full_id']    = $user->employee_full_id;
                $res['is_active']           = $user->status == 1 ? true : false;
            }
        }

        return response()->json($res);
    }


    public function loggout(Request $request)
    {
        
        $res = ['status' => false, 'message' => 'Sorry, loggout not possible'];


        if ($request->filled('user_id') || $request->filled('api_token')) {

            $user = User::where('id', $request->user_id)->orWhere('api_token', $request->token)->first();

            if ($user) {
                $user->api_token = null;
                $user->device_token = null;
                $user->save();

                $res = ['status' => true, 'message' => 'You are successfully logged out!'];

            }
 
        } else {

            $res = ['status' => false, 'message' => 'User Id or Token Must be Required'];
        }

        return response()->json($res);
    }
}
