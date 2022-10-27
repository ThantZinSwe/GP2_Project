<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
});
