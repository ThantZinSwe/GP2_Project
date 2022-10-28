<?php
namespace App\Contracts\Services\Auth;
/**
 * Auth Interface
 */
interface AuthServiceInterface 
{
     /**
     * Login
     *
     * @param LoginRequestForm $request request including inputs
     * @return Object $user User object
     */
    public function login($request);
}