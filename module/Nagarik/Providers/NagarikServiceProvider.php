<?php

namespace Module\Nagarik\Providers;

use Illuminate\Support\ServiceProvider;

class NagarikServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TradeLicenseService::class, function ($app) {
            return new TradeLicenseService();
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom([
            base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'Nagarik'.DIRECTORY_SEPARATOR.'database',
        ]);


    }
}
