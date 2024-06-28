<?php

use App\Http\Controllers\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function(Request $request){
    if($request->session()->has('email')){
        return view('index');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
    }
});

Route::get('/admin-index', function(Request $request){
    if($request->session()->has('email')){
        return view('admin-index');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
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

Route::get('/', function(Request $request){
    if($request->session()->has('email')){
        return view('charts');
    }else{
        return view('login', ['message' => 'Harap login terlebih dahulu!']);
    }
});

Route::get('/', function(Request $request){
    if($request->session()->has('email')){
        return view('tables');
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