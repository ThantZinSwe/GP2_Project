<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseUpdateRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * courseInterface
     */
    private $courseInterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(CourseServiceInterface $courseServiceInterface)
    {
        $this->courseInterface = $courseServiceInterface;
    }

    /**
     * @return View Admin/course/index
     */
    public function index()
    {
        $data = $this->courseInterface->index();
        return view('admin.course.index', $data);
    }

    /**
     * @return View Admin/course/create
     */
    public function create()
    {
        $languages = $this->courseInterface->create();
        return view('admin.course.create', compact('languages'));
    }

    /**
     * To store course
     * @param CourseRequest $request request with inputs
     */
    public function store(CourseRequest $request)
    {
        $this->courseInterface->store($request);
        return redirect()->route('admin.course.index')->with(['success' => 'Course created successfully']);
    }

    /**
     * @param $slug
     * @return View course edit page
     */
    public function edit($slug)
    {
        $data = $this->courseInterface->edit($slug);
        return view('admin.course.edit', $data);
    }

    /**
     * To check course and redirect back
     * @param CourseUpdateRequest $request request form update student
     * @param $slug
     * @return View course index
     */
    public function update(CourseUpdateRequest $request, $slug)
    {
        $this->courseInterface->update($request, $slug);
        return redirect()->route('admin.course.index')->with(['success' => 'Course updated successfully']);
    }

    /**
     * To delete course
     * @param Course $slug
     * @return View course index
     */
    public function delete($slug)
    {
        $this->courseInterface->delete($slug);
        return redirect()->back()->with(['success' => 'Course deleted successfully']);
    }

    /**
     * To search course
     * @param Request $request from inputs
     * @return View admin/course/index
     */
    public function search(Request $request)
    {
        $data = $this->courseInterface->search($request);
        return view('admin.course.index', $data);
    }
}
