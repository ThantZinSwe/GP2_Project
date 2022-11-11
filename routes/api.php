<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\CourseDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/courses/search', [CourseController::class, 'searchByApi'])->name('user.course.search');
Route::post('/courses/{slug}/review', [CourseDetailsController::class, 'reviewApi']);
Route::post('/coupon', [CouponController::class, 'calculateCoupon'])->name('coupon.store');