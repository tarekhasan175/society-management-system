<?php

namespace Module\Account\database\seeds;

use Illuminate\Database\Seeder;
use Module\Account\Models\AccountSubsidiary;

class AccountSubsidiaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (AccountSubsidiary::count() < 1) {
            AccountSubsidiary::query()->insert($this->data());
        }
    }

    private function data(): array
    {
        return $account_subsidiaries = array(
            array('id' => '1', 'name' => 'Electricity Bill', 'account_group_id' => '5', 'account_control_id' => '13', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '2', 'name' => 'Telephone Bill', 'account_group_id' => '5', 'account_control_id' => '13', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '3', 'name' => 'Other Loans', 'account_group_id' => '1', 'account_control_id' => '3', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '4', 'name' => 'Trading Acc Payable', 'account_group_id' => '1', 'account_control_id' => '3', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '5', 'name' => 'Computer', 'account_group_id' => '1', 'account_control_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '6', 'name' => 'Decoration', 'account_group_id' => '1', 'account_control_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '7', 'name' => 'Furniture and Fixture', 'account_group_id' => '1', 'account_control_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '8', 'name' => 'Trading Acc Receivables', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '9', 'name' => 'Stock', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '10', 'name' => 'Cash in Bank', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '11', 'name' => 'Cash In Hand', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '12', 'name' => 'SOFTWARE', 'account_group_id' => '1', 'account_control_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '13', 'name' => 'None', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '14', 'name' => 'None', 'account_group_id' => '1', 'account_control_id' => '2', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '15', 'name' => 'None', 'account_group_id' => '2', 'account_control_id' => '4', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '16', 'name' => 'None', 'account_group_id' => '2', 'account_control_id' => '3', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '17', 'name' => 'None', 'account_group_id' => '3', 'account_control_id' => '5', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '18', 'name' => 'None', 'account_group_id' => '3', 'account_control_id' => '6', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '19', 'name' => 'None', 'account_group_id' => '4', 'account_control_id' => '7', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '20', 'name' => 'None', 'account_group_id' => '4', 'account_control_id' => '8', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:55', 'updated_at' => '2021-10-26 14:53:55'),
            array('id' => '21', 'name' => 'None', 'account_group_id' => '4', 'account_control_id' => '9', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '22', 'name' => 'None', 'account_group_id' => '4', 'account_control_id' => '10', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '23', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '11', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '24', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '12', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '25', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '13', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '26', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '14', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '27', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '15', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '28', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '16', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '29', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '17', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '30', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '18', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '31', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '19', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '32', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '20', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '33', 'name' => 'None', 'account_group_id' => '5', 'account_control_id' => '25', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '34', 'name' => 'None', 'account_group_id' => '6', 'account_control_id' => '22', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '35', 'name' => 'None', 'account_group_id' => '7', 'account_control_id' => '23', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '36', 'name' => 'None', 'account_group_id' => '8', 'account_control_id' => '24', 'company_id' => '1', 'status' => '1', 'is_deletable' => '0', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-10-26 14:53:56', 'updated_at' => '2021-10-26 14:53:56'),
            array('id' => '37', 'name' => 'None', 'account_group_id' => '9', 'account_control_id' => '27', 'company_id' => '1', 'status' => '1', 'is_deletable' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-11-03 10:20:57', 'updated_at' => '2021-11-03 10:20:57'),
            array('id' => '38', 'name' => 'None', 'account_group_id' => '10', 'account_control_id' => '28', 'company_id' => '1', 'status' => '1', 'is_deletable' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-11-03 10:21:10', 'updated_at' => '2021-11-03 10:21:10'),
            array('id' => '39', 'name' => 'Cheque In Bank', 'account_group_id' => '1', 'account_control_id' => '1', 'company_id' => '1', 'status' => '1', 'is_deletable' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2021-11-04 17:02:23', 'updated_at' => '2021-11-04 17:02:23')
        );
    }
}
