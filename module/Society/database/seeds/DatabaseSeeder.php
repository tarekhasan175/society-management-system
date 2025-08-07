<?php

namespace Module\Society\database\seeds;


use Illuminate\Database\Seeder;
use Module\Society\database\seeds\UsageTypesSeeder;
use Module\Dokani\database\seeds\PackageTypeSeeder;
use Module\Dokani\database\seeds\ShopTypeTableSeeder;
use Module\Dokani\database\seeds\CashCustomerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsageTypesSeeder::class,
        ]);
    }
}
