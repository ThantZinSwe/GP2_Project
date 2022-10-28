<?php

namespace App\Dao\Admin\Profile;

use App\Contracts\Dao\Admin\Profile\ProfileDaoInterface;
use App\Models\User;

class ProfileDao implements ProfileDaoInterface 
{
    /**
     * Change Admin Profile
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changeProfile($id, $request)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->address = $request['address'];
            $user->image = $request['profile_img'];
            $user->save();
            return $user;
        }
        return false;
    }
    /**
     * Change Password
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changePassword($id, $request)
    {
        $user = User::find($id);
        if($user){
            $user->password = $request['password'];
            $user->save();
            return $user;
        }
        return false;
    }
}
