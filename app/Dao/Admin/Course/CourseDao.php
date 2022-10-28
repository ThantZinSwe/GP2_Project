<?php

namespace App\Dao\Admin\Course;

use App\Contracts\Dao\Admin\Course\CourseDaoInterface;
use App\Models\Course;
use App\Models\Language;
use Illuminate\Support\Facades\File;
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
        return $courses;
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
        $course = new Course();
        $course->name = $request->name;
        $course->slug = Str::slug($request->name);
        $course->type = $request->type;
        $course->description = $request->description;
        $course->price = $request->price;

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

        $course->languages()->detach();

        $image = $course->image;

        if (File::exists(public_path() . '/images/course/' . $image)) {

            File::delete(public_path() . '/images/course/' . $image);

        }

        $course->delete();
        return 'success';
    }

}
