<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Contracts\Services\Admin\Lan\LanServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
     /**
     * UserCourse interface
     */
    private $courseInterface;
    private $lanInterface;
      /**
     * UserCourse Constructor
     */
    public function __construct(CourseServiceInterface $courseInterface, LanServiceInterface $lanServiceInterface)
    {
        $this->courseInterface = $courseInterface;
        $this->lanInterface = $lanServiceInterface;
    }
    /**
     * Show User Course List
     *
     * @return User Course View
     */
    public function index()
    {
        $languages = $this->lanInterface->getLanguageList();
        $courses = $this->courseInterface->getCourseWithLanguage();
        return view('user.course', ['languages' => $languages, 'courses' => $courses]);
    }

    /**
     * Search Course By Api 
     *
     * @param Request $request
     * @return search object
     */
    public function searchByApi(Request $request)
    {
        return $this->courseInterface->searchByApi($request);
    }
}
