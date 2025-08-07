<?php

namespace Module\Permission\database\seeds;

use Illuminate\Database\Seeder;
use Module\Permission\Models\ParentPermission;

class ParentPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDatas() ?? [] as $parent_permission)
        {
            try {
                ParentPermission::firstOrCreate([
                    'name'          => $parent_permission['name']
                ], [
                    'id'            => $parent_permission['id'],
                    'submodule_id'  => $parent_permission['submodule_id']
                ]);
                
            } catch (\Exception $th) {
                //throw $th;
            }
        }
    }

    private function getDatas()
    {
        return $parent_permissions = [
            ['id' => '1','name' => 'Employee','submodule_id' => '3','created_at' => '2019-12-25 20:56:14','updated_at' => '2019-12-25 20:56:14'],
            ['id' => '2','name' => 'Salary Setup','submodule_id' => '3','created_at' => '2019-12-25 21:05:01','updated_at' => '2019-12-25 21:05:01'],
            ['id' => '3','name' => 'Holiday Calendar','submodule_id' => '4','created_at' => '2019-12-25 21:08:56','updated_at' => '2019-12-25 21:08:56'],
            ['id' => '4','name' => 'Provision Period','submodule_id' => '4','created_at' => '2019-12-25 21:10:44','updated_at' => '2019-12-25 21:10:44'],
            ['id' => '5','name' => 'Department','submodule_id' => '4','created_at' => '2019-12-25 21:11:30','updated_at' => '2019-12-25 21:11:30'],
            ['id' => '6','name' => 'Designation','submodule_id' => '4','created_at' => '2019-12-25 21:12:44','updated_at' => '2019-12-25 21:12:44'],
            ['id' => '7','name' => 'Grade','submodule_id' => '4','created_at' => '2019-12-25 21:24:04','updated_at' => '2019-12-25 21:24:04'],
            ['id' => '8','name' => 'Gazette Cal','submodule_id' => '4','created_at' => '2019-12-25 21:25:29','updated_at' => '2019-12-25 21:25:29'],
            ['id' => '9','name' => 'Shift','submodule_id' => '4','created_at' => '2019-12-25 21:26:22','updated_at' => '2019-12-25 21:26:22'],
            ['id' => '10','name' => 'Bonus Type','submodule_id' => '4','created_at' => '2019-12-25 21:27:11','updated_at' => '2019-12-25 21:27:11'],
            ['id' => '11','name' => 'Attendance Bonus Setting','submodule_id' => '5','created_at' => '2019-12-25 21:31:24','updated_at' => '2019-12-25 21:31:24'],
            ['id' => '12','name' => 'Attendance Bonus Entry','submodule_id' => '5','created_at' => '2019-12-25 21:32:35','updated_at' => '2019-12-25 21:32:35'],
            ['id' => '13','name' => 'F B Eligible Period','submodule_id' => '5','created_at' => '2019-12-25 21:36:13','updated_at' => '2019-12-25 21:36:13'],
            ['id' => '14','name' => 'F Bonus','submodule_id' => '5','created_at' => '2019-12-25 21:38:41','updated_at' => '2019-12-25 21:38:41'],
            ['id' => '15','name' => 'Leave Type','submodule_id' => '6','created_at' => '2019-12-25 21:40:02','updated_at' => '2019-12-25 21:40:02'],
            ['id' => '16','name' => 'L Approval Setting','submodule_id' => '6','created_at' => '2019-12-25 21:41:12','updated_at' => '2019-12-25 21:41:12'],
            ['id' => '17','name' => 'L Application','submodule_id' => '6','created_at' => '2019-12-25 21:42:26','updated_at' => '2019-12-25 21:42:26'],
            ['id' => '18','name' => 'L Yearly Report','submodule_id' => '6','created_at' => '2019-12-25 21:54:11','updated_at' => '2019-12-25 21:54:11'],
            ['id' => '19','name' => 'Short Leave Setup','submodule_id' => '7','created_at' => '2019-12-25 21:57:16','updated_at' => '2019-12-25 21:57:16'],
            ['id' => '20','name' => 'Short Leave Application','submodule_id' => '7','created_at' => '2019-12-25 22:02:49','updated_at' => '2019-12-25 22:02:49'],
            ['id' => '21','name' => 'Manual Entry','submodule_id' => '8','created_at' => '2019-12-25 22:07:28','updated_at' => '2019-12-25 22:16:34'],
            ['id' => '22','name' => 'Out Work','submodule_id' => '8','created_at' => '2019-12-25 22:23:20','updated_at' => '2019-12-25 22:23:20'],
            ['id' => '23','name' => 'Attendance Report','submodule_id' => '8','created_at' => '2019-12-25 22:24:31','updated_at' => '2019-12-25 22:24:31'],
            ['id' => '24','name' => 'Disbursement','submodule_id' => '9','created_at' => '2019-12-25 22:31:06','updated_at' => '2019-12-25 22:31:06'],
            ['id' => '25','name' => 'HR Loan','submodule_id' => '10','created_at' => '2019-12-25 22:33:41','updated_at' => '2019-12-25 22:33:41'],
            ['id' => '26','name' => 'Generate Salary','submodule_id' => '11','created_at' => '2019-12-25 22:35:19','updated_at' => '2019-12-25 22:35:19'],
            ['id' => '27','name' => 'Increment Eligible Period','submodule_id' => '12','created_at' => '2019-12-25 22:38:53','updated_at' => '2019-12-25 22:38:53'],
            ['id' => '28','name' => 'Salary Increment','submodule_id' => '12','created_at' => '2019-12-25 22:40:40','updated_at' => '2019-12-25 22:40:40'],
            ['id' => '29','name' => 'Late Config','submodule_id' => '13','created_at' => '2019-12-25 22:50:00','updated_at' => '2019-12-25 22:50:00'],
            ['id' => '30','name' => 'Late Deduction','submodule_id' => '13','created_at' => '2019-12-25 22:51:18','updated_at' => '2019-12-25 22:51:18'],
            ['id' => '31','name' => 'Item','submodule_id' => '14','created_at' => '2019-12-25 22:54:06','updated_at' => '2019-12-25 22:54:06'],
            ['id' => '32','name' => 'Purchase','submodule_id' => '15','created_at' => '2019-12-25 22:55:36','updated_at' => '2019-12-25 22:55:36'],
            ['id' => '33','name' => 'Create Requisition','submodule_id' => '16','created_at' => '2019-12-25 22:58:20','updated_at' => '2019-12-25 22:58:20'],
            ['id' => '34','name' => 'GS Report','submodule_id' => '17','created_at' => '2019-12-25 23:00:44','updated_at' => '2019-12-25 23:00:44'],
            ['id' => '35','name' => 'Group','submodule_id' => '1','created_at' => '2019-12-25 23:03:54','updated_at' => '2019-12-25 23:03:54'],
            ['id' => '36','name' => 'Company Info','submodule_id' => '1','created_at' => '2019-12-25 23:05:00','updated_at' => '2019-12-25 23:05:00'],
            ['id' => '37','name' => 'Buyer','submodule_id' => '2','created_at' => '2019-12-25 23:06:01','updated_at' => '2019-12-25 23:06:01'],
            ['id' => '38','name' => 'Supplier','submodule_id' => '1','created_at' => '2019-12-25 23:06:43','updated_at' => '2020-12-14 23:10:15'],
            ['id' => '39','name' => 'Item Unit','submodule_id' => '2','created_at' => '2019-12-25 23:07:14','updated_at' => '2019-12-25 23:07:14'],
            ['id' => '40','name' => 'Yarn','submodule_id' => '2','created_at' => '2019-12-25 23:08:03','updated_at' => '2019-12-25 23:08:03'],
            ['id' => '41','name' => 'Size','submodule_id' => '2','created_at' => '2019-12-25 23:08:32','updated_at' => '2019-12-25 23:08:32'],
            ['id' => '42','name' => 'Purchase Receive','submodule_id' => '15','created_at' => '2019-12-29 00:06:49','updated_at' => '2019-12-29 00:06:49'],
            ['id' => '43','name' => 'Permission Access','submodule_id' => '18','created_at' => '2020-01-02 04:23:06','updated_at' => '2020-01-02 04:23:06'],
            ['id' => '44','name' => 'Cancel List','submodule_id' => '6','created_at' => '2020-01-05 22:59:27','updated_at' => '2020-01-05 22:59:27'],
            ['id' => '45','name' => 'Short Leave Authority','submodule_id' => '7','created_at' => '2020-01-05 23:06:54','updated_at' => '2020-01-05 23:06:54'],
            ['id' => '46','name' => 'Off Day','submodule_id' => '4','created_at' => '2020-01-16 23:22:04','updated_at' => '2020-01-16 23:22:04'],
            ['id' => '47','name' => 'Promotion Letter','submodule_id' => '19','created_at' => '2020-01-22 02:23:27','updated_at' => '2020-01-22 02:23:27'],
            ['id' => '48','name' => 'Appointment Letter','submodule_id' => '19','created_at' => '2020-01-22 02:23:36','updated_at' => '2020-01-22 02:23:36'],
            ['id' => '49','name' => 'Termination Letter','submodule_id' => '19','created_at' => '2020-01-22 02:23:44','updated_at' => '2020-01-22 02:23:44'],
            ['id' => '50','name' => 'GG','submodule_id' => '2','created_at' => '2020-02-05 05:50:14','updated_at' => '2020-02-05 05:50:14'],
            ['id' => '51','name' => 'GSM','submodule_id' => '2','created_at' => '2020-02-05 05:50:24','updated_at' => '2020-02-05 05:50:24'],
            ['id' => '52','name' => 'Fabric Composition','submodule_id' => '2','created_at' => '2020-02-05 05:50:42','updated_at' => '2020-02-05 05:50:42'],
            ['id' => '53','name' => 'Fabric Construction','submodule_id' => '2','created_at' => '2020-02-05 05:50:52','updated_at' => '2020-02-05 05:50:52'],
            ['id' => '54','name' => 'Document Type','submodule_id' => '2','created_at' => '2020-02-05 05:51:14','updated_at' => '2020-02-05 05:51:14'],
            ['id' => '55','name' => 'Sample Type','submodule_id' => '2','created_at' => '2020-02-05 05:51:25','updated_at' => '2020-02-05 05:51:25'],
            ['id' => '56','name' => 'Trim','submodule_id' => '2','created_at' => '2020-02-06 03:28:48','updated_at' => '2020-02-06 03:28:48'],
            ['id' => '57','name' => 'Trim Type','submodule_id' => '2','created_at' => '2020-02-07 04:38:54','updated_at' => '2020-02-07 04:38:54'],
            ['id' => '58','name' => 'Season','submodule_id' => '2','created_at' => '2020-02-07 04:39:09','updated_at' => '2020-02-07 04:39:09'],
            ['id' => '59','name' => 'Order','submodule_id' => '20','created_at' => '2020-02-07 05:09:36','updated_at' => '2020-02-07 05:09:36'],
            ['id' => '60','name' => 'Team','submodule_id' => '2','created_at' => '2020-02-12 05:24:20','updated_at' => '2020-02-12 05:24:20'],
            ['id' => '61','name' => 'Fright Mode','submodule_id' => '2','created_at' => '2020-02-22 23:12:20','updated_at' => '2020-02-22 23:12:20'],
            ['id' => '62','name' => 'Sample Dispatch','submodule_id' => '21','created_at' => '2020-03-07 22:36:48','updated_at' => '2020-03-07 22:36:48'],
            ['id' => '63','name' => 'Courier','submodule_id' => '2','created_at' => '2020-03-07 23:11:01','updated_at' => '2020-03-07 23:11:01'],
            ['id' => '64','name' => 'Process','submodule_id' => '22','created_at' => '2020-03-09 01:24:17','updated_at' => '2020-03-09 01:24:17'],
            ['id' => '65','name' => 'Basic Rate Setup','submodule_id' => '22','created_at' => '2020-03-09 01:25:32','updated_at' => '2020-03-09 01:25:32'],
            ['id' => '66','name' => 'Sample Rate Setup','submodule_id' => '22','created_at' => '2020-03-09 01:26:07','updated_at' => '2020-03-09 01:26:07'],
            ['id' => '67','name' => 'Production Rate Setup','submodule_id' => '22','created_at' => '2020-03-09 01:26:50','updated_at' => '2020-03-09 01:26:50'],
            ['id' => '68','name' => 'Production Bonus Rate Setup','submodule_id' => '22','created_at' => '2020-03-12 04:49:53','updated_at' => '2020-03-12 04:49:53'],
            ['id' => '69','name' => 'Order Costing','submodule_id' => '20','created_at' => '2020-03-13 04:42:23','updated_at' => '2020-03-13 04:42:23'],
            ['id' => '70','name' => 'Employees Production Rate Entry','submodule_id' => '22','created_at' => '2020-03-16 02:49:40','updated_at' => '2020-03-16 02:49:40'],
            ['id' => '71','name' => 'Production Salary Generate','submodule_id' => '22','created_at' => '2020-03-19 04:35:42','updated_at' => '2020-03-19 04:35:42'],
            ['id' => '72','name' => 'Employees Production Rate','submodule_id' => '22','created_at' => '2020-04-01 19:16:13','updated_at' => '2020-04-01 19:16:13'],
            ['id' => '73','name' => 'Daily Work Report','submodule_id' => '23','created_at' => '2020-04-13 06:42:41','updated_at' => '2020-04-13 06:42:41'],
            ['id' => '74','name' => 'Work Order','submodule_id' => '24','created_at' => '2020-05-13 21:17:58','updated_at' => '2020-05-13 21:17:58'],
            ['id' => '75','name' => 'Supplier PI','submodule_id' => '25','created_at' => '2020-05-13 21:19:36','updated_at' => '2020-05-13 21:19:36'],
            ['id' => '76','name' => 'Payments','submodule_id' => '27','created_at' => '2020-06-09 00:49:28','updated_at' => '2020-11-12 04:04:28'],
            ['id' => '77','name' => 'Remarks','submodule_id' => '27','created_at' => '2020-06-09 00:49:43','updated_at' => '2020-11-12 04:04:49'],
            ['id' => '78','name' => 'PI','submodule_id' => '27','created_at' => '2020-06-09 00:51:16','updated_at' => '2020-06-09 00:51:16'],
            ['id' => '79','name' => 'SMS Send','submodule_id' => '28','created_at' => '2020-07-06 22:06:08','updated_at' => '2020-07-06 22:06:08'],
            ['id' => '80','name' => 'Notice','submodule_id' => '29','created_at' => '2020-07-06 22:06:29','updated_at' => '2020-07-06 22:06:29'],
            ['id' => '81','name' => 'Trim Details','submodule_id' => '2','created_at' => '2020-07-06 22:40:15','updated_at' => '2020-07-06 22:40:15'],
            ['id' => '82','name' => 'Arp Good Receive','submodule_id' => '30','created_at' => '2020-10-07 00:30:29','updated_at' => '2020-10-07 00:30:29'],
            ['id' => '83','name' => 'Arp Good Issue','submodule_id' => '30','created_at' => '2020-10-07 00:30:38','updated_at' => '2020-10-07 00:30:38'],
            ['id' => '84','name' => 'Provident Fund Policy','submodule_id' => '31','created_at' => '2020-10-20 03:45:06','updated_at' => '2020-10-20 03:45:06'],
            ['id' => '85','name' => 'Provident Fund Enrolment','submodule_id' => '31','created_at' => '2020-10-20 03:45:26','updated_at' => '2020-10-20 03:45:26'],
            ['id' => '86','name' => 'Provident Fund Opening Balance','submodule_id' => '31','created_at' => '2020-10-20 03:45:50','updated_at' => '2020-10-20 03:45:50'],
            ['id' => '87','name' => 'Provident Fund Balance','submodule_id' => '31','created_at' => '2020-10-20 03:46:03','updated_at' => '2020-10-20 03:46:03'],
            ['id' => '88','name' => 'Sales Id','submodule_id' => '32','created_at' => '2020-10-20 04:25:22','updated_at' => '2020-10-20 04:25:22'],
            ['id' => '89','name' => 'Order Details','submodule_id' => '33','created_at' => '2020-10-20 04:26:03','updated_at' => '2020-10-20 04:26:03'],
            ['id' => '90','name' => 'Monthly Summary','submodule_id' => '33','created_at' => '2020-10-20 04:26:16','updated_at' => '2020-10-20 04:26:16'],
            ['id' => '91','name' => 'Order Summary','submodule_id' => '33','created_at' => '2020-10-20 04:26:27','updated_at' => '2020-10-20 04:26:27'],
            ['id' => '92','name' => 'MID','submodule_id' => '34','created_at' => '2020-10-20 04:27:10','updated_at' => '2020-10-20 04:27:10'],
            ['id' => '93','name' => 'ARP Reports','submodule_id' => '30','created_at' => '2020-11-12 02:39:11','updated_at' => '2020-11-12 02:39:11'],
            ['id' => '94','name' => 'Others Pi','submodule_id' => '27','created_at' => '2020-11-12 03:09:59','updated_at' => '2020-11-12 03:13:01'],
            ['id' => '95','name' => 'Schedule Management','submodule_id' => '35','created_at' => '2020-11-12 23:34:53','updated_at' => '2020-11-12 23:34:53'],
            ['id' => '97','name' => 'Dyeing Order','submodule_id' => '24','created_at' => '2020-11-18 21:26:52','updated_at' => '2020-11-18 21:26:52'],
            ['id' => '98','name' => 'Compliance Attendance','submodule_id' => '8','created_at' => '2020-12-02 22:59:41','updated_at' => '2020-12-02 22:59:41'],
            ['id' => '99','name' => 'BB LC','submodule_id' => '36','created_at' => '2020-12-07 01:27:42','updated_at' => '2020-12-07 01:27:42'],
            ['id' => '100','name' => 'Currency Conversion','submodule_id' => '1','created_at' => '2020-12-14 23:20:29','updated_at' => '2020-12-14 23:20:29'],
            ['id' => '101','name' => 'Job Type','submodule_id' => '2','created_at' => '2020-12-15 22:58:46','updated_at' => '2020-12-15 22:58:46'],
            ['id' => '102','name' => 'Yarn Good Receive','submodule_id' => '30','created_at' => '2020-12-19 22:37:24','updated_at' => '2020-12-19 22:37:24'],
            ['id' => '103','name' => 'Yarn Good Issue','submodule_id' => '30','created_at' => '2020-12-19 22:37:37','updated_at' => '2020-12-19 22:37:37'],
            ['id' => '104','name' => 'Yarn Reports','submodule_id' => '30','created_at' => '2020-12-19 22:37:47','updated_at' => '2020-12-19 22:37:47'],
            ['id' => '105','name' => 'Knit Yarn Order','submodule_id' => '24','created_at' => '2020-12-31 00:09:13','updated_at' => '2020-12-31 00:09:13'],
            ['id' => '106','name' => 'Knit Yarn Good Receive','submodule_id' => '30','created_at' => '2020-12-31 00:09:34','updated_at' => '2020-12-31 00:09:34'],
            ['id' => '107','name' => 'Subcontract Work Order','submodule_id' => '24','created_at' => '2020-12-31 03:53:47','updated_at' => '2020-12-31 03:53:47'],
            ['id' => '108','name' => 'Subcontract Good Receive','submodule_id' => '30','created_at' => '2020-12-31 03:59:10','updated_at' => '2020-12-31 03:59:10'],
            ['id' => '109','name' => 'Knit Yarn Reports','submodule_id' => '30','created_at' => '2021-01-01 11:15:00','updated_at' => '2021-01-01 11:15:00'],
            ['id' => '110','name' => 'MID Transfer','submodule_id' => '37','created_at' => '2021-01-03 22:12:35','updated_at' => '2021-01-03 22:12:35'],
            ['id' => '111','name' => 'Commercial Invoice','submodule_id' => '38','created_at' => '2021-01-10 01:38:42','updated_at' => '2021-01-10 01:38:42'],
            ['id' => '112','name' => 'Line','submodule_id' => '4','created_at' => '2021-01-11 23:05:59','updated_at' => '2021-01-11 23:05:59'],
            ['id' => '113','name' => 'SID Remaining Balance','submodule_id' => '33','created_at' => '2021-01-17 23:44:38','updated_at' => '2021-01-17 23:44:38'],
            ['id' => '114','name' => 'ARP','submodule_id' => '39','created_at' => '2021-01-25 22:50:04','updated_at' => '2021-01-28 03:28:51'],
            ['id' => '115','name' => 'Sweater Yarn','submodule_id' => '39','created_at' => '2021-01-28 03:29:06','updated_at' => '2021-01-28 03:29:06'],
            ['id' => '116','name' => 'Subcontract','submodule_id' => '39','created_at' => '2021-01-30 22:03:24','updated_at' => '2021-01-30 22:03:24'],
            ['id' => '117','name' => 'Overtime & Holiday Allowance','submodule_id' => '40','created_at' => '2021-02-02 00:13:19','updated_at' => '2021-02-02 00:13:19'],
            ['id' => '118','name' => 'Integration','submodule_id' => '18','created_at' => '2021-02-02 03:21:12','updated_at' => '2021-02-02 03:21:12'],
            ['id' => '119','name' => 'Device Api','submodule_id' => '18','created_at' => '2021-02-02 04:00:26','updated_at' => '2021-02-02 04:00:26'],
            ['id' => '120','name' => 'Woven Fabric Order','submodule_id' => '24','created_at' => '2021-02-06 22:54:17','updated_at' => '2021-02-06 22:54:17'],
            ['id' => '121','name' => 'Woven Fabric Good Receive','submodule_id' => '30','created_at' => '2021-02-06 22:54:35','updated_at' => '2021-02-06 22:54:35'],
            ['id' => '122','name' => 'Woven Fabric Good Issue','submodule_id' => '30','created_at' => '2021-02-06 22:54:48','updated_at' => '2021-02-06 22:54:48'],
            ['id' => '123','name' => 'Woven Fabric Reports','submodule_id' => '30','created_at' => '2021-02-06 22:54:57','updated_at' => '2021-02-06 22:54:57'],
            ['id' => '124','name' => 'Woven Fabric','submodule_id' => '39','created_at' => '2021-02-07 03:48:46','updated_at' => '2021-02-07 03:48:46'],

            ['id' => '125','name' => 'Account Setup','submodule_id' => '41','created_at' => '2021-02-12 23:23:10','updated_at' => '2021-02-12 23:23:10'],
            ['id' => '126','name' => 'Account Group','submodule_id' => '41','created_at' => '2021-02-12 23:26:02','updated_at' => '2021-02-12 23:26:02'],
            ['id' => '127','name' => 'Account Control','submodule_id' => '41','created_at' => '2021-02-12 23:26:47','updated_at' => '2021-02-12 23:26:47'],
            ['id' => '128','name' => 'Account Subsidiary','submodule_id' => '41','created_at' => '2021-02-12 23:33:18','updated_at' => '2021-02-12 23:33:18'],
            ['id' => '129','name' => 'Account','submodule_id' => '41','created_at' => '2021-02-12 23:34:14','updated_at' => '2021-02-12 23:34:14'],
            ['id' => '130','name' => 'Voucher','submodule_id' => '42','created_at' => '2021-02-12 23:34:53','updated_at' => '2021-02-12 23:34:53'],
            ['id' => '131','name' => 'Fund Transfer','submodule_id' => '43','created_at' => '2021-02-12 23:36:00','updated_at' => '2021-02-12 23:36:00'],
            ['id' => '132','name' => 'Report','submodule_id' => '44','created_at' => '2021-02-12 23:37:28','updated_at' => '2021-02-12 23:37:28'],


            // employee permission
            ['id' => '133','name' => 'Profile','submodule_id' => '45','created_at' => '2021-02-13 16:23:18','updated_at' => '2021-02-13 16:23:18'],
            ['id' => '134','name' => 'Leave Application','submodule_id' => '46','created_at' => '2021-02-13 16:23:38','updated_at' => '2021-02-13 16:23:38'],
            ['id' => '135','name' => 'Short Leave','submodule_id' => '46','created_at' => '2021-02-13 16:23:50','updated_at' => '2021-02-13 16:23:50'],
            ['id' => '136','name' => 'E. Hr Loan','submodule_id' => '47','created_at' => '2021-02-13 16:24:02','updated_at' => '2021-02-13 16:24:02'],
            ['id' => '137','name' => 'E. Out Work','submodule_id' => '48','created_at' => '2021-02-13 16:24:18','updated_at' => '2021-02-13 16:24:18'],
            ['id' => '138','name' => 'Payslip','submodule_id' => '49','created_at' => '2021-02-13 16:24:33','updated_at' => '2021-02-13 16:24:33'],
            ['id' => '139','name' => 'E. Notice','submodule_id' => '50','created_at' => '2021-02-13 16:24:46','updated_at' => '2021-02-13 16:24:46'],
            ['id' => '140','name' => 'Expense','submodule_id' => '51','created_at' => '2021-02-13 16:24:46','updated_at' => '2021-02-13 16:24:46'],



            ['id' => '141','name' => 'BB LC Irregular','submodule_id' => '36','created_at' => '2021-02-13 16:24:46','updated_at' => '2021-02-13 16:24:46'],
            ['id' => '142','name' => 'Transfer Yarn','submodule_id' => '53','created_at' => '2021-03-01 10:17:46','updated_at' => '2021-08-12 16:35:34'],
            ['id' => '143','name' => 'Knit Yarn','submodule_id' => '39','created_at' => '2021-03-01 14:05:03','updated_at' => '2021-03-01 14:05:03'],
            ['id' => '144','name' => 'Shipment Budget','submodule_id' => '20','created_at' => '2021-03-10 12:11:11','updated_at' => '2021-03-10 12:11:11'],
            ['id' => '145','name' => 'Programs','submodule_id' => '52','created_at' => '2021-03-01 10:17:46','updated_at' => '2021-08-12 16:34:57'],
            ['id' => '146','name' => 'Knit Yarn Issue','submodule_id' => '53','created_at' => '2021-03-01 10:17:46','updated_at' => '2021-08-12 16:36:53'],
            ['id' => '147','name' => 'Holiday Assign','submodule_id' => '35','created_at' => '2021-03-22 19:16:47','updated_at' => '2021-03-22 19:16:47'],
            ['id' => '148','name' => 'Issue Return','submodule_id' => '53','created_at' => '2021-03-23 13:04:23','updated_at' => '2021-08-12 16:40:05'],
            ['id' => '149','name' => 'Migration Letter','submodule_id' => '19','created_at' => '2021-03-27 12:11:19','updated_at' => '2021-03-27 12:11:19'],
            ['id' => '150','name' => 'E. Other Expense','submodule_id' => '56','created_at' => '2021-03-27 17:54:37','updated_at' => '2021-03-27 17:54:37'],
            ['id' => '151','name' => 'E. Daily Work','submodule_id' => '57','created_at' => '2021-03-27 18:20:17','updated_at' => '2021-03-27 18:20:17'],
            ['id' => '152','name' => 'Show Case Letter','submodule_id' => '19','created_at' => '2021-03-28 14:28:04','updated_at' => '2021-03-28 14:28:04'],
            ['id' => '153','name' => 'Gray Fabric Receive','submodule_id' => '53','created_at' => '2021-03-31 19:14:31','updated_at' => '2021-08-12 16:42:52'],
            ['id' => '154','name' => 'G. Fabric Stock Report','submodule_id' => '58','created_at' => '2021-03-31 19:14:42','updated_at' => '2021-03-31 19:14:42'],
            ['id' => '155','name' => 'Loose Yarn Stock Report','submodule_id' => '58','created_at' => '2021-03-31 19:14:53','updated_at' => '2021-03-31 19:14:53'],
            ['id' => '156','name' => 'Mid Value Adjust','submodule_id' => '59','created_at' => '2021-06-16 10:05:21','updated_at' => '2021-06-16 10:05:21'],
            ['id' => '157','name' => 'Compliance','submodule_id' => '60','created_at' => '2021-06-17 10:25:33','updated_at' => '2021-06-17 10:25:33'],
            ['id' => '158','name' => 'E. Attendance','submodule_id' => '61','created_at' => '2021-06-22 12:15:35','updated_at' => '2021-06-22 12:15:35'],
            ['id' => '159','name' => 'Id Card Setting','submodule_id' => '1','created_at' => '2021-06-30 12:30:51','updated_at' => '2021-06-30 12:30:51'],
            ['id' => '160','name' => 'Id Card Print','submodule_id' => '3','created_at' => '2021-06-30 12:31:22','updated_at' => '2021-06-30 12:31:22'],
            ['id' => '161','name' => 'G Fabric Issue','submodule_id' => '54','created_at' => '2021-07-12 14:47:59','updated_at' => '2021-07-12 14:47:59'],
            ['id' => '162','name' => 'Knitting Dyeing Payment','submodule_id' => '39','created_at' => '2021-07-12 14:59:33','updated_at' => '2021-07-12 14:59:33'],
            ['id' => '163','name' => 'G Fabric Return','submodule_id' => '54','created_at' => '2021-07-15 16:46:00','updated_at' => '2021-07-15 16:46:00'],
            ['id' => '164','name' => 'Dyed Fabric Receive','submodule_id' => '54','created_at' => '2021-08-12 16:44:55','updated_at' => '2021-08-12 16:44:55'],
            ['id' => '165','name' => 'Cutting Fabric Issue','submodule_id' => '54','created_at' => '2021-08-12 16:45:30','updated_at' => '2021-08-12 16:55:29'],
            ['id' => '166','name' => 'Loose Yarn Issue','submodule_id' => '55','created_at' => '2021-08-12 16:53:41','updated_at' => '2021-08-12 16:53:41'],
            ['id' => '167','name' => 'Loose Fabric Issue','submodule_id' => '55','created_at' => '2021-08-12 16:54:00','updated_at' => '2021-08-12 16:54:00'],
            ['id' => '168','name' => 'Dyed Fabric Stock Report','submodule_id' => '58','created_at' => '2021-08-12 16:59:33','updated_at' => '2021-08-12 16:59:33'],
            ['id' => '169','name' => 'Loose Fabric Stock Report','submodule_id' => '58','created_at' => '2021-08-12 17:00:08','updated_at' => '2021-08-12 17:00:08'],
            ['id' => '170','name' => 'Dyeing Payment','submodule_id' => '39','created_at' => '2021-08-12 17:00:08','updated_at' => '2021-08-12 17:00:08']

        ];
    }
}
