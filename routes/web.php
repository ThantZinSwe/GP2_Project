<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CodeLanguageController;
use Illuminate\Support\Facades\Route;

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    
});
//languages
Route::group(['prefix' => 'admin'], function () {
Route::get('/languages',[CodeLanguageController::class,'index'])->name('admin.language.list');
Route::get('/languages/create',[CodeLanguageController::class,'showCreateForm'])->name('admin.language.create');
Route::post('/languages/create',[CodeLanguageController::class,'create'])->name('admin.language.create');
Route::get('/languages/update/{slug}',[CodeLanguageController::class,'showUpdateForm'])->name('admin.language.edit');
Route::post('/languages/update/{slug}',[CodeLanguageController::class,'update'])->name('admin.language.edit');
Route::delete('/languages/delete/{slug}',[CodeLanguageController::class,'delete'])->name('admin.language.delete');
});