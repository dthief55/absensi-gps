<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

use function Laravel\Prompts\password;

class SessionController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required' => 'Harap masukkan e-mail!',
            'password.required' => 'Harap masukkan password'
        ]);
        
        $infologin  = $request->input();
        $email      = $infologin['email'];
        $password   = $infologin['password'];
        $attempt    = [
            'email' => $email,
            'password' => $password
        ];

        if(Auth::attempt($attempt)){
            $request->session()->put('email', $email);

            $getAdminColumn     = User::where('email', $email)->get('is_admin', 'name');
            $decodedAdminColumn = json_decode($getAdminColumn, true);

            var_dump($decodedAdminColumn);
            // $isAdmin            = $decodedAdminColumn[0]['is_admin'];

            // if($isAdmin == 1){
            //     return redirect('/admin-index');
            // }else{
            //     return redirect('/index');
            // }

        }else{
            return view('login', ['message' => 'Email atau password salah!']);
        }
    }
}