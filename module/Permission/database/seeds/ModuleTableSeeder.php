<?php

namespace Module\Permission\database\seeds;

use Module\Permission\Models\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getModules() ?? [] as $module)
        {
            Module::updateOrCreate([
                'id'        => $module['id'],

            ], [
                
                'name'      => $module['name'],
                'status'    => $module['status'],
            ]);
        }
    }

    private function getModules()
    {
        return [
            ['id' => '1',       'status' => '1', 'name' => 'Global Setting'],
            ['id' => '2',       'status' => '1', 'name' => 'User Access'],
            ['id' => '3',       'status' => '0', 'name' => 'HRM'],
            ['id' => '4',       'status' => '0', 'name' => 'General Store'],
            ['id' => '5',       'status' => '0', 'name' => 'Merchandising'],
            ['id' => '6',       'status' => '0', 'name' => 'Inventory'],
            ['id' => '7',       'status' => '0', 'name' => 'Commercial'],
            ['id' => '8',       'status' => '0', 'name' => 'News & Events'],
            ['id' => '9',       'status' => '0', 'name' => 'Payment'],
            ['id' => '11',      'status' => '0', 'name' => 'Employee Permission'],
            ['id' => '12',      'status' => '0', 'name' => 'Knitting & Dyeing'],
            ['id' => '150000',  'status' => '1', 'name' => 'Account & Finance'],
            ['id' => '150001',  'status' => '1', 'name' => 'Nagarik'],
            ['id' => '160001',  'status' => '1', 'name' => 'Chamber'],
            ['id' => '170001',  'status' => '1', 'name' => 'Society'],
        ];
    }
}
