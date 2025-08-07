<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Module\Permission\Models\Module;

class RouteServiceProvider extends ServiceProvider{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace    = 'App\Http\Controllers';

    // Permission module
    protected $permission   = 'Module\Permission\Controllers';

    // Account Module
    protected $account      = 'Module\Account\Controllers';

    // CRM module
    protected $crm          = 'Module\CRM\Controllers';

    // Production Module
    protected $production   = 'Module\Production\Controllers';

//    protected $nagarik   = 'Module\Nagarik\Controllers';
    protected $nagarik   = '';
    protected $chamber   = '';
    protected $society   = '';

    // Root System
    public $HOME = '/';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(){
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(){
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapModuleRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(){
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapModuleRoutes(){
        // PERMISSION
        Route::group(['middleware' => 'web'], function () {
            Route::namespace($this->permission)->group(base_path('module/Permission/routes/web_permission.php'));
        });

        try {
            $modules = collect([]);

            if (Schema::hasTable('modules')) {
                $modules = Module::active()->get();
            }

            // Production
            if ($modules->where('name', 'Production')->first()) {
                Route::group(['middleware' => ['web', 'auth']], function () {
                    Route::namespace($this->production)->group(base_path('module/Production/routes/web.php'));
                });
            }
            // Nagarik
            if ($modules->where('name', 'Nagarik')->first()) {
                Route::group(['middleware' => ['web', 'auth']], function () {
                    Route::namespace($this->nagarik)->group(base_path('module/Nagarik/routes/web.php'));
                });
            }

            // For Account & Finance
            if ($modules->where('name', 'Account & Finance')->first() && file_exists(base_path() . '/module/Account/routes/web_account.php')) {

                Route::group(['middleware' => ['web', 'auth']], function () {
                    Route::namespace($this->account)->group(base_path('module/Account/routes/web_account.php'));
                });
            }
            
            // For Chamber
            if ($modules->where('name', 'Chamber')->first() && file_exists(base_path() . '/module/Chamber/routes/web.php')) {

                Route::group(['middleware' => ['web', 'auth']], function () {
                    Route::namespace($this->chamber)->group(base_path('module/Chamber/routes/web.php'));
                });
            }

            if ($modules->where('name', 'Society')->first() && file_exists(base_path() . '/module/Society/routes/web.php')) {

                Route::group(['middleware' => ['web', 'auth']], function () {
                    Route::namespace($this->society)->group(base_path('module/Society/routes/web.php'));
                });
            }
        } catch (\Exception $ex) {
            info('Database not setup or permission table not found');
        }
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes(){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
