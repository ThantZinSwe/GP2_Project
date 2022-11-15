<?php

namespace App\Contracts\Services\Admin\Coupon;

interface CouponServiceInterface
{

    /**
     * To get all languages
     * @return Object $courses to get course
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
