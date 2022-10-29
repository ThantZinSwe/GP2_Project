<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

/**
 * Interface of Data Access Object for user
 */
interface AuthDaoInterface
{
    /**
     * To save user
     * @param RegisterRequestForm $request request including inputs
     * @return Object User
     */
    public function registerSave(RegisterRequest $request);
     /**
     * Save
     * @param Request $request request including inputs
     * @return String $token;
     */
    public function saveToken($request);
    /**
     * Find Mail
     * @param Request $request request including inputs
     * @return Object User $user or not;
     */
    public function findMail($request);
    /**
     * Reset Password
     *
     * @param PasswordResetRequest $request request including inputs
     * @return boolean reset password or not
     */
    public function resetPassword($request);
}
