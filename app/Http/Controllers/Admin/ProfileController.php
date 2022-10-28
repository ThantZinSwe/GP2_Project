<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Profile\ProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\UserPassWordRequest;

class ProfileController extends Controller
{
    private $profileInterface;
    public function __construct(ProfileServiceInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;
    }
    /**
     * @return View Admin/dashboard
     */
    public function index()
    {
        return view('admin.index');
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
    public function submitProfileForm($id, AdminProfileRequest $request)
    {
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
    public function submitPasswordForm($id, UserPassWordRequest $request){
        $user = $this->profileInterface->changePassword($id, $request);
        if($user){
            return redirect()->route('admin.profile.get')->with('message', 'Password successfully Changed');
        }
        return back()->with('error', 'Cannot Change Password');
    }
}
