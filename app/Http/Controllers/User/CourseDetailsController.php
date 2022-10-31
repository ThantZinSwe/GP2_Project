<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CourseDetailsController extends Controller
{
    /**
     * @return View user/course-details
     */
    public function index($slug)
    {
        return view('user.course-details');
    }
}
