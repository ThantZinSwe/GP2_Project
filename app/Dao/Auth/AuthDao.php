<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

/**
 * Interface of Data Access Object for rolw
 */
class AuthDao implements AuthDaoInterface
{
    /**
     * To save role
     * @param int $request
     * @return Object Role
     */
    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'phone' => 'required|unique:users|max:11'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => 2
        ]);
        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect('/admin/register');
    }
}
