<?php


namespace Module\Account\Controllers;

use App\Traits\CheckPermission;
use Illuminate\Http\Request;
use Module\Account\Models\Account;
use Module\Account\Models\Transaction;
use Module\Account\Services\DataService;
use Module\Account\Services\IndexDataService;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\AccountGroup;
use Module\Account\Services\AccountTransactionService;

class AccountSystemSettingsController extends Controller
{

    public function __construct()
    {
        //
    }

    public function edit($id)
    {
        try {
            $data['accountSystemSettings'] = DB::table('acc_system_settings')->find(1);
            return view('setup.account-system-settings.edit', $data);

        } catch (\Illuminate\Database\QueryException $e) {
            $data['accountSystemSettings'] = null;
            return view('setup.account-system-settings.edit', $data);
        }

    }

    public function update(Request $request, $id)
    {
        if (!DB::table('acc_system_settings')->find(1)) {
            $accountSystemSettings = DB::table('acc_system_settings')
                ->insert(
                    [
                        'id' => 1,
                        'income_statement_sales1' => $request->income_statement_sales1,
                        'income_statement_sales2' => $request->income_statement_sales2,
                        'income_statement_cost_of_goods_sold' => $request->income_statement_cost_of_goods_sold,
                        'income_statement_financial_expenses' => $request->income_statement_financial_expenses,
                    ]
                );
        } else {
            $accountSystemSettings = DB::table('acc_system_settings')
                ->where('id', 1)
                ->update(
                    [
                        'income_statement_sales1' => $request->income_statement_sales1,
                        'income_statement_sales2' => $request->income_statement_sales2,
                        'income_statement_cost_of_goods_sold' => $request->income_statement_cost_of_goods_sold,
                        'income_statement_financial_expenses' => $request->income_statement_financial_expenses,
                    ]
                );
        }

        return back();
    }
}
