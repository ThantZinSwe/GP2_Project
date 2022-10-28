<?php

namespace App\Services\Admin\CourseVideo;

use App\Contracts\Dao\Admin\CourseVideo\CourseVideoDaoInterface;
use App\Contracts\Services\Admin\CourseVideo\CourseVideoServiceInterface;

class CourseVideoService implements CourseVideoServiceInterface
{
    /**
     * $courseVideoDao
     */
    private $courseVideoDao;

    /**
     * Create new Dao instance
     * @return void
     */
    public function __construct(CourseVideoDaoInterface $courseVideoDaoInterface)
    {
        $this->courseVideoDao = $courseVideoDaoInterface;
    }

    /**
     * To show courseVideo
     * @param $slug to get course
     */
    public function index($slug)
    {
        return $this->courseVideoDao->index($slug);
    }

    /**
     * @param $slug to get course
     * @return Object $courseVideo
     */
    public function create($slug)
    {
        return $this->courseVideoDao->create($slug);
    }

    /**
     * To store courseVideo
     * @param $slug to get course
     * @param CourseRequest $request request with inputs
     */
    public function store($slug, $request)
    {
        return $this->courseVideoDao->store($slug, $request);
    }

    /**
     * To edit courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function edit($slug, $courseVideo)
    {
        return $this->courseVideoDao->edit($slug, $courseVideo);
    }

    /**
     * To update courseVideo
     * @param CourseVideoRequest $request request with inputs
     * @param $slug
     * @param $courseVideo
     */
    public function update($slug, $courseVideo, $request)
    {
        return $this->courseVideoDao->update($slug, $courseVideo, $request);
    }

    /**
     * To delete courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function delete($slug, $courseVideo)
    {
        return $this->courseVideoDao->delete($slug, $courseVideo);
    }
}
