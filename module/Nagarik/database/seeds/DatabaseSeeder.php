<?php

namespace Module\Nagarik\database\seeds;

use Illuminate\Database\Seeder;
use Module\Dokani\database\seeds\CountrySeeder;
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
            NagariksebaAccountSeeder::class,
        ]);
    }
}
