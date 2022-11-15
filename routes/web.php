<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CodeLanguageController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseVideoController;
use App\Http\Controllers\Admin\EnrollController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\CourseDetailsController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserBlogController;
use App\Http\Controllers\User\UserCourseController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register/save', [AuthController::class, 'registerSave'])->name('auth.register.save');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.post');
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('reset.get');
Route::post('/reset-password', [AuthController::class, 'sendResetMail'])->name('reset.send');
Route::get('/change-password/{token}/{mail}', [AuthController::class, 'showChangePasswordForm'])->name('change.password.get');
Route::post('/change-password', [AuthController::class, 'submitChangePasswordForm'])->name('change.password.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'prevent-history']], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    //User
    Route::get('/users', [UserController::class, 'index'])->name('user.get');
    Route::delete('/users/{id}', [UserController::class, 'blockUser'])->name('user.block');

    //Profile
    Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('admin.profile.get');
    Route::post('/profile-change/{id}', [ProfileController::class, 'changeProfile'])->name('admin.profile.change');
    Route::get('/password-change', [ProfileController::class, 'showPasswordForm'])->name('admin.password.get');
    Route::post('/password-change/{id}', [ProfileController::class, 'changeAdminPassword'])->name('admin.password.change');

    //Role
    Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role/create', [RoleController::class, 'saveRole'])->name('admin.role.save');
    Route::get('/role/edit/{id}', [RoleController::class, 'editRole'])->name('admin.role.edit');
    Route::post('/role/edit/{id}', [RoleController::class, 'updateRole'])->name('admin.role.update');
    Route::delete('/role/{id}', [RoleController::class, 'deleteRole'])->name('admin.role.delete');

    //languages
    Route::get('/languages', [CodeLanguageController::class, 'index'])->name('admin.language.list');
    Route::get('/languages/create', [CodeLanguageController::class, 'showCreateForm'])->name('admin.language.create');
    Route::post('/languages/create', [CodeLanguageController::class, 'create'])->name('admin.language.store');
    Route::get('/languages/update/{slug}', [CodeLanguageController::class, 'showUpdateForm'])->name('admin.language.edit');
    Route::post('/languages/update/{slug}', [CodeLanguageController::class, 'update'])->name('admin.language.update');
    Route::delete('/languages/delete/{slug}', [CodeLanguageController::class, 'delete'])->name('admin.language.delete');

    //Course
    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/course/edit/{slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/course/edit/{slug}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/course/{slug}', [CourseController::class, 'delete'])->name('admin.course.delete');
    Route::get('/course/search', [CourseController::class, 'search'])->name('admin.course.search');

    //CourseVideo
    Route::get('/course/{slug}/course-video', [CourseVideoController::class, 'index'])->name('admin.courseVideo.index');
    Route::get('/course/{slug}/course-video/create', [CourseVideoController::class, 'create'])->name('admin.courseVideo.create');
    Route::post('/course/{slug}/course-video/create', [CourseVideoController::class, 'store'])->name('admin.courseVideo.store');
    Route::get('/course/{slug}/course-video/edit/{course_video}', [CourseVideoController::class, 'edit'])->name('admin.courseVideo.edit');
    Route::put('/course/{slug}/course-video/edit/{course_video}', [CourseVideoController::class, 'update'])->name('admin.courseVideo.update');
    Route::delete('/course/{slug}/course-video/{course_video}', [CourseVideoController::class, 'delete'])->name('admin.courseVideo.delete');

    //Blog
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog/create', [BlogController::class, 'blogSave'])->name('admin.blog.save');
    Route::get('/blog/{slug}', [BlogController::class, 'blogEdit'])->name('admin.blog.edit');
    Route::post('/blog/edit/{slug}', [BlogController::class, 'blogUpdate'])->name('admin.blog.update');
    Route::delete('/blog/{slug}', [BlogController::class, 'blogDelete'])->name('admin.blog.delete');

    // Enroll
    Route::get('/enroll', [EnrollController::class, 'index'])->name('admin.enroll.index');
    Route::get('/enroll/{id}', [EnrollController::class, 'accepted'])->name('admin.enroll.accepted');
    Route::delete('/enroll/{id}/delete', [EnrollController::class, 'delete'])->name('admin.enroll.delete');

    Route::get('/import', [EnrollController::class, 'import'])->name('admin.enroll.import');
    Route::post('/import', [EnrollController::class, 'importPayment'])->name("admin.enroll.get");

    //Coupon
    Route::get('/coupon', [CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('/coupon/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::post('/coupon/create', [CouponController::class, 'store'])->name('admin.coupon.store');
    Route::get('/coupon/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
    Route::put('/coupon/edit/{id}', [CouponController::class, 'update'])->name('admin.coupon.update');
    Route::delete('/coupon/{id}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
});

Route::group(['middleware' => ['prevent-history']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user.home');

    Route::get('/blog', [UserBlogController::class, 'indexBlog'])->name('user.blog');
    Route::get('/blog/{slug}', [UserBlogController::class, 'blogDetail'])->name('user.blog.detail');
    Route::get('/courses', [UserCourseController::class, 'index'])->name('user.course');
    Route::get('/courses/{slug}', [CourseDetailsController::class, 'courseDetailsIndex'])->name('user.courseDetails');
    Route::get('/courses/{slug}/course-video/{course_video}', [CourseDetailsController::class, 'courseVideo'])->name('user.courseVideo');
    Route::get('/courses/{slug}/enroll', [CourseDetailsController::class, 'enroll'])->name('user.enroll');
    Route::post('/courses/{slug}/enroll', [CourseDetailsController::class, 'storeEnroll'])->name('user.store.enroll');
});

Route::get('/excel', [EnrollController::class, 'exportPayment'])->name("admin.enroll.export");

// User
Route::group(['prefix' => 'user-dashboard', 'middleware' => ['user', 'prevent-history']], function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/edit/{id}', [UserDashboardController::class, 'submitUserProfile'])->name('user.profile.post');
    Route::post('/password-change/{id}', [UserDashboardController::class, 'changeUserPassword'])->name('user.password.change');
    Route::post('/my-courses', [UserDashboardController::class, 'getUserCourse'])->name('user.course.get');
});
