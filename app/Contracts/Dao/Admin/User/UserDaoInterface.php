<?php

namespace App\Contracts\Dao\Admin\User;

/**
 * Interface of Data Access Object for user
 */
interface UserDaoInterface
{
    /**
     * To block user
     * @param int $id
     */
    public function blockUser($id);
}
