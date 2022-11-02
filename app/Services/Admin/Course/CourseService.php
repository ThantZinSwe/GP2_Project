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
    /******   User ********/
    /**
     * To get all courses With languages
     * @return Object $courses to get course
     */
    public function getCourseWithLanguage()
    {
        return $this->courseDao->getCourseWithLanguage();
    }
    /**
     * To search course by API
     * @param $request
     * @return Object $courses
     */
    public function searchByApi($request)
    {
        return $this->courseDao->searchByApi($request);
    }


    /**
     * To show course & courseVideo
     * @param $slug
     * @return Object $data
     */
    public function courseDetailsIndex($slug)
    {
        return $this->courseDao->courseDetailsIndex($slug);
    }

    /**
     * To show course & courseVideo
     * @param $slug
     * @param $courseVideo
     * @return Object $data
     */
    public function courseVideo($slug, $courseVideo)
    {
        return $this->courseDao->courseVideo($slug, $courseVideo);
    }

    /**
     * @param $slug
     * @return Object $course
     */
    public function enroll($slug)
    {
        return $this->courseDao->enroll($slug);
    }

    /**
     * To store enroll course & user
     * @param $slug
     */
    public function enrollStore($request, $slug)
    {
        return $this->courseDao->enrollStore($request, $slug);
    }
    /**
     * Get User Courses
     *
     * @param String User Id $id
     * @return Object Course object $courses;
     */
    public function getUserCourse($id){
        return $this->courseDao->getUserCourse($id);
    }
}
