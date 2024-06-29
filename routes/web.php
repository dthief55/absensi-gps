<?php

use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::get('/', function(Request $request){
    if($request->session()->has('email')){
        $session_val = $request->session()->get('email');
        $email = $session_val;

        $get_user_data          = User::where('email', $email)->get()->toArray();
        $user_data              = $get_user_data[0];
        $user_name              = $user_data['name'];
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
});

Route::get('/admin', function(Request $request){
    if($request->session()->has('email')){
        $session_val = $request->session()->get('email');
        $email = $session_val;

        $get_user_data          = User::where('email', $email)->get()->toArray();
        $user_data              = $get_user_data[0];
        $user_name              = $user_data['name'];
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
});

Route::get('/login', [SessionController::class, 'index']);

Route::post('/login/attempt', [SessionController::class, 'login']);

Route::get('/logout', function(Request $request){
    if($request->session()->has('email')){
        $request->session()->pull('email');
    }
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/password', function () {
    return view('password');
});

Route::get('/charts', function(Request $request){
    if($request->session()->has('email')){
        return view('charts');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
    }
});

Route::get('/tables', function(Request $request){
    if($request->session()->has('email')){
        return view('tables');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
    }
});

Route::get('/test', function(Request $request){
    if($request->session()->has('email')){
        return view('test');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
    }
});

Route::get('/401', function () {
    return view('401');
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/500', function () {
    return view('500');
});