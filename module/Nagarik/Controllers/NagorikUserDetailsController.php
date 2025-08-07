<?php

namespace Module\Nagarik\Controllers;

use App\Helper\helpers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\NagorikUseDetails;
use Module\Nagarik\Models\NagorikUserInstantAddressDetails;
use Module\Nagarik\Models\NagorikUserPermanentAddressDetails;

class NagorikUserDetailsController extends Controller
{
    private $service;

//nagorik-users

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
        $data = [];
        return view('', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data = [];
        return view('', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        # code...
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
        $profile = User::with( 'details','instant', 'permanent')->find($id);
       return view('Dashboard.edit-profile' , compact('profile'));

    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request )
    {

        $fileObject           = $request->file('image');
        $directory            = 'NagorikUserProfile';
//        $uploadedFileUrl      = helpers::uploadFile($fileObject, $directory);
        $uploadedFileUrl      = self::uploadFile($fileObject, $directory) ;

        $userDetails = NagorikUseDetails::updateOrCreate(
                [
                    'user_id' => auth()->user()->id ,
                ],
                [

                'full_name' => $request->input('full_name'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'depent_name' => $request->input('depent_name'),
                'birth_date' => $request->input('birth_date'),
                'phone' => $request->input('phone'),
                'mail' => $request->input('mail'),
                'bin_no' => $request->input('bin_no'),
                'nid_no' => $request->input('nid_no'),
                'passport_no' => $request->input('passport_no'),
                'birth_no' => $request->input('passport_no'),
                'image' => $uploadedFileUrl,

            ]);

        $userInstantAddres = NagorikUserInstantAddressDetails::updateOrCreate(
                [
                    'user_id' => auth()->user()->id ,
                ],
                [

                'division'=>$request->input('division'),
                'district'=>$request->input('district'),
                'sub_district'=>$request->input('sub_district'),
                'post_code'=>$request->input('post_code'),
                'village'=>$request->input('village'),
                'road_no'=>$request->input('road_no'),
                'holding_no'=>$request->input('holding_no'),
                'details'=>$request->input('details'),
            ]);

          NagorikUserPermanentAddressDetails::updateOrCreate(

                [
                    'user_id' => auth()->user()->id ,

                ],
                [

                'division'=>$request->input('division'),
                'district'=>$request->input('district'),
                'sub_district'=>$request->input('sub_district'),
                'post_code'=>$request->input('post_code'),
                'village'=>$request->input('village'),
                'road_no'=>$request->input('road_no'),
                'holding_no'=>$request->input('holding_no'),
                'details'=>$request->input('details'),
            ]);

        return redirect()->route('nagorik-user-profile')->with('message' , 'প্রোফাইল আপডেট  সফল হয়েছে');

    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        # code...
    }




//    protected static $file, $fileName, $fileDirectory, $fileUrl;
//
//    public static function uploadFile($fileObject, $directory, $modelObject = null)
//    {
//        if ($fileObject)
//        {
//            if (file_exists($modelObject))
//            {
//                unlink($modelObject);
//            }
//            self::$fileName = rand(10, 999999).time().'.'.$fileObject->getClientOriginalExtension();
//            self::$fileDirectory = 'assets/'.$directory.'/';
//            $fileObject->move(self::$fileDirectory, self::$fileName);
//            self::$fileUrl = self::$fileDirectory.self::$fileName;
//        } else {
//            if ($modelObject == null)
//            {
//                self::$fileUrl = null;
//            } else {
//                self::$fileUrl = $modelObject;
//            }
//        }
//        return self::$fileUrl;
//
//
//    }

    protected static $fileName, $fileDirectory, $fileUrl;

    public static function uploadFile($fileObject, $directory, $modelObject = null)
    {
        if ($fileObject && $fileObject->isValid()) {

            self::$fileDirectory = public_path('assets/'.$directory.'/');
            if (!file_exists(self::$fileDirectory)) {
                mkdir(self::$fileDirectory, 0777, true);
            }

            if ($modelObject && file_exists($modelObject)) {
                // Delete the existing file if it exists
                unlink($modelObject);
            }

            self::$fileName = rand(10, 999999) . time() . '.' . $fileObject->getClientOriginalExtension();
            $fileObject->move(self::$fileDirectory, self::$fileName);
            self::$fileUrl = 'assets/'.$directory.'/'.self::$fileName;
        } else {
            if ($modelObject == null) {
                self::$fileUrl = null;
            } else {
                self::$fileUrl = $modelObject;
            }
        }
        return self::$fileUrl;
    }



}
