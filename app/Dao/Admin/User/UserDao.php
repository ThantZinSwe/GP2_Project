<?php

namespace App\Dao\Admin\User;

use App\Contracts\Dao\Admin\User\UserDaoInterface;
use App\Models\User;

/**
 * Interface of Data Access Object for role
 */
class UserDao implements UserDaoInterface
{
    /**
     * To delete user
     * @param int $id
     */
    public function deleteUser($id)
    {
        $block_user = User::find($id);
        $block_user->delete();
    }
}
