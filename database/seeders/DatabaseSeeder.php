<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UsageTypesSeeder;
use Database\Seeders\MonthsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // master
        $this->call(MonthsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(BusinessTypeTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SystemSettingTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CompanyDetailsTableSeeder::class);
        $this->call(CompanyBankAccountTableSeeder::class);
        $this->call(GlobalInfoTableSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(UsageTypesSeeder::class);
    }
}
