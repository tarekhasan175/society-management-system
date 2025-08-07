<?php

namespace Module\Account\database\seeds;

use Illuminate\Database\Seeder;
use Module\Permission\Models\ParentPermission;
use Module\Permission\Models\Permission;
use Module\Permission\Models\Submodule;

class AccountModulePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Submodule::where('id', '>=', 150000)->where('id', '<', 160000)->count() == 0) {


            Submodule::query()->insert($this->submodules_data());
        }

        if (ParentPermission::where('id', '>=', 150000)->where('id', '<', 160000)->count() == 0) {


            ParentPermission::query()->insert($this->parent_permission_data());

        }

        if (Permission::where('id', '>=', 150000)->where('id', '<', 160000)->count() == 0) {


            Permission::query()->insert($this->permission_data());

        }

    }














    private function submodules_data()
    {
        return array(
            
          array('id' => '150000','name' => 'Account Setup','module_id' => '150000','created_at' => '2021-11-17 15:09:50','updated_at' => '2021-11-17 15:24:41'),
          array('id' => '150001','name' => 'Account Product','module_id' => '150000','created_at' => '2021-11-17 15:10:47','updated_at' => '2021-11-17 15:24:30'),
          array('id' => '150002','name' => 'Account Voucher','module_id' => '150000','created_at' => '2021-11-17 15:10:37','updated_at' => '2021-11-17 15:24:20'),
          array('id' => '150004','name' => 'Account Party','module_id' => '150000','created_at' => '2021-11-17 15:23:21','updated_at' => '2021-11-17 15:24:05'),
          array('id' => '150005','name' => 'Account Purchase','module_id' => '150000','created_at' => '2021-11-17 15:23:53','updated_at' => '2021-11-17 15:23:53'),
          array('id' => '150006','name' => 'Account Sale','module_id' => '150000','created_at' => '2021-11-17 15:25:06','updated_at' => '2021-11-17 15:25:06'),
          array('id' => '150007','name' => 'Account Report','module_id' => '150000','created_at' => '2021-11-17 15:25:06','updated_at' => '2021-11-17 15:25:06')

        );
    }











    private function parent_permission_data()
    {
        return array(
            
          array('id' => '150000','name' => 'Account Setup','submodule_id' => '150000','created_at' => '2021-11-17 15:33:03','updated_at' => '2021-11-17 15:33:03'),
          array('id' => '150001','name' => 'Account Subsidiary','submodule_id' => '150000','created_at' => '2021-11-17 15:33:26','updated_at' => '2021-11-17 15:33:26'),
          array('id' => '150002','name' => 'Account Chart','submodule_id' => '150000','created_at' => '2021-11-17 15:33:40','updated_at' => '2021-11-17 15:33:40'),
          array('id' => '150003','name' => 'Payment Voucher','submodule_id' => '150002','created_at' => '2021-11-17 15:43:55','updated_at' => '2021-11-17 15:45:16'),
          array('id' => '150004','name' => 'Receive Voucher','submodule_id' => '150002','created_at' => '2021-11-17 15:44:12','updated_at' => '2021-11-17 15:44:58'),
          array('id' => '150005','name' => 'Contra Voucher','submodule_id' => '150002','created_at' => '2021-11-17 15:44:44','updated_at' => '2021-11-17 15:44:44'),
          array('id' => '150006','name' => 'Journal Voucher','submodule_id' => '150002','created_at' => '2021-11-17 15:45:29','updated_at' => '2021-11-17 15:45:29'),
          array('id' => '150007','name' => 'Account Product','submodule_id' => '150001','created_at' => '2021-11-17 15:46:59','updated_at' => '2021-11-17 15:46:59'),
          array('id' => '150008','name' => 'Account Category','submodule_id' => '150001','created_at' => '2021-11-17 15:47:11','updated_at' => '2021-11-17 15:47:11'),
          array('id' => '150009','name' => 'Account Unit','submodule_id' => '150001','created_at' => '2021-11-17 15:47:23','updated_at' => '2021-11-17 15:47:23'),
          array('id' => '150010','name' => 'Account Customer','submodule_id' => '150004','created_at' => '2021-11-17 15:47:43','updated_at' => '2021-11-17 15:47:43'),
          array('id' => '150011','name' => 'Account Supplier','submodule_id' => '150004','created_at' => '2021-11-17 15:48:00','updated_at' => '2021-11-17 15:48:00'),
          array('id' => '150012','name' => 'Account Purchase','submodule_id' => '150005','created_at' => '2021-11-17 15:48:16','updated_at' => '2021-11-17 15:48:16'),
          array('id' => '150013','name' => 'Account Sale','submodule_id' => '150006','created_at' => '2021-11-17 15:50:16','updated_at' => '2021-11-17 15:50:16'),
          array('id' => '150014','name' => 'Account Ledger','submodule_id' => '150007','created_at' => '2021-11-17 15:50:41','updated_at' => '2021-11-17 15:50:41'),
          array('id' => '150015','name' => 'Financial Report','submodule_id' => '150007','created_at' => '2021-11-17 15:51:06','updated_at' => '2021-11-17 15:51:06'),
          array('id' => '150016','name' => 'Account Inventory','submodule_id' => '150007','created_at' => '2021-11-17 15:51:22','updated_at' => '2021-11-17 15:51:22')

        );
    }










    private function permission_data()
    {
        return array(
            
            array('id' => '150000','name' => 'Account Setup','slug' => 'account-setups.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150000','status' => '1','created_at' => '2021-11-17 15:57:27','updated_at' => '2021-11-17 15:57:27'),
            array('id' => '150001','name' => 'Account Group','slug' => 'account-groups.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150000','status' => '1','created_at' => '2021-11-17 15:57:27','updated_at' => '2021-11-17 15:57:27'),
            array('id' => '150002','name' => 'Account Control','slug' => 'account-controls.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150000','status' => '1','created_at' => '2021-11-17 15:57:27','updated_at' => '2021-11-17 15:57:27'),
            array('id' => '150003','name' => 'Account Subsidiary','slug' => 'account-subsidiaries.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150001','status' => '1','created_at' => '2021-11-17 16:00:51','updated_at' => '2021-11-17 16:00:51'),
            array('id' => '150004','name' => 'View','slug' => 'account-subsidiaries.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150001','status' => '1','created_at' => '2021-11-17 16:00:51','updated_at' => '2021-11-17 16:00:51'),
            array('id' => '150005','name' => 'Create','slug' => 'account-subsidiaries.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150001','status' => '1','created_at' => '2021-11-17 16:00:51','updated_at' => '2021-11-17 16:00:51'),
            array('id' => '150006','name' => 'Edit','slug' => 'account-subsidiaries.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150001','status' => '1','created_at' => '2021-11-17 16:00:51','updated_at' => '2021-11-17 16:00:51'),
            array('id' => '150007','name' => 'Delete','slug' => 'account-subsidiaries.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150001','status' => '1','created_at' => '2021-11-17 16:00:51','updated_at' => '2021-11-17 16:00:51'),
            array('id' => '150008','name' => 'Account Chart','slug' => 'account.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150002','status' => '1','created_at' => '2021-11-17 16:04:37','updated_at' => '2021-11-17 16:04:37'),
            array('id' => '150009','name' => 'View','slug' => 'account.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150002','status' => '1','created_at' => '2021-11-17 16:04:37','updated_at' => '2021-11-17 16:04:37'),
            array('id' => '150010','name' => 'Create','slug' => 'account.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150002','status' => '1','created_at' => '2021-11-17 16:04:37','updated_at' => '2021-11-17 16:04:37'),
            array('id' => '150011','name' => 'Edit','slug' => 'account.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150002','status' => '1','created_at' => '2021-11-17 16:04:37','updated_at' => '2021-11-17 16:04:37'),
            array('id' => '150012','name' => 'Delete','slug' => 'account.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150002','status' => '1','created_at' => '2021-11-17 16:04:37','updated_at' => '2021-11-17 16:04:37'),
            array('id' => '150013','name' => 'Payment Voucher','slug' => 'voucher-payments.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150003','status' => '1','created_at' => '2021-11-17 16:10:29','updated_at' => '2021-11-17 16:10:29'),
            array('id' => '150014','name' => 'View','slug' => 'voucher-payments.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150003','status' => '1','created_at' => '2021-11-17 16:10:29','updated_at' => '2021-11-17 16:10:29'),
            array('id' => '150015','name' => 'Create','slug' => 'voucher-payments.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150003','status' => '1','created_at' => '2021-11-17 16:10:29','updated_at' => '2021-11-17 16:10:29'),
            array('id' => '150016','name' => 'Edit','slug' => 'voucher-payments.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150003','status' => '1','created_at' => '2021-11-17 16:10:29','updated_at' => '2021-11-17 16:10:29'),
            array('id' => '150017','name' => 'Delete','slug' => 'voucher-payments.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150003','status' => '1','created_at' => '2021-11-17 16:10:29','updated_at' => '2021-11-17 16:10:29'),
            array('id' => '150018','name' => 'Receive Voucher','slug' => 'voucher-receives.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150004','status' => '1','created_at' => '2021-11-17 16:12:03','updated_at' => '2021-11-17 16:12:03'),
            array('id' => '150019','name' => 'View','slug' => 'voucher-receives.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150004','status' => '1','created_at' => '2021-11-17 16:12:03','updated_at' => '2021-11-17 16:12:03'),
            array('id' => '150020','name' => 'Create','slug' => 'voucher-receives.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150004','status' => '1','created_at' => '2021-11-17 16:12:03','updated_at' => '2021-11-17 16:12:03'),
            array('id' => '150021','name' => 'Edit','slug' => 'voucher-receives.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150004','status' => '1','created_at' => '2021-11-17 16:12:03','updated_at' => '2021-11-17 16:12:03'),
            array('id' => '150022','name' => 'Delete','slug' => 'voucher-receives.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150004','status' => '1','created_at' => '2021-11-17 16:12:03','updated_at' => '2021-11-17 16:12:03'),
            array('id' => '150023','name' => 'Contra Voucher','slug' => 'voucher-contras.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150005','status' => '1','created_at' => '2021-11-17 16:13:58','updated_at' => '2021-11-17 16:13:58'),
            array('id' => '150024','name' => 'View','slug' => 'voucher-contras.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150005','status' => '1','created_at' => '2021-11-17 16:13:58','updated_at' => '2021-11-17 16:13:58'),
            array('id' => '150025','name' => 'Create','slug' => 'voucher-contras.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150005','status' => '1','created_at' => '2021-11-17 16:13:58','updated_at' => '2021-11-17 16:13:58'),
            array('id' => '150026','name' => 'Edit','slug' => 'voucher-contras.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150005','status' => '1','created_at' => '2021-11-17 16:13:58','updated_at' => '2021-11-17 16:13:58'),
            array('id' => '150027','name' => 'Delete','slug' => 'voucher-contras.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150005','status' => '1','created_at' => '2021-11-17 16:13:58','updated_at' => '2021-11-17 16:13:58'),
            array('id' => '150028','name' => 'Voucher Journal','slug' => 'voucher-journals.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150006','status' => '1','created_at' => '2021-11-17 16:14:43','updated_at' => '2021-11-17 16:14:43'),
            array('id' => '150029','name' => 'View','slug' => 'voucher-journals.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150006','status' => '1','created_at' => '2021-11-17 16:14:43','updated_at' => '2021-11-17 16:14:43'),
            array('id' => '150030','name' => 'Create','slug' => 'voucher-journals.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150006','status' => '1','created_at' => '2021-11-17 16:14:43','updated_at' => '2021-11-17 16:14:43'),
            array('id' => '150031','name' => 'Edit','slug' => 'voucher-journals.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150006','status' => '1','created_at' => '2021-11-17 16:14:43','updated_at' => '2021-11-17 16:14:43'),
            array('id' => '150032','name' => 'Delete','slug' => 'voucher-journals.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150006','status' => '1','created_at' => '2021-11-17 16:14:43','updated_at' => '2021-11-17 16:14:43'),
            array('id' => '150033','name' => 'Account Product','slug' => 'account-products.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150007','status' => '1','created_at' => '2021-11-17 16:18:04','updated_at' => '2021-11-17 16:18:04'),
            array('id' => '150034','name' => 'View','slug' => 'account-products.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150007','status' => '1','created_at' => '2021-11-17 16:18:04','updated_at' => '2021-11-17 16:18:04'),
            array('id' => '150035','name' => 'Create','slug' => 'account-products.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150007','status' => '1','created_at' => '2021-11-17 16:18:04','updated_at' => '2021-11-17 16:18:04'),
            array('id' => '150036','name' => 'Edit','slug' => 'account-products.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150007','status' => '1','created_at' => '2021-11-17 16:18:04','updated_at' => '2021-11-17 16:18:04'),
            array('id' => '150037','name' => 'Delete','slug' => 'account-products.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150007','status' => '1','created_at' => '2021-11-17 16:18:04','updated_at' => '2021-11-17 16:18:04'),
            array('id' => '150038','name' => 'Account Category','slug' => 'account-categories.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150008','status' => '1','created_at' => '2021-11-17 16:20:04','updated_at' => '2021-11-17 16:20:04'),
            array('id' => '150039','name' => 'View','slug' => 'account-categories.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150008','status' => '1','created_at' => '2021-11-17 16:20:04','updated_at' => '2021-11-17 16:20:04'),
            array('id' => '150040','name' => 'Create','slug' => 'account-categories.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150008','status' => '1','created_at' => '2021-11-17 16:20:04','updated_at' => '2021-11-17 16:20:04'),
            array('id' => '150041','name' => 'Edit','slug' => 'account-categories.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150008','status' => '1','created_at' => '2021-11-17 16:20:04','updated_at' => '2021-11-17 16:20:04'),
            array('id' => '150042','name' => 'Delete','slug' => 'account-categories.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150008','status' => '1','created_at' => '2021-11-17 16:20:04','updated_at' => '2021-11-17 16:20:04'),
            array('id' => '150043','name' => 'Account Unit','slug' => 'account-units.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150009','status' => '1','created_at' => '2021-11-17 16:20:25','updated_at' => '2021-11-17 16:20:25'),
            array('id' => '150044','name' => 'View','slug' => 'account-units.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150009','status' => '1','created_at' => '2021-11-17 16:20:25','updated_at' => '2021-11-17 16:20:25'),
            array('id' => '150045','name' => 'Create','slug' => 'account-units.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150009','status' => '1','created_at' => '2021-11-17 16:20:25','updated_at' => '2021-11-17 16:20:25'),
            array('id' => '150046','name' => 'Edit','slug' => 'account-units.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150009','status' => '1','created_at' => '2021-11-17 16:20:26','updated_at' => '2021-11-17 16:20:26'),
            array('id' => '150047','name' => 'Delete','slug' => 'account-units.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150009','status' => '1','created_at' => '2021-11-17 16:20:26','updated_at' => '2021-11-17 16:20:26'),
            array('id' => '150048','name' => 'Account Customer','slug' => 'account-customers.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150010','status' => '1','created_at' => '2021-11-17 16:24:19','updated_at' => '2021-11-17 16:24:19'),
            array('id' => '150049','name' => 'View','slug' => 'account-customers.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150010','status' => '1','created_at' => '2021-11-17 16:24:19','updated_at' => '2021-11-17 16:24:19'),
            array('id' => '150050','name' => 'Create','slug' => 'account-customers.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150010','status' => '1','created_at' => '2021-11-17 16:24:19','updated_at' => '2021-11-17 16:24:19'),
            array('id' => '150051','name' => 'Edit','slug' => 'account-customers.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150010','status' => '1','created_at' => '2021-11-17 16:24:19','updated_at' => '2021-11-17 16:24:19'),
            array('id' => '150052','name' => 'Delete','slug' => 'account-customers.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150010','status' => '1','created_at' => '2021-11-17 16:24:19','updated_at' => '2021-11-17 16:24:19'),
            array('id' => '150053','name' => 'Account Supplier','slug' => 'account-suppliers.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150011','status' => '1','created_at' => '2021-11-17 16:24:43','updated_at' => '2021-11-17 16:24:43'),
            array('id' => '150054','name' => 'View','slug' => 'account-suppliers.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150011','status' => '1','created_at' => '2021-11-17 16:24:43','updated_at' => '2021-11-17 16:24:43'),
            array('id' => '150055','name' => 'Create','slug' => 'account-suppliers.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150011','status' => '1','created_at' => '2021-11-17 16:24:43','updated_at' => '2021-11-17 16:24:43'),
            array('id' => '150056','name' => 'Edit','slug' => 'account-suppliers.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150011','status' => '1','created_at' => '2021-11-17 16:24:43','updated_at' => '2021-11-17 16:24:43'),
            array('id' => '150057','name' => 'Delete','slug' => 'account-suppliers.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150011','status' => '1','created_at' => '2021-11-17 16:24:43','updated_at' => '2021-11-17 16:24:43'),
            array('id' => '150058','name' => 'Account Purchase','slug' => 'account-purchases.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150012','status' => '1','created_at' => '2021-11-17 16:25:09','updated_at' => '2021-11-17 16:25:09'),
            array('id' => '150059','name' => 'View','slug' => 'account-purchases.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150012','status' => '1','created_at' => '2021-11-17 16:25:09','updated_at' => '2021-11-17 16:25:09'),
            array('id' => '150060','name' => 'Create','slug' => 'account-purchases.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150012','status' => '1','created_at' => '2021-11-17 16:25:09','updated_at' => '2021-11-17 16:25:09'),
            array('id' => '150061','name' => 'Edit','slug' => 'account-purchases.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150012','status' => '1','created_at' => '2021-11-17 16:25:09','updated_at' => '2021-11-17 16:25:09'),
            array('id' => '150062','name' => 'Delete','slug' => 'account-purchases.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150012','status' => '1','created_at' => '2021-11-17 16:25:09','updated_at' => '2021-11-17 16:25:09'),
            array('id' => '150063','name' => 'Account Sale','slug' => 'account-sales.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150013','status' => '1','created_at' => '2021-11-17 16:27:27','updated_at' => '2021-11-17 16:27:27'),
            array('id' => '150064','name' => 'View','slug' => 'account-sales.view','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150013','status' => '1','created_at' => '2021-11-17 16:27:27','updated_at' => '2021-11-17 16:27:27'),
            array('id' => '150065','name' => 'Create','slug' => 'account-sales.create','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150013','status' => '1','created_at' => '2021-11-17 16:27:28','updated_at' => '2021-11-17 16:27:28'),
            array('id' => '150066','name' => 'Edit','slug' => 'account-sales.edit','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150013','status' => '1','created_at' => '2021-11-17 16:27:28','updated_at' => '2021-11-17 16:27:28'),
            array('id' => '150067','name' => 'Delete','slug' => 'account-sales.delete','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150013','status' => '1','created_at' => '2021-11-17 16:27:28','updated_at' => '2021-11-17 16:27:28'),
            array('id' => '150068','name' => 'Account Ledger','slug' => 'account-ledgers.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:08','updated_at' => '2021-11-17 16:29:08'),
            array('id' => '150069','name' => 'Chart Of Account','slug' => 'report.chart-of-account','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:08','updated_at' => '2021-11-17 16:34:59'),
            array('id' => '150070','name' => 'Ledger Journal','slug' => 'report.ledger-journal','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:08','updated_at' => '2021-11-17 16:34:26'),
            array('id' => '150071','name' => 'Account Ledger','slug' => 'report.account-ledger','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:08','updated_at' => '2021-11-17 16:33:57'),
            array('id' => '150072','name' => 'Customer Ledger','slug' => 'report.customer-ledger','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:09','updated_at' => '2021-11-17 16:33:22'),
            array('id' => '150073','name' => 'Supplier Ledger','slug' => 'report.supplier-ledger','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:09','updated_at' => '2021-11-17 16:32:03'),
            array('id' => '150074','name' => 'Subsidiary Ledger','slug' => 'report.subsidiary-wise-ledger','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150014','status' => '1','created_at' => '2021-11-17 16:29:09','updated_at' => '2021-11-17 16:31:17'),
            array('id' => '150075','name' => 'Financial Report','slug' => 'financial-reports.index','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:13','updated_at' => '2021-11-17 16:36:13'),
            array('id' => '150076','name' => 'Trial Balance','slug' => 'report.trial-balance','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:13','updated_at' => '2021-11-17 16:38:49'),
            array('id' => '150077','name' => 'Income Statement','slug' => 'report.income-statement','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:13','updated_at' => '2021-11-17 16:38:12'),
            array('id' => '150078','name' => 'Equity Statement','slug' => 'report.equity-statement','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:13','updated_at' => '2021-11-17 16:37:44'),
            array('id' => '150079','name' => 'Balance Sheet','slug' => 'report.balance-sheet','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:13','updated_at' => '2021-11-17 16:37:15'),
            array('id' => '150080','name' => 'Cash Flow','slug' => 'report.cash.flow','description' => NULL,'created_by' => '1','updated_by' => '1','parent_permission_id' => '150015','status' => '1','created_at' => '2021-11-17 16:36:14','updated_at' => '2021-11-17 16:36:49')
        );
    }
}
