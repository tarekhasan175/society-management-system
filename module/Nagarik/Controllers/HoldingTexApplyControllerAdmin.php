<?php

namespace Module\Nagarik\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Account\Models\Account;
use Module\Nagarik\Models\HoldingTexApply;
use Module\Nagarik\Services\PaymentService;

class HoldingTexApplyControllerAdmin extends Controller
{
    private $service;
    protected $paymentService;
//admin-receive-holding-tex-apply
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        $holdingTex = HoldingTexApply::where('h_apply_status', 0 )
            ->orderBy('created_at', 'desc')
            ->get();
        return view('Admin.Holding-Tex.Holding-Apply.New-Holding-Apply.index' , compact('holdingTex'));
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        $holdingTex = HoldingTexApply::where('h_apply_status', 1 )
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.Holding-Tex.Holding-Apply.New-Holding-Apply.approve' , compact('holdingTex' ));
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
        $HoldingData = HoldingTexApply::with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad','landType')->find($id);

        return view('Admin.Holding-Tex.Holding-Apply.New-Holding-Apply.requestShow' , compact('HoldingData'));
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $HoldingData = HoldingTexApply::with('cityarea','wordareya','nagoriksector','nagorikbloc','nagorikroad')->find($id);

        return view('Admin.Holding-Tex.Holding-Apply.New-Holding-Apply.HoldingTexprintView' , compact('HoldingData'));
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {


        $ApproveHolidng = HoldingTexApply::find($id);
        $ApproveHolidng->update([
            'h_apply_status'=> 1 ,
        ]);

        $this->paymentService->ApproveHoldingMakeDuePaymen($ApproveHolidng, HoldingTexApply::class);
        return redirect(route('admin-receive-holding-tex-apply.index'));

    }

    public  function adminReceiveHoldingTexApprove($id)
    {
//        right now no use

        HoldingTexApply::where('id', $id)->update(['h_apply_status'=>1]);
        return redirect(route('admin-receive-holding-tex-apply.index'));
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
       dd('ok');
    }
}
