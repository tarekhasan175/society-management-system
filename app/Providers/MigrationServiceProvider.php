<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Module\Permission\Models\Module;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        try {

            $modules = collect([]);

            if(Schema::hasTable('modules')) {
                $modules = Module::active()->get();
            }



            $this->loadMigrationsFrom([
                base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Permission'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
            ]);



            if($modules->where('name', 'CRM')->first()) {
                $this->loadMigrationsFrom([
                    base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'CRM'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
                ]);
            }


            if($modules->where('name', 'Account & Finance')->first() && file_exists(base_path() . '/module/Account/routes/web_account.php')) {
                $this->loadMigrationsFrom([
                    base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Account'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
                ]);
            }

            if($modules->where('name', 'Nagarik')->first() && file_exists(base_path() . '/module/Nagarik/routes/web.php')) {
                $this->loadMigrationsFrom([
                    base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Nagarik'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
                ]);
            }

            if($modules->where('name', 'Chamber')->first() && file_exists(base_path() . '/module/Chamber/routes/web.php')) {
                $this->loadMigrationsFrom([
                    base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Chamber'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
                ]);
            }

            if($modules->where('name', 'Society')->first() && file_exists(base_path() . '/module/Society/routes/web.php')) {
                $this->loadMigrationsFrom([
                    base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Society'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations'
                ]);
            }
        } catch(\Exception $ex)  {

        }

    }
}
