<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(Request $request)
    {
        $email = null;
        
        if($request->cookie('cookie_setted')){
            $email = $request->cookie('cookie_setted');
        }

        return view('login', ['email' => $email]);
    }

    function login(Request $request)
    {
        $infologin  = $request->input();
        
        $email              = $infologin['email'];
        $password           = $infologin['password'];
        $remember_password  = isset($infologin['remember_password'])? $infologin['remember_password']: null;

        $login_attempt    = [
            'email' => $email,
            'password' => $password
        ];

        if(Auth::attempt($login_attempt)){
            $get_user_data      = User::where('email', $email)->get()->toArray();
            $user_data          = $get_user_data[0];
            
            $user_name          = $user_data['name'];
            $user_admin_status  = $user_data['is_admin'];
            
            $request->session()->put('email', $email);

            if(isset($remember_password)){
                if($user_admin_status == 1){
                    return redirect('/admin')->withCookie('cookie_setted', $email, 60*24);
                    // redirect to '/admin' and set cookie to that URL with the value is random using "Str::uuid()" for 1 minute
                    // withCookie('cookie_name', 'cookie_value', 'duration')
                }else{
                    return redirect('/')->withCookie('cookie_setted', $email, 60*24);
                    // same with above, set cookie but for '/' URL
                }
            }else{
                if($user_admin_status == 1){
                    return redirect('/admin');
                }else{
                    return redirect('/');
                }
            }


        }else{
            return view('login', ['message' => 'Email atau password salah']);
        }
    }
}