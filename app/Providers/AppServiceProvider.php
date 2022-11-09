<?php

namespace App\Providers;

use App\Models\Payment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        $this->app->bind('App\Contracts\Dao\Admin\Role\RoleDaoInterface', 'App\Dao\Admin\Role\RoleDao');
        $this->app->bind('App\Contracts\Dao\Admin\Course\CourseDaoInterface', 'App\Dao\Admin\Course\CourseDao');
        $this->app->bind('App\Contracts\Dao\Admin\CourseVideo\CourseVideoDaoInterface', 'App\Dao\Admin\CourseVideo\CourseVideoDao');
        $this->app->bind('App\Contracts\Dao\Admin\Blog\BlogDaoInterface', 'App\Dao\Admin\Blog\BlogDao');
        $this->app->bind('App\Contracts\Dao\Admin\Lan\LanDaoInterface', 'App\Dao\Admin\Lan\LanDao');
        $this->app->bind('App\Contracts\Dao\Admin\User\UserDaoInterface', 'App\Dao\Admin\User\UserDao');
        $this->app->bind('App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface', 'App\Dao\Admin\Enroll\EnrollDao');
        $this->app->bind('App\Contracts\Dao\Admin\Home\HomeDaoInterface', 'App\Dao\Admin\Home\HomeDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Admin\Profile\ProfileServiceInterface', 'App\Services\Admin\Profile\ProfileService');
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
        $this->app->bind('App\Contracts\Services\Admin\Role\RoleServiceInterface', 'App\Services\Admin\Role\RoleService');
        $this->app->bind('App\Contracts\Services\Admin\Course\CourseServiceInterface', 'App\Services\Admin\Course\CourseService');
        $this->app->bind('App\Contracts\Services\Admin\CourseVideo\CourseVideoServiceInterface', 'App\Services\Admin\CourseVideo\CourseVideoService');
        $this->app->bind('App\Contracts\Services\Admin\Blog\BlogServiceInterface', 'App\Services\Admin\Blog\BlogService');
        $this->app->bind('App\Contracts\Services\Admin\Lan\LanServiceInterface', 'App\Services\Admin\Lan\LanService');
        $this->app->bind('App\Contracts\Services\Admin\User\UserServiceInterface', 'App\Services\Admin\User\UserService');
        $this->app->bind('App\Contracts\Services\Admin\Enroll\EnrollServiceInterface', 'App\Services\Admin\Enroll\EnrollService');
        $this->app->bind('App\Contracts\Services\Admin\Home\HomeServiceInterface', 'App\Services\Admin\Home\HomeService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $status = Payment::count();

        if ($status > 0) {
            View::share('pendingEnrollCount', Payment::where('status', 'pending')->count());
            View::share('latestEnrollTime', Payment::where('status', 'pending')->orderBy('id', 'desc')->first());
        }

    }

}
