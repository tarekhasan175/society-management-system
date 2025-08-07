<?php

namespace Module\Nagarik\Controllers;

use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Nagarik\Models\CityAreaAdd;
use Module\Nagarik\Models\HoldingTexApply;
use Module\Nagarik\Models\NagorikBlock;
use Module\Nagarik\Models\NagorikLandType;
use Module\Nagarik\Models\NagorikRoadAdd;
use Module\Nagarik\Models\NagorikSector;
use Module\Nagarik\Models\NagorikWordAdd;
use Module\Nagarik\Services\HoldingTexService;

class HoldingTexApplyController extends Controller
{
    private $service;
    protected  $holdingTaxService;

    use FileSaver;

//holding-taxApply
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(HoldingTexService $holdingTaxService)
    {
        $this->holdingTaxService = $holdingTaxService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {

       $holdingTex = HoldingTexApply::where('user_id', auth()->user()->id)
                                      ->orderBy('created_at', 'desc')
                                      ->get();
       return view('Holding-Tex.side-section.newApply.newApplyManage' , compact('holdingTex'  ));
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
//        return $request->all();
       $this->holdingTaxService->HoldingTexInfo($request , null);

       return redirect()->route('holding-taxApply.index')->with('message' , ' নতুন হোল্ডিং আবেদন সফল হয়েছে ');
    }














    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $HoldingData = HoldingTexApply::with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad','landType')->find($id);

        return view('Holding-Tex.side-section.newApply.show' , compact('HoldingData'));
    }



//cityarea   wordareya  nagoriksector  nagorikbloc  nagorikroad landType









    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $cityAdd          = CityAreaAdd::all();
        $wordAdd          = NagorikWordAdd::all();
        $sectorAdd        = NagorikSector::all();
        $bkockAdd         = NagorikBlock::all();
        $roadAdd          = NagorikRoadAdd::all();
        $NagorikLandType  = NagorikLandType::all();
        $HoldingData = HoldingTexApply::with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad','landType')->find($id);
     return view('Holding-Tex.side-section.newApply.edit' , compact('HoldingData' , 'cityAdd',
         'wordAdd' , 'sectorAdd', 'bkockAdd' ,'roadAdd' ,'NagorikLandType'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        $this->holdingTaxService->HoldingTexInfo($request, $id);
        return redirect()->route('holding-taxApply.index')->with('message' , ' নতুন হোল্ডিং আবেদন সফল হয়েছে ');
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $deleteHolding = HoldingTexApply::find($id);

        if (file_exists($deleteHolding->h_checkbox1_upload))
        {
            unlink($deleteHolding->h_checkbox1_upload);
        }

        if (file_exists($deleteHolding->h_checkbox2_upload))
        {
            unlink($deleteHolding->h_checkbox2_upload);
        }

        if (file_exists($deleteHolding->h_checkbox3_upload))
        {
            unlink($deleteHolding->h_checkbox3_upload);
        }

        if (file_exists($deleteHolding->h_checkbox4_upload))
        {
            unlink($deleteHolding->h_checkbox4_upload);
        }

        if (file_exists($deleteHolding->h_checkbox5_upload))
        {
            unlink($deleteHolding->h_checkbox5_upload);
        }
        $deleteHolding->delete();
        return redirect()->route('holding-taxApply.index')->with('message' , '  হোল্ডিং ডিলিট  সফল হয়েছে ');


    }
}
