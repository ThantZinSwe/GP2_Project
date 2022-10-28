<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;


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
   * To save role
   * @param int $request
   * @return Object Role
   */
    public function registerSave(Request $request){
        return $this->authDao->registerSave($request);
    }
}
