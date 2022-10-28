<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('admin.dashboard');

    Route::get('/course', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');

    Route::get('/role',[RoleController::class,'index'])->name('admin.role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role/create',[RoleController::class,'saveRole'])->name('admin.role.save');
   Route::get('/role/edit/{id}',[RoleController::class,'editRole'])->name('admin.role.edit');
   Route::post('/role/edit/{id}',[RoleController::class,'updateRole'])->name('admin.role.update');
   Route::delete('/role/{id}',[RoleController::class,'deleteRole'])->name('admin.role.delete');

    Route::get('/register',[AuthController::class,'register'])->name('auth.register');
    Route::post('/register/save',[AuthController::class,'registerSave'])->name('auth.register.save');
});
