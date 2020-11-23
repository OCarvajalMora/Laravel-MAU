<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'username'  => 'required|unique:users|min:5|max:25',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed|min:8'
        ]);

        $user = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $new_user = User::create($user);
        Auth::login($new_user);
        event(new Registered($new_user));
        return redirect()->route('verification.notice');
    }

    public function login(Request $request){
        
        $credentials = $request->only('email', 'password');
        $remember = $request->remember_me;

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->with('login_fail', '<strong>Ops! </strong>The credentials given doesn\'t match. Please, try again')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logout_successful', 'Session closed successfully. See you later!');
    }
 
    public function reset_password(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );
    
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }

    public function forgot_password(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

}
