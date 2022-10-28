<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'submitLoginForm'])->name('login.post');
// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');

    //Profile
    Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('admin.profile.get');
    Route::post('/profile/{id}', [ProfileController::class, 'submitProfileForm'])->name('admin.profile.post');
    Route::get('/password-change', [ProfileController::class, 'showPasswordForm'])->name('admin.password.get');
    Route::post('/password-change/{id}', [ProfileController::class, 'changeAdminPassword'])->name('admin.password.post');
});
