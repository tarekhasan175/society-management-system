<?php

namespace Module\Production\Providers;

use Illuminate\Support\ServiceProvider;

class ProductionServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom([
            base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Production'.DIRECTORY_SEPARATOR.'database',
        ]);

        
    }
}
