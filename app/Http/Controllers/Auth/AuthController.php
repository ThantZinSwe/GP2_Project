<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Submit Login Form
     *
     * @return View login blade
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
    }
}
