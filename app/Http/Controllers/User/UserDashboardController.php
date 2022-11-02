<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Course\CourseServiceInterface;
use App\Contracts\Services\Admin\Profile\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPassWordRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    private $profileInterface;
    private $courseInterface;
    /**
     * Constructor of UserDashboard Controller
     *
     * @param ProfileServiceInterface $profileService
     */
    public function __construct(ProfileServiceInterface $profileService,CourseServiceInterface $courseInterface)
    {
        //$this->middleware('auth');
        $this->profileInterface = $profileService;
        $this->courseInterface = $courseInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $courses =  $this->courseInterface->getUserCourse($user_id);
        //return $courses->links();
        return view('user.user-dashboard', ['courses' => $courses]);
    }

    /**
     * Submit User Profile
     *@param String $id
     * @param UserProfileRequest $request validating Request
     * @return Object $user object
     */
    public function submitUserProfile($id, UserProfileRequest $request)
    {
        $user = $this->profileInterface->changeProfile($id, $request);

        if ($user) {
            return back()->with('message', 'Profile Successfully Updated');
        }

        return back()->with('error', 'Cannot Change Profile');
    }

    /**
     * Change User Password
     *@param String $id
     * @param UserPasswordRequest $request validating Request
     * @return Object $user object
     */
    public function changeUserPassword($id, UserPassWordRequest $request)
    {
        $user = $this->profileInterface->changePassword($id, $request);

        //dd($user);
        if ($user) {
            return redirect()->route('login.get')->with('message', 'Password successfully Changed');
        }

        return back()->with('error', 'Old Password did not match!');
    }

    /**
     * Get User Courses
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //public function getUserCourse()
    //{
    //    
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
