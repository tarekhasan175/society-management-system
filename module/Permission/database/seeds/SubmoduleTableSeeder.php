<?php

namespace Module\Permission\database\seeds;

use Illuminate\Database\Seeder;
use Module\Permission\Models\Submodule;

class SubmoduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getSubmodules() ?? [] as $submodule)
        {
            Submodule::firstOrCreate([
                'name'      => $submodule['name']
            ], [
                'id'        => $submodule['id'],
                'module_id' => $submodule['module_id'],
            ]);
        }
    }

    private function getSubmodules()
    {
        return $submodules = [
            ['id' => '1','name' => 'Group Info','module_id' => '1','created_at' => '2019-12-25 20:45:50','updated_at' => '2019-12-25 23:03:11'],
            ['id' => '2','name' => 'Merchandising Setup','module_id' => '5','created_at' => '2019-12-25 20:46:45','updated_at' => '2020-02-12 06:00:57'],
            ['id' => '3','name' => 'Employee Info','module_id' => '3','created_at' => '2019-12-25 20:47:14','updated_at' => '2019-12-25 20:47:14'],
            ['id' => '4','name' => 'HR Setup','module_id' => '3','created_at' => '2019-12-25 20:47:50','updated_at' => '2019-12-25 20:47:50'],
            ['id' => '5','name' => 'Bonus','module_id' => '3','created_at' => '2019-12-25 20:48:33','updated_at' => '2019-12-25 20:48:33'],
            ['id' => '6','name' => 'Leave','module_id' => '3','created_at' => '2019-12-25 20:48:52','updated_at' => '2019-12-25 20:48:52'],
            ['id' => '7','name' => 'Short Leave','module_id' => '3','created_at' => '2019-12-25 20:49:22','updated_at' => '2019-12-25 20:49:22'],
            ['id' => '8','name' => 'Attendance','module_id' => '3','created_at' => '2019-12-25 20:49:43','updated_at' => '2019-12-25 20:49:43'],
            ['id' => '9','name' => 'Disbursement','module_id' => '3','created_at' => '2019-12-25 20:50:30','updated_at' => '2019-12-25 20:50:30'],
            ['id' => '10','name' => 'HR Loan','module_id' => '3','created_at' => '2019-12-25 20:51:36','updated_at' => '2019-12-25 20:51:36'],
            ['id' => '11','name' => 'Payroll','module_id' => '3','created_at' => '2019-12-25 20:52:06','updated_at' => '2019-12-25 20:52:06'],
            ['id' => '12','name' => 'Increment','module_id' => '3','created_at' => '2019-12-25 20:52:33','updated_at' => '2019-12-25 20:52:33'],
            ['id' => '13','name' => 'Late Management','module_id' => '3','created_at' => '2019-12-25 20:53:07','updated_at' => '2019-12-25 22:49:37'],
            ['id' => '14','name' => 'Item','module_id' => '4','created_at' => '2019-12-25 20:53:52','updated_at' => '2019-12-25 20:53:52'],
            ['id' => '15','name' => 'Purchase','module_id' => '4','created_at' => '2019-12-25 20:54:14','updated_at' => '2019-12-25 20:54:14'],
            ['id' => '16','name' => 'Requisition','module_id' => '4','created_at' => '2019-12-25 20:54:54','updated_at' => '2019-12-25 20:54:54'],
            ['id' => '17','name' => 'GS Report','module_id' => '4','created_at' => '2019-12-25 20:55:17','updated_at' => '2019-12-25 20:55:17'],
            ['id' => '18','name' => 'Access Panel','module_id' => '2','created_at' => '2020-01-02 04:22:07','updated_at' => '2020-01-02 04:22:07'],
            ['id' => '19','name' => 'Application','module_id' => '3','created_at' => '2020-01-22 02:23:02','updated_at' => '2020-01-22 02:23:02'],
            ['id' => '20','name' => 'Order','module_id' => '5','created_at' => '2020-02-07 05:09:17','updated_at' => '2020-02-07 05:09:17'],
            ['id' => '21','name' => 'Sample Dispatch','module_id' => '5','created_at' => '2020-03-07 22:36:24','updated_at' => '2020-03-07 22:36:24'],
            ['id' => '22','name' => 'Production Salary','module_id' => '3','created_at' => '2020-03-09 01:23:38','updated_at' => '2020-03-09 01:23:38'],
            ['id' => '23','name' => 'Daily Work Report','module_id' => '3','created_at' => '2020-04-13 06:42:20','updated_at' => '2020-04-13 06:42:20'],
            ['id' => '24','name' => 'Work Order','module_id' => '6','created_at' => '2020-05-13 21:16:55','updated_at' => '2020-05-13 21:16:55'],
            ['id' => '25','name' => 'Supplier PI','module_id' => '6','created_at' => '2020-05-13 21:19:14','updated_at' => '2020-05-13 21:19:14'],
            ['id' => '26','name' => 'Commercial Setup','module_id' => '7','created_at' => '2020-06-09 00:48:51','updated_at' => '2020-06-09 00:48:51'],
            ['id' => '27','name' => 'Export P.I','module_id' => '5','created_at' => '2020-06-09 00:50:43','updated_at' => '2020-11-12 03:02:06'],
            ['id' => '28','name' => 'SMS API','module_id' => '8','created_at' => '2020-07-06 22:04:36','updated_at' => '2020-07-06 22:04:36'],
            ['id' => '29','name' => 'Notice','module_id' => '8','created_at' => '2020-07-06 22:04:58','updated_at' => '2020-07-06 22:04:58'],
            ['id' => '30','name' => 'GRN','module_id' => '6','created_at' => '2020-10-07 00:30:12','updated_at' => '2020-10-07 00:30:12'],
            ['id' => '31','name' => 'PF','module_id' => '3','created_at' => '2020-10-20 03:44:28','updated_at' => '2020-10-20 03:44:28'],
            ['id' => '32','name' => 'Sales Id','module_id' => '5','created_at' => '2020-10-20 04:24:24','updated_at' => '2020-10-20 04:24:24'],
            ['id' => '33','name' => 'M Report','module_id' => '5','created_at' => '2020-10-20 04:24:35','updated_at' => '2020-10-20 04:24:35'],
            ['id' => '34','name' => 'MID','module_id' => '7','created_at' => '2020-10-20 04:24:46','updated_at' => '2020-10-20 04:24:46'],
            ['id' => '35','name' => 'Schedule','module_id' => '3','created_at' => '2020-11-12 23:34:33','updated_at' => '2020-11-12 23:34:33'],
            ['id' => '36','name' => 'BB LC','module_id' => '7','created_at' => '2020-12-07 01:27:11','updated_at' => '2020-12-07 01:27:11'],
            ['id' => '37','name' => 'MID Transfer','module_id' => '7','created_at' => '2021-01-03 22:12:09','updated_at' => '2021-01-03 22:12:09'],
            ['id' => '38','name' => 'Invoice','module_id' => '7','created_at' => '2021-01-10 01:38:12','updated_at' => '2021-01-10 01:38:12'],
            ['id' => '39','name' => 'Cash','module_id' => '9','created_at' => '2021-01-25 22:49:32','updated_at' => '2021-01-25 22:49:32'],
            ['id' => '40','name' => 'Overtime & Holiday Allowance','module_id' => '3','created_at' => '2021-02-02 00:13:04','updated_at' => '2021-02-02 00:13:04'],



            // employee permission
            ['id' => '45','name' => 'E. Profile','module_id' => '11','created_at' => '2021-02-13 16:18:01','updated_at' => '2021-02-13 16:18:01'],
            ['id' => '46','name' => 'E. Leave','module_id' => '11','created_at' => '2021-02-13 16:18:20','updated_at' => '2021-02-13 16:18:20'],
            ['id' => '47','name' => 'E. Hr Loan','module_id' => '11','created_at' => '2021-02-13 16:18:32','updated_at' => '2021-02-13 16:18:32'],
            ['id' => '48','name' => 'E. Out Work','module_id' => '11','created_at' => '2021-02-13 16:18:50','updated_at' => '2021-02-13 16:18:50'],
            ['id' => '49','name' => 'E. Payslip','module_id' => '11','created_at' => '2021-02-13 16:19:08','updated_at' => '2021-02-13 16:19:08'],
            ['id' => '50','name' => 'E. Notice','module_id' => '11','created_at' => '2021-02-13 16:19:21','updated_at' => '2021-02-13 16:19:21'],
        


            ['id' => '51','name' => 'Expense','module_id' => '3','created_at' => '2021-02-16 11:43:25','updated_at' => '2021-02-16 11:43:25'],
            ['id' => '52','name' => 'Program','module_id' => '12','created_at' => '2021-03-01 14:27:55','updated_at' => '2021-08-12 16:32:31'],
            ['id' => '53','name' => 'Knitting','module_id' => '12','created_at' => '2021-03-01 14:27:55','updated_at' => '2021-08-12 16:33:53'],
            ['id' => '54','name' => 'Dyeing','module_id' => '12','created_at' => '2021-03-01 14:27:55','updated_at' => '2021-08-12 16:28:44'],
            ['id' => '55','name' => 'Stocklot','module_id' => '12','created_at' => '2021-03-23 13:04:05','updated_at' => '2021-08-12 16:33:39'],
            ['id' => '56','name' => 'E. Other Expense','module_id' => '11','created_at' => '2021-03-27 17:53:37','updated_at' => '2021-03-27 17:53:37'],
            ['id' => '57','name' => 'E. Daily Work','module_id' => '11','created_at' => '2021-03-27 18:19:57','updated_at' => '2021-03-27 18:19:57'],
            ['id' => '58','name' => 'K & D Report','module_id' => '12','created_at' => '2021-03-31 19:14:11','updated_at' => '2021-08-12 16:32:51'],
            ['id' => '59','name' => 'Reports','module_id' => '7','created_at' => '2021-06-16 10:03:48','updated_at' => '2021-06-16 10:03:48'],
            ['id' => '60','name' => 'Compliance','module_id' => '3','created_at' => '2021-06-17 10:24:29','updated_at' => '2021-06-17 10:24:29'],
            ['id' => '61','name' => 'E. Attendance','module_id' => '11','created_at' => '2021-06-22 12:15:08','updated_at' => '2021-06-22 12:15:08']
        ];
    }
}
