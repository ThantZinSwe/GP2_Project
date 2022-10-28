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
}