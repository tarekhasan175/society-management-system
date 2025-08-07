<?php

namespace Module\Account\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Traits\CheckPermission;
use Module\Account\Models\RfqCustomer;
use Module\Account\Models\Unit;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\Product;
use Module\Account\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AjaxController extends Controller
{
    use CheckPermission;


    public $stockService;


    public  function companyToCustomer(Request $request)
    {

        $company = $request->input('Company');

        $customers = RfqCustomer::where('client_company_id', $company)->with('customer')->get();
        return response()->json($customers);
    }


    public function getCompanyProduct(Request $request)
    {
        try {
            return Product::where('company_id', $request->company_id)->where('name', '!=', null)->accountProduct()->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }




}
