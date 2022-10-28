<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function registerSave(Request $request)
    {
        return $this->authDao->registerSave($request);
    }
}
