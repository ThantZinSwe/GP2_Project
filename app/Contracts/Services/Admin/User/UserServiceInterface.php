<?php

namespace App\Contracts\Services\Admin\User;

/**
 * Interface of Data Access Object for role
 */
interface UserServiceInterface
{
    /**
     * To delete user
     * @param int $id
     */
    public function deleteUser($id);
}
