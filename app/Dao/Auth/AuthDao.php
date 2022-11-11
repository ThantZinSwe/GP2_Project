<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Coupon;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $coupon = Coupon::inRandomOrder()->first();
        $user_coupon = UserCoupon::create([
            'user_id' => $user->id,
            'coupon_id' => $coupon->id,
            'status' => 'active',
            'expired_time' => Carbon::now()->addDays(3),
        ]);
        Mail::to($user->email)->send(new RegisterMail($user, $user_coupon));
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect('/register');
    }
     /**
     * Save Token
     * @param Request $request request including inputs
     * @return String $token;
     */
    public function saveToken($request){
        $token = Str::random(64);

        $linkToken = DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        if($linkToken){
            return $token;
        }   
        return false;
      
    }
    /**
     * Find Mail
     * @param Request $request request including inputs
     * @return Object Mail;
     */
    public function findMail($request){
        $user = User::where('email', $request->email)->first();
        if($user){
            return $user;
        }   
        return false;
      
    }
        /**
     * Reset Password
     *
     * @param PasswordResetRequest $request request including inputs
     * @return boolean reset password or not
     */
    public function resetPassword($request){
        $email = $request->email;
        $token = $request->token;
        $password = $request->new_password;
        $status = DB::table('password_resets')->where(['email' => $email, 'token' => $token])->first();
        if($status){
            User::where('email', $email)->update(['password' => Hash::make($password)]);
            DB::table('password_resets')->where(['email' => $email])->delete();
            return true;
        }
        return false;

    }
}
