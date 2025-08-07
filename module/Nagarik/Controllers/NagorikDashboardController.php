<?php

namespace Module\Nagarik\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Module\Nagarik\Models\NagorikUseDetails;
use Module\Nagarik\Models\NagorikUserInstantAddressDetails;
use Module\Nagarik\Models\NagorikUserPermanentAddressDetails;


class NagorikDashboardController extends Controller
{



    public  function naorikdashboard()
    {
        return view('Dashboard.dashboard');
    }

    public  function NagarikUserProfile ()

    {

        $profile = NagorikUseDetails::where('user_id', auth()->user()->id)->first();
        $profileInstAdd = NagorikUserInstantAddressDetails::where('user_id', auth()->user()->id)->first();
        $profilePerAdd = NagorikUserPermanentAddressDetails::where('user_id', auth()->user()->id)->first();

        return view('Dashboard.Profile', compact('profile' ,'profileInstAdd','profilePerAdd'));
    }

    public function __construct()
    {

    }




    public function index()
    {


    }





    public function create()
    {

    }


    public function store(Request $request)
    {

    }






    public function show($id)
    {

    }


    public function edit(Request $request)
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {

    }



    public function getFactoryData(Request $request)
    {

    }


}
