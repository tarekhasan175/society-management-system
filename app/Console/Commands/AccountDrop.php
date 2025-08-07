<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AccountDrop extends Command
{
    protected $signature = 'acc:drop';

    protected $description = 'Drops Accounting Related Tables';

    public function handle()
    {
        $tables = [
            'acc_payments',
            'acc_collections',
            'acc_purchase_details',
            'acc_purchases',
            'acc_sale_details',
            'acc_sales',
            'acc_suppliers',
            'acc_customers',
            'acc_categories',
            'units',
            'fund_transfers',
            'banks',
            'daily_ledgers',
            'voucher_details',
            'vouchers',
            'accounts',
            'account_subsidiaries',
            'account_controls',
            'account_setups',
            'account_groups',
            'invoice_nos',
            'acc_stocks',
            'acc_stock_summaries',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
            DB::table('migrations')->where('migration', 'like', '%_create_'.$table.'_table')->delete();
        }

        DB::table('migrations')->where('migration', '2020_12_27_225250_create_transactions_table')->delete();
        DB::table('migrations')->where('migration', '2021_02_24_225307_create_products_table')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->info('Account tables dropped successfully!');
    }
}
