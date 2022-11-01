<?php

namespace App\Dao\Admin\CourseVideo;

use App\Contracts\Dao\Admin\CourseVideo\CourseVideoDaoInterface;
use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Support\Str;

class CourseVideoDao implements CourseVideoDaoInterface
{
    /**
     * To show courseVideo
     * @param $slug to get course
     */
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $courseVideos = CourseVideo::with('course')
            ->where('course_id', $course->id)
            ->orderBy('id', 'desc')
            ->get();
        return compact('course', 'courseVideos');
    }

    /**
     * @param $slug to get course
     * @return Object $courseVideo
     */
    public function create($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return $course;
    }

    /**
     * To store courseVideo
     * @param $slug to get course
     * @param CourseRequest $request request with inputs
     */
    public function store($slug, $request)
    {
        $course = Course::where('slug', $slug)->first();

        $courseVideo = new CourseVideo();
        $courseVideo->name = $request->name;
        $courseVideo->slug = Str::slug($request->name);
        $courseVideo->url = $request->url;
        $courseVideo->course_id = $course->id;
        $courseVideo->save();

        return $course;
    }

    /**
     * To edit courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function edit($slug, $courseVideo)
    {
        $course = Course::where('slug', $slug)->first();
        $courseVideo = CourseVideo::where('slug', $courseVideo)->where('course_id', $course->id)->first();

        return compact('course', 'courseVideo');
    }

    /**
     * To update courseVideo
     * @param CourseVideoRequest $request request with inputs
     * @param $slug
     * @param $courseVideo
     */
    public function update($slug, $courseVideo, $request)
    {
        $course = Course::where('slug', $slug)->first();
        $courseVideo = CourseVideo::where('slug', $courseVideo)->where('course_id', $course->id)->first();

        $courseVideo->name = $request->name;
        $courseVideo->slug = Str::slug($request->name);
        $courseVideo->url = $request->url;
        $courseVideo->course_id = $course->id;
        $courseVideo->save();

        return $course;
    }

    /**
     * To delete courseVideo
     * @param $slug
     * @param $courseVideo
     */
    public function delete($slug, $courseVideo)
    {
        $course = Course::where('slug', $slug)->first();

        $courseVideo = CourseVideo::where('slug', $courseVideo)->where('course_id', $course->id)->first();
        $courseVideo->delete();

        return $course;
    }
}
