<?php

namespace App\Contracts\Dao\Admin\User;

/**
 * Interface of Data Access Object for user
 */
interface UserDaoInterface
{
    /**
     * To delete user
     * @param int $id
     */
    public function deleteUser($id);
}
