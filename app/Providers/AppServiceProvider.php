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
        //Dao Registration
        $this->app->bind('App\Contracts\Dao\Admin\Course\CourseDaoInterface', 'App\Dao\Admin\Course\CourseDao');

        //Services Registration
        $this->app->bind('App\Contracts\Services\Admin\Course\CourseServiceInterface', 'App\Services\Admin\Course\CourseService');
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
