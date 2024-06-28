<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin-index');
});

Route::post('/login', function () {
    return view('login');
});

Route::post('/register', function () {
    return view('register');
});

Route::post('/password', function () {
    return view('password');
});

Route::get('/layout-sidenav-light', function () {
    return view('layout-sidenav-light');
});

Route::get('/layout-static', function () {
    return view('layout-static');
});

Route::get('/charts', function () {
    return view('charts');
});

Route::get('/tables', function () {
    return view('tables');
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