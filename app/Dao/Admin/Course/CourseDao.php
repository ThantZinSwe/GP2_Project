<?php

namespace App\Dao\Admin\Course;

use App\Contracts\Dao\Admin\Course\CourseDaoInterface;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\Language;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseDao implements CourseDaoInterface
{

    /**
     * To get all languages
     * @return Object $courses to get course
     */
    public function index()
    {
        $courses = Course::with('languages', 'courseVideos')
            ->orderBy('id', 'desc')
            ->get();
        $languages = Language::get();
        return compact('courses', 'languages');
    }

    /**
     * To get all languages
     * @return Object $languages
     */
    public function create()
    {
        $languages = Language::get();
        return $languages;
    }

    /**
     * To store course
     * @param CourseRequest $request request with inputs
     */
    public function store($request)
    {
        $type = $request->type;
        $price = $request->price;

        $course = new Course();
        $course->name = $request->name;
        $course->slug = Str::slug($request->name);

        if (isset($type)) {
            $course->type = $type;
        }

        if (isset($price)) {
            $course->price = $price;
        }

        $course->description = $request->description;

        $file = $request->file('image');
        $fileName = uniqid() . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/images/course/', $fileName);
        $course->image = $fileName;

        $course->save();

        foreach ($request->language as $language) {
            $course->languages()->attach($language);
        }

        return $course;
    }

    /**
     * To edit course
     * @param $slug
     * @return Course $course
     * @return language $languages
     */
    public function edit($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $languages = Language::get();

        return compact('course', 'languages');
    }

    /**
     * To update course
     * @param CourseUpdateRequest $request request with inputs
     * @param $slug
     */
    public function update($request, $slug)
    {
        $course = Course::where('slug', $slug)->first();
        $image = $request->file('image');

        if (isset($image)) {

            $oldFileName = $course->image;

            if (File::exists(public_path() . '/images/course/' . $oldFileName)) {

                File::delete(public_path() . '/images/course/' . $oldFileName);
            }

            $fileName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move(public_path() . '/images/course/', $fileName);
            $course->image = $fileName;
        }

        $course->name = $request->name;
        $course->slug = Str::slug($request->name);
        $course->price = $request->price;
        $course->type = $request->type;
        $course->description = $request->description;

        $course->save();

        $course->languages()->sync($request->language);

        return $course;
    }

    /**
     * To delete course
     * @param $slug
     */
    public function delete($slug)
    {
        $course = Course::where('slug', $slug)->first();
        CourseVideo::where('course_id', $course->id)->delete();

        $course->languages()->detach();

        $image = $course->image;

        if (File::exists(public_path() . '/images/course/' . $image)) {

            File::delete(public_path() . '/images/course/' . $image);
        }

        $course->delete();
        return 'success';
    }

    /**
     * To search course
     * @param $request
     * @return Object $courses
     */
    public function search($request)
    {
        $course = $request->course;
        $language = $request->language;
        $languages = Language::get();
        $courses = Course::with('languages', 'courseVideos');

        if (isset($course)) {
            $courses->where(function ($q) use ($course) {
                $q->orWhere('name', 'like', '%' . $course . '%')
                    ->orWhere('price', 'like', '%' . $course . '%')
                    ->orWhere('type', 'like', '%' . $course . '%');
            });
        }

        if (isset($language)) {

            $courses->whereHas('languages', function ($q) use ($language) {
                $q->where('course_languages.language_id', $language);
            });
        }

        $courses = $courses->orderBy('id', 'desc')->get();
        return compact('courses', 'languages');
    }

//User

    /**
     * To search course
     * @param $request
     * @return Object $courses
     */
    public function searchByApi($request)
    {
        $course = $request->search;
        $tag = $request->tag;
        $type = $request->type;
        $courses = Course::with('languages', 'courseVideos');
        if ($tag == 'all') {
            return $courses->paginate(6);
        }

        if ($type == 'all' && $tag) {
            $courses->whereHas('languages', function ($q) use ($tag) {
                $q->where('course_languages.language_id', $tag);
            });
        }

        if (($type == 'paid' && $tag) || ($type == 'free' && $tag)) {
            $courses->where(function ($q) use ($type) {
                $q->where('type', 'like', '%' . $type . '%');
            })->whereHas('languages', function ($q) use ($tag) {
                $q->where('course_languages.language_id', $tag);
            });
        }

        if ($type == 'all' && $course) {
            $courses->where(function ($q) use ($course) {
                $q->orWhere('courses.name', 'like', '%' . $course . '%')
                    ->orWhere('courses.price', 'like', '%' . $course . '%');
            });

        }

        if (($type == 'paid' && $course) || ($type == 'free' && $course)) {
            $courses->where(function ($q) use ($type) {
                $q->where('type', 'like', '%' . $type . '%');
            })->where(function ($q) use ($course) {
                $q->orWhere('courses.name', 'like', '%' . $course . '%')
                    ->orWhere('courses.price', 'like', '%' . $course . '%');
            });
        }

        if ($type == 'all' && !$course && !$tag) {
            $courses;
        }

        if (($type == 'paid' && !$course && !$tag) || ($type == 'free' && !$course && !$tag)) {
            $courses->orWhere('courses.type', 'like', '%' . $type . '%');
        }

        $courses = $courses->paginate(6);
        $courses->appends($request->all());
        return $courses;
    }

    /**
     * To get all courses With languages
     * @return Object $courses to get course
     */
    public function getCourseWithLanguage()
    {
        return Course::with('languages')->paginate(6);
    }

    /**
     * Get User Courses
     *
     * @param String User Id $id
     * @return Object Course object $courses;
     */
    public function getUserCourse($id)
    {
        $courses = Course::with('languages');

        $courses->whereHas('users', function ($q) use ($id) {
            $q->where('payments.user_id', $id);
        });
        $courses = $courses->paginate(6);
        return $courses;

    }

    /**
     * To show course & courseVideo
     * @param $slug
     * @return Object $data
     */
    public function courseDetailsIndex($slug)
    {
        $course = Course::with('courseVideos')->where('slug', $slug)->first();
        $latestCourses = Course::with('languages')->orderBy('id', 'desc')->limit(3)->get();
        $enroll = "";
        $comments = Comment::where('course_id', $course->id)->orderBy('id', 'desc')->get();
        if (Auth::check()) {
            if (Payment::count() > 0) {
                $enroll = Payment::where('user_id', auth()->user()->id)
                    ->where('course_id', $course->id)
                    ->where('status', 'accepted')
                    ->first();
            }

        }

        if (!$course) {
            abort('404');
        }

        return compact('course', 'latestCourses', 'enroll', 'comments');
    }

    /**
     * To show course & courseVideo
     * @param $slug
     * @param $courseVideo
     * @return Object $data
     */
    public function courseVideo($slug, $courseVideo)
    {
        $course = Course::with('courseVideos')->where('slug', $slug)->first();
        $courseVideo = CourseVideo::where('slug', $courseVideo)->where('course_id', $course->id)->first();
        $latestCourses = Course::with('languages')->orderBy('id', 'desc')->limit(3)->get();
        $comments = Comment::where('course_id', $course->id)->orderBy('id', 'desc')->get();

        if ($course->type == "free") {
            return compact('course', 'courseVideo', 'latestCourses', 'comments');
        }

        if (Auth::check() && $course->type == "paid") {
            if (Payment::count() > 0) {
                $enroll = Payment::where('user_id', auth()->user()->id)
                    ->where('course_id', $course->id)
                    ->where('status', 'accepted')
                    ->first();
            }

            if (isset($enroll)) {
                return compact('course', 'courseVideo', 'latestCourses', 'enroll', 'comments');
            } else {
                return ['enrollError' => 'You need to enroll first this course'];
            }

        } else {
            return ['authError' => 'Please Login first!'];
        }

    }

    /**
     * @param $slug
     * @return Object $course
     */
    public function enroll($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if (Payment::count() > 0) {
            if (Auth::check()) {
                $enroll = Payment::where('course_id', $course->id)
                    ->where('user_id', auth()->user()->id)
                    ->first();
            } else {
                return ['enrollError' => 'Please Login First!'];
            }

        }

        if (isset($enroll)) {
            return ['enrollError' => 'You already enroll.Please wait confirm from admin team'];
        }

        return $course;
    }

    /**
     * To store enroll course & user
     * @param $slug
     */
    public function enrollStore($request, $slug)
    {
        $course = Course::where('slug', $slug)->first();

        if (Auth::check()) {
            $enroll = new Payment();
            $enroll->course_id = $course->id;
            $enroll->user_id = auth()->user()->id;
            $enroll->phone = $request->phone;

            if (Session::has('coupon')) {
                $enroll->total_price = Session::get("coupon")['totalPrice'];
                UserCoupon::where('user_id', auth()->user()->id)
                    ->where('coupon_id', Session::get('coupon')['coupon_id'])
                    ->update([
                        'status' => 'inactive',
                    ]);

                Session::forget('coupon');

            } else {
                $enroll->total_price = $course->price;
            }

            $file = $request->file('image');
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/images/enroll/', $fileName);
            $enroll->image = $fileName;

            $enroll->status = "pending";

            $enroll->save();

            return true;
        } else {
            return ['authError' => 'Please Login first!'];
        }

    }

    /**
     * to store user review
     * @param $slug
     * @return Api json
     */
    public function reviewApi($request, $slug)
    {
        $course = Course::where('slug', $slug)->first();
        $review = new Comment();
        $review->user_id = $request->user_id;
        $review->course_id = $course->id;
        $review->review = $request->comment;
        $review->save();

        $user = User::findOrFail($request->user_id);

        return response()->json([
            'review' => $review,
            'user'   => $user,
        ]);
    }

}
