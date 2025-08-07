<?php

namespace Module\Account\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\AccountControl;

class AccountControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (AccountControl::count() < 1) {
            AccountControl::query()->insert($this->data());
        }
    }

    private function data(): array
    {
        return $account_controls = array(
            array('id' => '1', 'name' => 'Current Asset', 'account_group_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '2', 'name' => 'Fixed Asset', 'account_group_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '3', 'name' => 'Short Term Liabilities', 'account_group_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '4', 'name' => 'Long Term liabilities', 'account_group_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '5', 'name' => 'Capital', 'account_group_id' => '3', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '6', 'name' => 'Retained Earning', 'account_group_id' => '3', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '7', 'name' => 'Sales', 'account_group_id' => '4', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '8', 'name' => 'Adjustment Revenue', 'account_group_id' => '4', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '9', 'name' => 'Other Revenue', 'account_group_id' => '4', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '10', 'name' => 'Service Revenue', 'account_group_id' => '4', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '11', 'name' => 'Entertainment Expense', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '12', 'name' => 'Adjustment Expense', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '13', 'name' => 'Utility Expenses', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '14', 'name' => 'House Rent', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '15', 'name' => 'Conveyance Expenses', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '16', 'name' => 'Salary Expenses', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '17', 'name' => 'Remuneration', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '18', 'name' => 'Miscellaneous Expenses', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '19', 'name' => 'Interest Expenses', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '20', 'name' => 'Depreciation Expense', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '21', 'name' => 'Remuneration Expense', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '22', 'name' => 'Sales Commission', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '23', 'name' => 'Sales Adjustment', 'account_group_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '24', 'name' => 'Purchase', 'account_group_id' => '6', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:54', 'updated_at' => '2021-10-26 14:53:54'),
            array('id' => '25', 'name' => 'Sales Return', 'account_group_id' => '7', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '26', 'name' => 'Purchase Return', 'account_group_id' => '8', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '27', 'name' => 'None', 'account_group_id' => '9', 'company_id' => '1', 'status' => '1', 'is_deletable' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-11-03 10:19:55', 'updated_at' => '2021-11-03 10:19:55'),
            array('id' => '28', 'name' => 'None', 'account_group_id' => '10', 'company_id' => '1', 'status' => '1', 'is_deletable' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-11-03 10:20:18', 'updated_at' => '2021-11-03 10:20:18')
        );
    }
}   
