<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/course/edit/{slug}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/course/edit/{slug}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/course/{slug}', [CourseController::class, 'delete'])->name('admin.course.delete');
});
