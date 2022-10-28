<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for user
 */
interface AuthDaoInterface
{
    /**
     * To save user
     * @param int $request
     * @return Object User
     */
    public function registerSave(Request $request);

}
