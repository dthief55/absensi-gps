<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PresensiController;

Route::get('/', [SessionController::class, 'is_not_admin_check']);

Route::get('/admin', [SessionController::class, 'is_admin_check']);

Route::get('/login', [SessionController::class, 'index']);

Route::post('/login/attempt', [SessionController::class, 'login']);

Route::get('/logout', [SessionController::class, 'delete_session']);

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

Route::get('/karyawan/presensi', [PresensiController::class, 'index']);

Route::get('/karyawan/presensi/attempt', [PresensiController::class, 'presensi_hadir']);

Route::get('/401', function () {
    return view('errors/401');
});

Route::get('/404', function () {
    return view('errors/404');
});

Route::get('/500', function () {
    return view('errors/500');
});