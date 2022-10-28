<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

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
    public function registerSave(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => 2
        ]);
        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect('/register');
    }
}
