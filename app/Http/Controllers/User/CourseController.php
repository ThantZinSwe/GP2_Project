<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Contracts\Services\Admin\Lan\LanServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $courseInterface;
    private $lanInterface;
    public function __construct(CourseServiceInterface $courseInterface, LanServiceInterface $lanServiceInterface)
    {
        $this->courseInterface = $courseInterface;
        $this->lanInterface = $lanServiceInterface;
    }
    public function index(){
        $languages = $this->lanInterface->getLanguageList();
        $courses = $this->courseInterface->getCourseWithLanguage();
        return view('user.course', ['languages' => $languages, 'courses' => $courses ]);
    }
    public function searchByApi(Request $request){
        return $this->courseInterface->searchByApi($request);
    }
}
