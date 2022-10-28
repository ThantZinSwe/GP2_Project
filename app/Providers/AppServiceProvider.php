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
        $this->app->bind('App\Contracts\Dao\Admin\Role\RoleDaoInterface','App\Dao\Admin\Role\RoleDao');
        $this->app->bind('App\Contracts\Dao\Admin\Course\CourseDaoInterface', 'App\Dao\Admin\Course\CourseDao');
        $this->app->bind('App\Contracts\Dao\Admin\Blog\BlogDaoInterface', 'App\Dao\Admin\Blog\BlogDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Admin\Profile\ProfileServiceInterface', 'App\Services\Admin\Profile\ProfileService');
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
        $this->app->bind('App\Contracts\Services\Admin\Role\RoleServiceInterface','App\Services\Admin\Role\RoleService');
        $this->app->bind('App\Contracts\Services\Admin\Course\CourseServiceInterface', 'App\Services\Admin\Course\CourseService');
        $this->app->bind('App\Contracts\Services\Admin\Blog\BlogServiceInterface', 'App\Services\Admin\Blog\BlogService');
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
