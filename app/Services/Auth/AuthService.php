<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

/**
 * Interface of Data Access Object for role
 */
class AuthService implements AuthServiceInterface
{
    private $authDao;
    /**
     * Class Constructor
     * @param RoleDaoInterface
     * @return
     */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }
    /**
     * Login
     *
     * @param LoginRequestForm $request request including inputs
     * @return boolean flag success or not
     */
    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * To save role
     * @param int $request
     * @return Object Role
     */
    public function registerSave(RegisterRequest $request)
    {
        return $this->authDao->registerSave($request);
    }

    /**
     * Send Reset Mail
     *
     * @param LoginRequestForm $request request including inputs
     * @return boolean send mail or not 
     */
    public function sendResetMail($request){
        $token = $this->authDao->saveToken($request);
        $user = $this->authDao->findMail($request);
        if($user){
            Mail::to($request->email)->send(new ResetPasswordMail($user, $token));
            return true;
        }
        return false;
    }
    /**
     * Reset Password
     *
     * @param PasswordResetRequest $request request including inputs
     * @return boolean reset password or not
     */
    public function resetPassword($request){
        return $this->authDao->resetPassword($request);
    }
}
