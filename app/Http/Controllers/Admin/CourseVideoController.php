<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\CourseVideo\CourseVideoServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseVideoRequest;

class CourseVideoController extends Controller
{
    /**
     * $courseVideoInterface
     */
    private $courseVideoInterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(CourseVideoServiceInterface $courseVideoServiceInterface)
    {
        $this->courseVideoInterface = $courseVideoServiceInterface;
    }

    /**
     * To show courseVideo
     * @param $slug to get course
     * @return View courseVideo/index
     */
    public function index($slug)
    {
        $data = $this->courseVideoInterface->index($slug);
        return view('admin.courseVideo.index', $data);
    }

    /**
     * @param $slug to get course
     * @return View Admin/courseVideo/create
     */
    public function create($slug)
    {
        $course = $this->courseVideoInterface->create($slug);
        return view('admin.courseVideo.create', compact('course'));
    }

    /**
     * To store courseVideo
     * @param $slug to get course
     * @param CourseVideoRequest $request request with inputs
     */
    public function store($slug, CourseVideoRequest $request)
    {
        $course = $this->courseVideoInterface->store($slug, $request);
        return redirect()->route('admin.courseVideo.index', $slug)->with(['success' => $course->name . ' course video created successfully!']);
    }

    /**
     * @param $slug
     * @param $courseVideo
     * @return View courseVideo edit page
     */
    public function edit($slug, $courseVideo)
    {
        $data = $this->courseVideoInterface->edit($slug, $courseVideo);
        return view('admin.courseVideo.edit', $data);
    }

    /**
     * To check course and redirect back
     * @param CourseVideoRequest $request request form update courseVideo
     * @param $slug
     * @param $courseVideo
     * @return View courseVideo index
     */
    public function update($slug, $courseVideo, CourseVideoRequest $request)
    {
        $course = $this->courseVideoInterface->update($slug, $courseVideo, $request);
        return redirect()->route('admin.courseVideo.index', $slug)->with(['success' => $course->name . ' course video updated successfully!']);
    }

    /**
     * To delete courseVideo
     * @param $slug
     * @param $courseVideo
     * @return View courseVideo index
     */
    public function delete($slug, $courseVideo)
    {
        $course = $this->courseVideoInterface->delete($slug, $courseVideo);
        return redirect()->route('admin.courseVideo.index', $slug)->with(['success' => $course->name . ' course video deleted successfully!']);
    }
}
