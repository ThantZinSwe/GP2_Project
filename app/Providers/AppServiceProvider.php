<?php

namespace App\Providers;
use App\Contracts\Dao\Admin\Language\LanguageDaoInterface;
use App\Contracts\Services\Admin\CodeLanguage\CodeLanguageServiceInterface;
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
    $this->app->bind('App\Contracts\Dao\Admin\CodeLanguage\CodeLanguageDaoInterface', 'App\Dao\Admin\CodeLanguage\CodeLanguageDao');

    // Business logic registration
    $this->app->bind('App\Contracts\Services\Admin\CodeLanguage\CodeLanguageServiceInterface', 'App\Services\Admin\CodeLanguage\CodeLanguageService');
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
