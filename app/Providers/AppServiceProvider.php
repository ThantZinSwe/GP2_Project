<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          // Dao Registration
    $this->app->bind('App\Contracts\Dao\Admin\Lan\LanDaoInterface', 'App\Dao\Admin\Lan\LanDao');

    // Business logic registration
    $this->app->bind('App\Contracts\Services\Admin\Lan\LanServiceInterface', 'App\Services\Admin\Lan\LanService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
