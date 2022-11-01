<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
      /**
     * Create new controller instance
     * @return void
     */
    public function __construct(CourseServiceInterface $courseServiceInterface)
    {
        $this->courseInterface = $courseServiceInterface;
    }
    /**
     * @return View user/home
     */
    public function index()
    {
        $courses = $this->courseInterface->index();
        return view('user.home',$courses);
    }
}
