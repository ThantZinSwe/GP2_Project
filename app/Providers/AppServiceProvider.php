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
    $this->app->bind('App\Contracts\Dao\Admin\Profile\ProfileDaoInterface', 'App\Dao\Admin\Profile\ProfileDao');
    $this->app->bind('App\Contracts\Dao\Auth\AuthDaoInterface', 'App\Dao\Auth\AuthDao');

    // Business logic registration
    $this->app->bind('App\Contracts\Services\Admin\Profile\ProfileServiceInterface', 'App\Services\Admin\Profile\ProfileService');
    $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
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
