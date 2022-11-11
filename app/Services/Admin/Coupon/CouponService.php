<?php

namespace App\Services\Admin\Coupon;

use App\Contracts\Dao\Admin\Coupon\CouponDaoInterface;
use App\Contracts\Services\Admin\Coupon\CouponServiceInterface;

class CouponService implements CouponServiceInterface
{
    /**
     * adminCourseDao
     */
    private $couponDao;

    public function __construct(CouponDaoInterface $couponDaoInterface)
    {
        $this->couponDao = $couponDaoInterface;
    }

    /**
     * To get all languages
     * @return Object $Coupons to get Coupon
     */
    public function index()
    {
        return $this->couponDao->index();
    }

    /**
     * To get all languages
     * @return Object $languages
     */
    public function create()
    {
        return $this->couponDao->create();
    }

    /**
     * To store Coupon
     * @param CouponRequest $request request with inputs
     */
    public function store($request)
    {
        return $this->couponDao->store($request);
    }

    /**
     * To edit Coupon
     * @param $slug
     * @return Coupon $Coupon
     * @return language $languages
     */
    public function edit($id)
    {
        return $this->couponDao->edit($id);
    }

    /**
     * To update Coupon
     * @param CouponUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $id)
    {
        return $this->couponDao->update($request, $id);
    }

    /**
     * To delete Coupon
     * @param $slug
     */
    public function delete($id)
    {
        return $this->couponDao->delete($id);
    }

  
}
