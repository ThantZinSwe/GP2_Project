<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\User\CourseDetailsController;
use App\Http\Controllers\User\UserCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/courses/search', [UserCourseController::class, 'searchByApi'])->name('user.course.search');
Route::post('/courses/{slug}/review', [CourseDetailsController::class, 'reviewApi']);
Route::post('/coupon', [CouponController::class, 'calculateCoupon']);
