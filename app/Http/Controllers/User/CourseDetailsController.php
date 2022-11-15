<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\UserEnrollRequest;


class CourseDetailsController extends Controller
{

    /**
     * courseDetailsInterface
     */
    private $courseDetailsInterface;

    public function __construct(CourseServiceInterface $courseServiceInterface)
    {
        $this->courseDetailsInterface = $courseServiceInterface;
    }

    /**
     * Show Course Detail
     * @param $slug
     * @return Object $data
     * @return View user/course-details
     */
    public function courseDetailsIndex($slug)
    {
        $data = $this->courseDetailsInterface->courseDetailsIndex($slug);

        return view('user.course-details', $data);
    }

    /**
     * Show Course Video
     * 
     * @param $slug, $courseVideo
     * @return View user/course-video
     */
    public function courseVideo($slug, $courseVideo)
    {
        $data = $this->courseDetailsInterface->courseVideo($slug, $courseVideo);

        if (isset($data['authError'])) {
            return back()->with(['error' => $data['authError']]);
        }

        if (isset($data['enrollError'])) {
            return back()->with(['error' => $data['enrollError']]);
        }

        return view('user.course-video', $data);
    }

    /**
     * Show Enroll Form
     * @param $slug
     * @return View user/enroll
     */
    public function enroll($slug)
    {
        $course = $this->courseDetailsInterface->enroll($slug);

        if (isset($course['enrollError'])) {
            return back()->with(['error' => $course['enrollError']]);
        }

        return view('user.enroll', compact('course'));
    }

    /**
     * To store payment
     * @param UserEnrollRequest $request request with inputs, $slug
     * @return view Course Detail
     */
    public function storeEnroll(UserEnrollRequest $request, $slug)
    {
        $enroll = $this->courseDetailsInterface->enrollStore($request, $slug);

        if ($enroll) {
            return redirect()->route('user.courseDetails', $slug)->with(['success' => 'Thank you ! Please wait to confirm admin team']);
        }

        return redirect()->back()->with(['error' => $enroll['authError']]);
    }

    /**
     * to store user review
     * @param $slug, $request
     * @return Api json
     */
    public function reviewApi(ReviewRequest $request, $slug)
    {
        return $this->courseDetailsInterface->reviewApi($request, $slug);
    }
}
