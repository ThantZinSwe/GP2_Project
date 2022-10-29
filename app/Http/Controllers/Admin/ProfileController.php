<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Contracts\Services\Admin\Profile\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\UserPassWordRequest;
use App\Models\Blog;
use App\Models\User;

class ProfileController extends Controller
{
    private $profileInterface;
    private $courseInterface;
    public function __construct(ProfileServiceInterface $profileInterface, CourseServiceInterface $courseInterface)
    {
        $this->profileInterface = $profileInterface;
        $this->courseInterface = $courseInterface;
    }
    /**
     * @return View Admin/dashboard
     */
    public function index()
    {
        $courses = $this->courseInterface->index();
        $blog = Blog::get();
        $user = User::where('role_id', 2)->get();
        return view('admin.index', ['course' => count($courses), 'blog' => count($blog), 'user' => count($user)]);
    }
    /**
     * Show Profile Form
     *
     * @return view Admin Profile Blade
     */
    public function showProfileForm()
    {
        return view('admin.profile.index');
    }

    /**
     * Change Admin Profile
     * @param string $id user id
     * @param AdminProfileRequest $request request including inputs
     * @return Redirect View & Status
     */
    public function changeProfile($id, AdminProfileRequest $request){
        $user = $this->profileInterface->changeProfile($id, $request);
        if($user){
            return back()->with('message', 'Profile Successfully Updated');
        }
        return back()->with('error', 'Cannot Change Profile');
    }
    /**
     * Show Admin Password Form
     * @return view ChangePassword Form
     */
    public function showPasswordForm()
    {
        return view('admin.profile.changePassword');
    }
    /**
     * Change Admin Password
     * @param string $id user id
     * @param UserPasswordRequest $request request including inputs
     * @return Redirect View & Status
     */
    public function changeAdminPassword($id, UserPasswordRequest $request){

        $user = $this->profileInterface->changePassword($id, $request);
        //dd($user);
        if($user){
            return redirect()->route('login.get')->with('message', 'Password successfully Changed');
        }
        return back()->with('error', 'The specified password does not match the database password');
    }
}
