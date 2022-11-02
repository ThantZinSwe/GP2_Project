<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserPassWordRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * AuthServiceInterface Property
     *
     * @var AuthInterface 
     */
    private $authInterface;
    /**
     * AuthServiceInterface Constructor
     *
     * @param AuthServiceInterface $authInterface
     */
    public function __construct(AuthServiceInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }
    /**
     * Show Login Form
     *
     * @return View login blade
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /**
     * Login
     * @param LoginFormRequest $request request including inputs
     * @return View admin Blade or user Blade
     */
    public function submitLoginForm(LoginFormRequest $request)
    {
        $flag = $this->authInterface->login($request);
        if ($flag) {
            if (Auth::user()->role_id == '1') {
                return redirect()->route('admin.dashboard');
            } else {
                return "HOME PAGE";
            }
        }
        return back()->with('error', 'Email & Password does not match');
    }
    public function register()
    {
        return view('auth.register');
    }
    /**
     * Register
     *
     * @param RegisterRequest $request request including inputs
     * @return View login Blade or Register Blade with Status
     */
    public function registerSave(RegisterRequest $request)
    {
        $register = $this->authInterface->registerSave($request);
        if($register){
            return view('auth.registersucess')->with('message', 'Register Successfully');
        }
        return back()->with('error', 'Cannot Register');
    }
    /**
     * Show Reset Form
     * 
     * @return View resetMail Blade
     */
    public function showResetForm()
    {
        return view('auth.resetMail');
    }
    /**
     * Send Reset Mail
     * @param LoginFormRequest $request request including inputs
     * @return View Reset Mail Blade with Status
     */
    public function sendResetMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $status = $this->authInterface->sendResetMail($request);
        if($status){
            return back()->with('message', 'We have e-mailed your password reset link!');
        }
        return back()->with('error', 'Cannot Send Mail');
    }
    /**
     * Show Reset Form
     * @param String $token 
     * @return View change password Blade with token
     */
    public function showChangePasswordForm($token)
    {
        return view('auth.changePassword', ['token' => $token]);
    }
    /**
     * Submit Reset Form
     * 
     * @return View resetMail Blade
     */
    public function submitChangePasswordForm(PasswordResetRequest $request)
    {
        $resetPassword = $this->authInterface->resetPassword($request);

        if (!$resetPassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        return redirect()->route('login.get')->with('message', 'Your password has been changed!');
    }
    /**
     * Logout
     *
     * @return void
     */
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect()->route('login.get');
    }
}

