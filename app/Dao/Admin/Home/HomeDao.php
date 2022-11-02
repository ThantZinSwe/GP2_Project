<?php

namespace App\Dao\Admin\Home;

use App\Contracts\Dao\Admin\Home\HomeDaoInterface;
use App\Models\Course;
use App\Models\Language;
use App\Models\User;
use App\Models\CourseVideo;
use App\Models\Blog;

/**
 * Interface of Data Access Object for Home
 */
class HomeDao implements HomeDaoInterface
{
     /**
     * To show Home
     * @return count of courses,languages,user,video,blog
     */
    public function index()
    {
        $courses = Course::with('languages', 'courseVideos')
        ->orderBy('id', 'asc')->latest()->take(3)->get();
        $languages = Language::get();
        $user = User::where('role_id','2')->count();
        $video = CourseVideo::count();
        $blog = Blog::count();
        return view('user.home',compact('courses', 'languages','user','video','blog'));
    }
}
