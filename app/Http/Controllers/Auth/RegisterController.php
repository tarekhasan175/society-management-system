<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\SmsOTPController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $sendOTP;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SmsOTPController $sendOTP)
    {
        $this->middleware('guest');
        $this->sendOTP = $sendOTP;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $otp = rand(1000, 9999);
        $this->sendOTP->sendOTP($data['phone'], $otp);
        return \App\Models\User::create([
            'type' => 'user',
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'phone_otp' => $otp,
            'status' => 0,
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        event(new Registered($user));
        return $user;
    }

    public function validationCheck(Request $request)
    {
        $email = \App\Models\User::where('email', $request->input('Email'))->where('status', 1)->count();
        $phone = \App\Models\User::where('phone', $request->input('Phone'))->where('status', 1)->count();
        \App\Models\User::where('email', $request->input('Email'))->where('status', 0)->delete();
        \App\Models\User::where('phone', $request->input('Phone'))->where('status', 0)->delete();
        return response()->json(['email'=> $email, 'phone'=> $phone]);
    }
}
