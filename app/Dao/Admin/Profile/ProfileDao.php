<?php

namespace App\Dao\Admin\Profile;

use App\Contracts\Dao\Admin\Profile\ProfileDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        isset($user->image) ? : '';
        if($request->profile_img){
            if($user->image){
                unlink($user->image);
            }
            $img_name = time().'.'.$request->profile_img->extension();
            $path = 'images/admin/'.$img_name;
            $request->profile_img->move(public_path('images/admin'), $img_name);
        }        
        if ($user) {
            if($request->profile_img){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->address = $request['address'];
                $user->image = $path ?? $user->image;
                $user->update();
                return $user;
            }else {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->phone = $request['phone'];
                $user->address = $request['address'];
                $user->update();
                return $user;
            }
           
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
        if (!Hash::check($request->old_password, $user->password)) {
            return false;
        } else {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
           Auth::logout();
            return true;
        }
    }

}
