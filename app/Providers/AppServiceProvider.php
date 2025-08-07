<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Module\Nagarik\Providers\NagarikServiceProvider;
use Module\Permission\Models\Module;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Module\Account\Providers\AccountServiceProvider;
use Module\CRM\Providers\CRMServiceProvider;
use Module\Permission\Models\EmployeePermission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {

        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                if (!session()->has('slugs') && Schema::hasTable('modules')) {
                    session()->put('slugs', auth()->user()->permissions()->pluck('slug')->toArray());
                    session()->put('active_modules', Module::active()->pluck('name')->toArray());
                    $em_slugs = EmployeePermission::with('permission')->get()->pluck('permission.slug')->toArray() ?? [];
                    session()->put('em_slugs', $em_slugs);
                }


                view()->share(['slugs' => (session()->get('slugs') ?? []), 'active_modules' => (session()->get('active_modules') ?? []), 'em_slugs' => (session()->get('em_slugs') ?? [])]);

                if ($view->getName() == 'partials._footer') {
                    session()->forget('slugs');
                    session()->forget('em_slugs');
                    session()->forget('active_modules');
                }
            } else {
                view()->share(['slugs' => [], 'active_modules' => []]);
            }
        });


        Schema::defaultStringLength(191);



        $this->configureModuleProvider();


        // Add the namespace for the Society module views
        View::addNamespace('Society', base_path('module/Society/views'));
    }






    public function configureModuleProvider()
    {
        $modules = collect([]);

        if (Schema::hasTable('modules')) {
            $modules = Module::active()->get();
        }



        $this->app->bind(CRMServiceProvider::class);



        // account module
        if ($modules->where('name', 'Account & Finance')->first() && file_exists(base_path() . '/module/Account/web_account.php')) {
            $this->app->bind(AccountServiceProvider::class);
        }

        if ($modules->where('name', 'Nagarik')->first() && file_exists(base_path() . '/module/Nagarik/routes/web.php')) {
            $this->app->bind(NagarikServiceProvider::class);
        }
    }
}
