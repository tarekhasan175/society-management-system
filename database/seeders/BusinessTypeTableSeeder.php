<?php

use App\Models\BusinessType;
use Illuminate\Database\Seeder;

class BusinessTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeNames = ['Knit', 'Sweater', 'Woven', 'Buying', 'Printing & Embroidery'];

        foreach ($typeNames as $name) {
            BusinessType::firstOrCreate(['name' => $name]);
        }
    }
}
