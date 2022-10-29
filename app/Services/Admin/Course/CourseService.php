<?php

namespace App\Services\Admin\Course;

use App\Contracts\Dao\Admin\Course\CourseDaoInterface;
use App\Contracts\Services\Admin\Course\CourseServiceInterface;

class CourseService implements CourseServiceInterface
{
    /**
     * adminCourseDao
     */
    private $courseDao;

    public function __construct(CourseDaoInterface $courseDaoInterface)
    {
        $this->courseDao = $courseDaoInterface;
    }

    /**
     * To get all languages
     * @return Object $courses to get course
     */
    public function index()
    {
        return $this->courseDao->index();
    }

    /**
     * To get all languages
     * @return Object $languages
     */
    public function create()
    {
        return $this->courseDao->create();
    }

    /**
     * To store course
     * @param CourseRequest $request request with inputs
     */
    public function store($request)
    {
        return $this->courseDao->store($request);
    }

    /**
     * To edit course
     * @param $slug
     * @return Course $course
     * @return language $languages
     */
    public function edit($slug)
    {
        return $this->courseDao->edit($slug);
    }

    /**
     * To update course
     * @param CourseUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $slug)
    {
        return $this->courseDao->update($request, $slug);
    }

    /**
     * To delete course
     * @param $slug
     */
    public function delete($slug)
    {
        return $this->courseDao->delete($slug);
    }

    /**
     * To search course
     * @param $request
     * @return Object $courses
     */
    public function search($request)
    {
        return $this->courseDao->search($request);
    }
}
