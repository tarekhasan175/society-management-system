<?php

namespace Module\Nagarik\Controllers;

use App\Http\Controllers\Controller;

use App\Models\BusinessType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\FinancialYear;
use Module\Nagarik\Models\NagorikBlock;
use Module\Nagarik\Models\NagorikBusinessType;
use Module\Nagarik\Models\NagorikInstituteType;
use Module\Nagarik\Models\NagorikRoadAdd;
use Module\Nagarik\Models\NagorikSector;
use Module\Nagarik\Models\NagorikWordAdd;
use Module\Nagarik\Models\NagoriLicenceFee;
use Module\Nagarik\Models\OldTradeLicenseModel;
use Module\Nagarik\Models\RegionModel;
use Module\Nagarik\Services\TradeLicenseService;


class TradeLicenceController extends Controller
{
    private $service;
    protected $tradeLicenseService;

    public  function addTradeNumber()
    {
        return view('Trade-licence.Add-new-number');
    }
    public  function NewTradeApply()
    {
        //
    }
    public  function NewTradeSearch()
    {
        return view('Trade-licence.New-trade-search');
    }
    public  function NewLicenceSearch()
    {

      $financeYear      = FinancialYear::all();
      $businessType     = NagorikBusinessType::all();
      $licenceFee       = NagoriLicenceFee::all();
      $Additional       = \Module\Nagarik\Models\NagorikAdditionalDescript::all();
      $InstituteType    = NagorikInstituteType::all();
      $cityAdd          = CityAreaAdd::all();
      $wordAdd          = NagorikWordAdd::all();
      $sectorAdd        = NagorikSector::all();
      $bkockAdd         = NagorikBlock::all();
      $roadAdd          = NagorikRoadAdd::all();


        return view('Trade-licence.Old-licence-apply' ,
            compact
            (
                'financeYear' , 'businessType' ,
                'licenceFee' ,'Additional' , 'InstituteType' ,'cityAdd' ,
                'wordAdd' ,'sectorAdd', 'bkockAdd' , 'roadAdd'
        ));
    }






    public  function TradeFee()
    {
        return view('Trade-licence.Trade-fee');
    }
    public  function TradeReRege()
    {
        return view('Trade-licence.Trade-Re-rege');
    }

    public  function LicencePrint()
    {
        return view('Trade-licence.Licence-print');
    }

    public  function OwnerChange()
    {
        return view('Trade-licence.Owner-change');
    }
    public  function ChangeBusinessType()
    {
        return view('Trade-licence.Change-business-type');
    }

    public function __construct(TradeLicenseService $tradeLicenseService)
    {
        $this->tradeLicenseService = $tradeLicenseService;
    }


    public function index()
    {
        $data['old_licenses'] = OldTradeLicenseModel::where('user_id', auth()->user()->id)
                                    ->where('is_new_license', 2)->paginate(10);
        return view('Trade-licence.old-trade-license-index', $data);
    }


    public  function dashboard()
    {

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $this->tradeLicenseService->oldTradeLicenseApplication($request, null);
        return redirect(route('old-trade-license.index'));
    }


    public function show($id)
    {
        $data['old_license'] = OldTradeLicenseModel::find($id);
        return view('Trade-licence.old-trade-license-show', $data);
    }


    public function edit(Request $request, $id)
    {
        $financeYear      = FinancialYear::all();
        $businessType     = NagorikBusinessType::all();
        $licenceFee       = NagoriLicenceFee::all();
        $Additional       = \Module\Nagarik\Models\NagorikAdditionalDescript::all();
        $InstituteType    = NagorikInstituteType::all();
        $cityAdd          = CityAreaAdd::all();
        $wordAdd          = NagorikWordAdd::all();
        $sectorAdd        = NagorikSector::all();
        $bkockAdd         = NagorikBlock::all();
        $roadAdd          = NagorikRoadAdd::all();

        $oldLicense = OldTradeLicenseModel::find($id);


        return view('Trade-licence.old-trade-license-edit' ,
            compact
            (
                'financeYear' , 'businessType' ,
                'licenceFee' ,'Additional' , 'InstituteType' ,'cityAdd' ,
                'wordAdd' ,'sectorAdd', 'bkockAdd' , 'roadAdd', 'oldLicense'
            ));
    }


    public function update(Request $request, $id)
    {
        $this->tradeLicenseService->oldTradeLicenseApplication($request, $id);
        return redirect(route('old-trade-license.index'));
    }


    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $oldLicense = OldTradeLicenseModel::find($id);
            if (file_exists($oldLicense->attachment_image)) {
                unlink($oldLicense->attachment_image);
            }
            if (file_exists($oldLicense->business_land_image)) {
                unlink($oldLicense->business_land_image);
            }
            $oldLicense->delete();
        });
        return redirect(route('old-trade-license.index'));
    }

    public function getFactoryData(Request $request)
    {

    }



    public  function getLicenceFee(Request $request)
    {
        $Year = $request->input('Fyear');
        $Type = $request->input('Btype');
        $fee =  NagoriLicenceFee::where('financial_year_id', $Year)
                                ->where('nagorik_business_type_id', $Type )
                                ->firstorFail();
        return $fee;
    }
    public  function cityTOword(Request $request)
    {
        $City = $request->input('City');

        $word =  NagorikWordAdd::where('city_area_id', $City)

                                ->get();
        return $word;
    }
    public  function wordTosector(Request $request)
    {
        $City = $request->input('Word');

        $sector=  NagorikSector::where('nagorik_word_id', $City)

                                ->get();
        return $sector;
    }
    public  function blockToblock(Request $request)
    {
        $block = $request->input('Section');

        $sector=  NagorikBlock::where('nagorik_sector_id', $block)

                                ->get();
        return $sector;
    }

    public  function blockToroad(Request $request)
    {
        $road = $request->input('Block');

        $sector=  NagorikRoadAdd::where('nagorik_block_id', $road)

                                ->get();
        return $sector;
    }


}
