<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

/**
 * Interface of Data Access Object for user
 */
interface AuthServiceInterface
{
    /**
     * To save user
     * @param int $request
     * @return Object User
     */
    public function registerSave(RegisterRequest $request);

    /**
     * Login
     *
     * @param LoginRequestForm $request request including inputs
     * @return Object $user User object
     */
    public function login($request);
    /**
     * Send Reset Mail
     *
     * @param LoginRequestForm $request request including inputs
     * @return boolean send mail or not 
     */
    public function sendResetMail($request);
    /**
     * Reset Password
     *
     * @param PasswordResetRequest $request request including inputs
     * @return boolean reset password or not
     */
    public function resetPassword($request);
}
