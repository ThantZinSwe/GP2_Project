<?php

namespace App\Contracts\Services\Admin\User;

/**
 * Interface of Data Access Object for role
 */
interface UserServiceInterface
{
    /**
     * To block user
     * @param int $id
     */
    public function blockUser($id);
}
