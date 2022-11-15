<?php

namespace App\Services\Admin\User;

use App\Contracts\Dao\Admin\User\UserDaoInterface;
use App\Contracts\Services\Admin\User\UserServiceInterface;

/**
 * Interface of Data Access Object for user
 */
class UserService implements UserServiceInterface
{
    private $userDao;
    /**
     * Class Constructor
     * @param RoleDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To delete user
     * @param int $id
     */
    public function deleteUser($id)
    {
        return $this->userDao->deleteUser($id);
    }
}
