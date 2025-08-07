<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SmsOTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $this->sendOTP();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendOTP($receiveNumber, $otp)
    {
        $apiKey = env('SMS_OTP_API_KEY');
        $secretKey = env('SMS_OTP_SECRET_KEY');
        $callerID = env('SMS_OTP_SENDER_ID');
        $messageContent = "Your Nagarikseba registration OTP is ".$otp;
        $toUser = $receiveNumber;
        $url = env('SMS_OTP_BASE_URL');
        $url .= "?apikey=$apiKey&secretkey=$secretKey&callerID=$callerID&messageContent=$messageContent&toUser=$toUser";
        $client = new Client();
        try {
            $response = $client->request('GET', $url);
            $body = $response->getBody();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return $e->getMessage();
        }
    }

    public function checkPhoneOTP(Request $request)
    {
        $phone = $request->input('Phone');
        $otp = $request->input('OTP');
        $check = User::where('phone', $phone)->where('phone_otp', $otp)->count();
        if ($check === 1){
            User::where('phone', $phone)->where('phone_otp', $otp)->update(['status' => 1]);
            $checkStatus = 1;
        }
        else{
            $checkStatus = 0;
        }
        return $checkStatus;
    }
}
