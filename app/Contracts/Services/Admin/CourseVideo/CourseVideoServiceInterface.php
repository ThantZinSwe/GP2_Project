<?php

namespace App\Contracts\Services\Admin\CourseVideo;

interface CourseVideoServiceInterface
{
    /**
     * To show courseVideo
     * @param $slug to get course
     */
    public function index($slug);

    /**
     * @param $slug to get course
     * @return Object $courseVideo
     */
    public function create($slug);

    /**
     * To store courseVideo
     * @param $slug to get course
     * @param CourseRequest $request request with inputs
     */
    public function store($slug, $request);

    /**
     * To edit courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function edit($slug, $courseVideo);

    /**
     * To update courseVideo
     * @param CourseVideoRequest $request request with inputs
     * @param $slug
     * @param $courseVideo
     */
    public function update($slug, $courseVideo, $request);

    /**
     * To delete courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function delete($slug, $courseVideo);
}
