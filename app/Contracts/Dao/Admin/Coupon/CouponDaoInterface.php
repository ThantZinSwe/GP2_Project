<?php

namespace App\Contracts\Dao\Admin\Coupon;

interface CouponDaoInterface
{
    /**
     * To get all languages
     * @return Object $courses to get course
     */
    public function index();

    /**
     * To get all languages
     * @return Object $languages
     */
    public function create();

    /**
     * To store course
     * @param CourseRequest $request request with inputs
     */
    public function store($request);

    /**
     * To edit course
     * @param $slug
     * @return Course $course
     * @return language $languages
     */
    public function edit($id);

    /**
     * To update course
     * @param CourseUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $id);

    /**
     * To delete course
     * @param $slug
     */
    public function delete($id);

}
