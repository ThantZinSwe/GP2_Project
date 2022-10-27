<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * @return View Admin/course/index
     */
    public function index()
    {
        return view('admin.course.index');
    }

    /**
     * @return View Admin/course/create
     */
    public function create()
    {
        return view('admin.course.create');
    }
}
