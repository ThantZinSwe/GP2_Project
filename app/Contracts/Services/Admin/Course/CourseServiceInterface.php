<?php

namespace App\Contracts\Services\Admin\Course;

interface CourseServiceInterface
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
    public function edit($slug);

    /**
     * To update course
     * @param CourseUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $slug);

    /**
     * To delete course
     * @param $slug
     */
    public function delete($slug);

    /**
     * To search course
     * @param $request
     * @return Object $courses
     */
    public function search($request);
}
