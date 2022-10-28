<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;
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
    public function registerSave(Request $request);
}
