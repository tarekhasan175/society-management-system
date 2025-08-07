<?php

namespace Module\Account\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Module\Account\Models\AccountGroup;

class AccountGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (AccountGroup::count() < 1) {
            AccountGroup::query()->insert($this->data());
        }
    }

    private function data(): array
    {
        return $account_groups = array(
            array('id' => '1', 'name' => 'Asset', 'balance_type' => 'Debit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '2', 'name' => 'Liabilities', 'balance_type' => 'Credit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '3', 'name' => 'Owners Equity', 'balance_type' => 'Credit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '4', 'name' => 'Revenue', 'balance_type' => 'Credit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '5', 'name' => 'Expenses', 'balance_type' => 'Debit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '6', 'name' => 'Purchase', 'balance_type' => 'Debit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '7', 'name' => 'Sales Return', 'balance_type' => 'Debit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '8', 'name' => 'Purchase Return', 'balance_type' => 'Credit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '9', 'name' => 'Depreciation', 'balance_type' => 'Debit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53'),
            array('id' => '10', 'name' => 'Accumulated Depreciation', 'balance_type' => 'Credit', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_at' => '2021-10-26 14:53:53', 'updated_at' => '2021-10-26 14:53:53')
        );
    }
}
