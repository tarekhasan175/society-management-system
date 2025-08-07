<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use Module\Nagarik\Services\TradeLicenseService;

class NewTradeLicenseController extends Controller
{
    private $service;
    protected $tradeLicenseService;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(TradeLicenseService $tradeLicenseService)
    {
        $this->tradeLicenseService = $tradeLicenseService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data['old_licenses'] = OldTradeLicenseModel::where('user_id', auth()->user()->id)
            ->where('is_new_license', 1)->paginate(10);
        return view('Trade-licence.new-trade-license-index', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
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


        return view('Trade-licence.New-trade-license-apply' ,
            compact
            (
                'financeYear' , 'businessType' ,
                'licenceFee' ,'Additional' , 'InstituteType' ,'cityAdd' ,
                'wordAdd' ,'sectorAdd', 'bkockAdd' , 'roadAdd'
            ));
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->tradeLicenseService->newTradeLicenseApplication($request, null);
        return redirect(route('new-trade-license.index'));
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data['old_license'] = OldTradeLicenseModel::find($id);
        return view('Trade-licence.new-trade-license-show', $data);
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
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


        return view('Trade-licence.new-trade-license-edit' ,
            compact
            (
                'financeYear' , 'businessType' ,
                'licenceFee' ,'Additional' , 'InstituteType' ,'cityAdd' ,
                'wordAdd' ,'sectorAdd', 'bkockAdd' , 'roadAdd', 'oldLicense'
            ));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $this->tradeLicenseService->newTradeLicenseApplication($request, $id);
        return redirect(route('new-trade-license.index'));
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
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
}
