<?php
namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{

    private $authDao;
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
    public function login($request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }
}