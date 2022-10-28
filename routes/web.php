<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

//Auth
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register/save', [AuthController::class, 'registerSave'])->name('auth.register.save');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.post');

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    //Profile
    Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('admin.profile.get');
    Route::post('/profile/{id}', [ProfileController::class, 'submitProfileForm'])->name('admin.profile.post');
    Route::get('/password-change', [ProfileController::class, 'showPasswordForm'])->name('admin.password.get');
    Route::post('/password-change/{id}', [ProfileController::class, 'changeAdminPassword'])->name('admin.password.post');
    
    //Role
    Route::get('/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role/create', [RoleController::class, 'saveRole'])->name('admin.role.save');
    Route::get('/role/edit/{id}', [RoleController::class, 'editRole'])->name('admin.role.edit');
    Route::post('/role/edit/{id}', [RoleController::class, 'updateRole'])->name('admin.role.update');
    Route::delete('/role/{id}', [RoleController::class, 'deleteRole'])->name('admin.role.delete');

    //Course
    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/course/edit/{slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/course/edit/{slug}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/course/{slug}', [CourseController::class, 'delete'])->name('admin.course.delete');
});
