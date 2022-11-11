<?php

namespace App\Dao\Admin\Coupon;

use App\Contracts\Dao\Admin\Coupon\CouponDaoInterface;

use App\Models\Coupon;


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
     * To get all languages
     * @return Object $languages
     */
    public function create()
    {

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
     * @return language $languages
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return $coupon;
    }

    /**
     * To update Coupon
     * @param CouponUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $id)
    {
       $coupon = Coupon::find($id);
       if($coupon){
            $coupon->code = $request->couponCode;
            $coupon->discount = $request->discount;
            $coupon->update();
            return true;
       }
       return false;
    }

    /**
     * To delete Coupon
     * @param $slug
     */
    public function delete($id)
    {
       $coupon = Coupon::find($id);
       if($coupon){
            $coupon->delete();
            return true;
       }
       return false;
    }

}
