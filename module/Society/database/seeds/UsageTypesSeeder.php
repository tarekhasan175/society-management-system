<?php

 namespace Module\Society\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = Carbon::now();

        $usageTypes = [
            ['title' => 'GP Service Charge', 'typeName' => 'Residential', 'amount' => 100],
            ['title' => 'GP Service Charge', 'typeName' => 'Commercial', 'amount' => 1000],
            ['title' => 'GP Service Charge', 'typeName' => 'Garments', 'amount' => 1500],
            ['title' => 'GP Service Charge', 'typeName' => 'Factory', 'amount' => 3000],
            ['title' => 'GP Service Charge', 'typeName' => 'Main Sponsor', 'amount' => 5000],
            ['title' => 'GP Service Charge', 'typeName' => 'Mini Sponsor', 'amount' => 2500],
            ['title' => 'GP Service Charge', 'typeName' => 'Under Construction (UC)', 'amount' => 1200],
            ['title' => 'GP Service Charge', 'typeName' => 'Tin Shade', 'amount' => 800],
        ];

        // Prepare the data for batch insert
        foreach ($usageTypes as &$type) {
            $type['created_at'] = $currentTimestamp;
            $type['updated_at'] = $currentTimestamp;
        }

        // Batch insert
        DB::table('usage_types')->insert($usageTypes);
    }
}
