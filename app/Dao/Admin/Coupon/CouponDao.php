<?php

namespace App\Dao\Admin\Coupon;

use App\Contracts\Dao\Admin\Coupon\CouponDaoInterface;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\UserCoupon;

class CouponDao implements CouponDaoInterface
{

    /**
     * To get all Coupons
     * @return Object $Coupons to get Coupon
     */
    public function index()
    {
        return Coupon::orderBy('id', 'desc')->get();
    }

    /**
     * To store Coupon
     * @param CouponRequest $request request with inputs
     */
    public function store($request)
    {
        $coupon = new Coupon();
        $coupon->code = $request->couponCode;
        $coupon->discount = $request->discount;
        $coupon->save();
        return $coupon;
    }

    /**
     * To edit Coupon
     * @param $slug
     * @return Coupon $Coupon
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return $coupon;
    }

    /**
     * To update Coupon
     * @param CouponUpdateRequest $request request with inputs
     * @param $id
     */
    public function update($request, $id)
    {
        $coupon = Coupon::find($id);

        if ($coupon) {
            $coupon->code = $request->couponCode;
            $coupon->discount = $request->discount;
            $coupon->update();
            return true;
        }

        return false;
    }

    /**
     * To delete Coupon
     * @param $id
     */
    public function delete($id)
    {
        $coupon = Coupon::find($id);

        if ($coupon) {
            $coupon->delete();
            return true;
        }

        return false;
    }

    /**
     * To calculate coupon
     * @param Request api request
     */
    public function calculateCoupon($request)
    {
        $coupon_id = Coupon::where('code', $request->code)->first();
        $course = Course::where('slug', $request->course_name)->first();
        $today = date('Y-m-d');

        if (isset($coupon_id)) {
            $coupon_user = UserCoupon::where('user_id', $request->user_id)
                ->where('coupon_id', $coupon_id->id)
                ->where('status', 'active')
                ->whereDate('expired_time', '>', $today)
                ->first();

            if (isset($coupon_user)) {
                $total_price = $course->price - ($coupon_user->coupon->discount / 100 * $course->price);
                return ['total_price' => $total_price, 'coupon_id' => $coupon_user->coupon_id];
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

}
