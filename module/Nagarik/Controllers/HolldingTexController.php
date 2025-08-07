<?php

namespace Module\Nagarik\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\HoldingTexApply;
use Module\Nagarik\Models\NagorikBlock;
use Module\Nagarik\Models\NagorikLandType;
use Module\Nagarik\Models\NagorikRoadAdd;
use Module\Nagarik\Models\NagorikSector;
use Module\Nagarik\Models\NagorikUseDetails;
use Module\Nagarik\Models\NagorikUserInstantAddressDetails;
use Module\Nagarik\Models\NagorikUserPermanentAddressDetails;
use Module\Nagarik\Models\NagorikWordAdd;


class HolldingTexController extends Controller
{
//holding-tex

    public function __construct()
    {

    }


    public function index()
    {
        $cityAdd          = CityAreaAdd::all();
        $wordAdd          = NagorikWordAdd::all();
        $sectorAdd        = NagorikSector::all();
        $bkockAdd         = NagorikBlock::all();
        $roadAdd          = NagorikRoadAdd::all();
        $NagorikLandType  = NagorikLandType::all();
        $profile = NagorikUseDetails::where('user_id', auth()->user()->id)->first();
        $profileInstAdd = NagorikUserInstantAddressDetails::where('user_id', auth()->user()->id)->first();
        $profilePerAdd = NagorikUserPermanentAddressDetails::where('user_id', auth()->user()->id)->first();


        return view('Holding-Tex.new-apply' ,
            compact(
                'cityAdd' ,'wordAdd',
                        'sectorAdd' , 'bkockAdd' ,'roadAdd',
                'profile','profileInstAdd' , 'profilePerAdd',
                'NagorikLandType'

            ));


    }

    public function addNewHoldingNumber()
    {
        return view('Holding-Tex.add_holding_number');
    }

    public  function addGeneralRequest()
    {
        return view('Holding-Tex.general_request');
    }

    public  function eHoldingDashboar()
    {
        $holdingTex = HoldingTexApply::where('user_id', auth()->user()->id)
            ->with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad')
            ->where('h_apply_status', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Holding-Tex.E-holding-dashboard',compact('holdingTex'));
    }

    public function eHoldingShow($id)
    {
        $HoldingData = HoldingTexApply::with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad')
            ->where('h_apply_status', '1')
            ->find($id);
        return view('Holding-Tex.side-section.E-holdingDashboard.show' , compact('HoldingData'));


    }



    public  function eHoldingNotice()
    {
        return view('Holding-Tex.E-holding-notice');
    }

    public  function eHoldingDetails()
    {
        return view('Holding-Tex.E-holding-details');
    }
    public  function nameGiven()
    {
        return view('Holding-Tex.Name-Given');
    }

    public  function dueReport()
    {
        return view('Holding-Tex.Due-report');
    }

    public  function quickPay()
    {
        return view('Holding-Tex.Quick-pay');
    }
    public  function otherPayment()
    {
        return view('Holding-Tex.Others-payment');
    }

    public  function TexDetails()
    {
        return view('Holding-Tex.Tex-details');
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
