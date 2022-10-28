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
        $this->app->bind('App\Contracts\Dao\Admin\Role\RoleDaoInterface',  
        'App\Dao\Admin\Role\RoleDao');
        $this->app->bind('App\Contracts\Services\Admin\Role\RoleServiceInterface', 
        'App\Services\Admin\Role\RoleService');
        $this->app->bind('App\Contracts\Dao\Auth\AuthDaoInterface',  
        'App\Dao\Auth\AuthDao');
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 
        'App\Services\Auth\AuthService');
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
