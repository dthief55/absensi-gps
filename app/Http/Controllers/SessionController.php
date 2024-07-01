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
            
            $user_name          = $user_data['nama'];
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

    function is_not_admin_check(Request $request){
        if($request->session()->has('email')){
            $session_val = $request->session()->get('email');
            $email = $session_val;
    
            $get_user_data          = User::where('email', $email)->get()->toArray();
            $user_data              = $get_user_data[0];
            $user_name              = $user_data['nama'];
            $user_admin_status      = $user_data['is_admin'];
    
            if($user_admin_status == 1){
                echo "<script>
                    alert('Admin dilarang melihat data privasi pengguna!');
                    document.location.href = '/admin';
                </script>";
            }else{
                return view('index', ['name' => $user_name]);
            }
        }else{
            if($request->cookie('cookie_setted')){
                $cookie_val = request()->cookie('cookie_setted');
                
                request()->session()->put('email', $cookie_val);
                $session_val = request()->session()->get('email');
    
                $email = $session_val;
    
                return redirect('/login')->with('email', $email);
                
            }else{
                return view('login', ['message' => 'Harap login terlebih dahulu!']);
            }
        }
    }

    function is_admin_check(Request $request){
        if($request->session()->has('email')){
            $session_val = $request->session()->get('email');
            $email = $session_val;
    
            $get_user_data          = User::where('email', $email)->get()->toArray();
            $user_data              = $get_user_data[0];
            $user_name              = $user_data['nama'];
            $user_admin_status      = $user_data['is_admin'];
    
            if($user_admin_status == 1){
                return view('admin-index', ['name' => $user_name]);
            }else{
                echo "<script>
                    alert('Anda bukan admin!');
                    document.location.href = '/';
                </script>";
            }
        }else{
            if($request->cookie('cookie_setted')){
                $cookie_val = request()->cookie('cookie_setted');
                
                request()->session()->put('email', $cookie_val);
                $session_val = request()->session()->get('email');
    
                $email = $session_val;
    
                return redirect('/login')->with('email', $email);
                
            }else{
                return view('login', ['message' => 'Harap login terlebih dahulu!']);
            }
        }
    }

    function delete_session(Request $request){
        if($request->session()->has('email')){
            $request->session()->pull('email');
        }
        return redirect('/login');
    }
}