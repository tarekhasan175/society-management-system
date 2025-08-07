<?php

namespace Module\Nagarik\database\seeds;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Module\Account\Models\Account;


class NagariksebaAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        $account = Account::create([
            'name'	                => 'Nagarisheba License',
            'account_group_id'      => 1,
            'account_control_id'    => 1,
            'account_subsidiary_id' => 8,
            'company_id'	        => 1,
            'balance_type'	        => 'Credit',
            'opening_balance'	    => 0,
            'status'	            => 1,
            'is_deletable'	        => 0,
            'created_by'            => 1,
        ]);
        $account = Account::create([
            'name'	                => 'Nagarisheba Holding',
            'account_group_id'      => 1,
            'account_control_id'    => 1,
            'account_subsidiary_id' => 8,
            'company_id'	        => 1,
            'balance_type'	        => 'Credit',
            'opening_balance'	    => 0,
            'status'	            => 1,
            'is_deletable'	        => 0,
            'created_by'            => 1,
        ]);
    }
}
