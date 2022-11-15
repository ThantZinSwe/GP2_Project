<?php

namespace App\Contracts\Dao\Admin\Coupon;

interface CouponDaoInterface
{
    /**
     * To get all coupons
     * @return Object $coupon to get coupon
     */
    public function index();

    /**
     * To store Coupon
     * @param CouponRequest $request request with inputs
     */
    public function store($request);

    /**
     * To edit Coupon
     * @param $slug
     * @return Coupon $Coupon
     */
    public function edit($id);

    /**
     * To update Coupon
     * @param CouponUpdateRequest $request request with inputs
     * @param $id
     */
    public function update($request, $id);

    /**
     * To delete Coupon
     * @param $id
     */
    public function delete($id);

    /**
     * To calculate coupon
     * @param Request api request
     */
    public function calculateCoupon($request);

}
