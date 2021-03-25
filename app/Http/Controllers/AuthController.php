<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function getFormLogin()
    {
    	return view('auth.login');
    }

    public function getFormLogin2()
    {
        return view('auth.login');
    }

    public function getFormLogin3()
    {
        return view('auth.login');
    }

    public function getFormLogin10()
    {
        $a = 10;
        $b = 100;

        return $a + $b;
    }

    public function submitLogin(Request $request)
    {
    	$username =  $request->input('username');
    	$password =  $request->input('password');

    	if (Auth::attempt([
            'email' => $username,
            'password' => $password,
        ])) {
            $user = User::where('email', $username)->first();
            Auth::login($user);
            return redirect()->route('posts.index');
        }
    }

    public function getFormRegister()
    {
        return view('auth.register');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
