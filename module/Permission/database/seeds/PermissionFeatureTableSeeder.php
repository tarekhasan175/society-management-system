<?php

namespace Module\Permission\database\seeds;


use Illuminate\Database\Seeder;
use Module\Permission\Models\PermissionFeature;

class PermissionFeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = ['Order Type', 'Company', 'Department', 'Designation', 'Buyer'];

        foreach ($features as $key => $feature) {

            PermissionFeature::firstOrCreate([
                'name' => $feature,
            ], [
                'status' => 0,
            ]);
        }
        PermissionFeature::where('name', 'Company')->update(['status' => 1]);
    }
}
