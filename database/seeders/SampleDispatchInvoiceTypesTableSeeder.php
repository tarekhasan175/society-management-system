<?php

use Illuminate\Database\Seeder;
use Module\Garments\Models\Merchandising\SampleDispatch\SampleDispatchInvoiceType;

class SampleDispatchInvoiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampleDispatchInvoiceType::firstOrCreate(['name' => 'SMS']);
        SampleDispatchInvoiceType::firstOrCreate(['name' => 'Regular']);
    }
}
