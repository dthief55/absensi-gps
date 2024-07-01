<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PresensiController extends Controller
{
    function index(Request $request){
        $message = $request->session()->pull('message');
        $email   = $request->session()->get('email');

        $get_user_data = User::where('email', $email)->get()->toArray();
        $user_data     = $get_user_data[0];
        
        $user_id    = $user_data['id'];
        $user_name  = $user_data['nama'];

        return view('actions/presensi', 
        [
            'id'   => $user_id,
            'name' => $user_name,
            'message' => $message
        ]);
    }

    function presensi_hadir(Request $request){
        $email      = $request->session()->get('email');
        $x_coor     = $request->input('x_coordinate');
        $y_coor     = $request->input('y_coordinate');
        
        $get_user_data = User::where('email', $email)->get()->toArray();
        $user_data     = $get_user_data[0];
        $user_name     = $user_data['nama'];

        $kehadiran = new Kehadiran;
        $existance = Kehadiran::exists('email', $email);

        if(!$existance){
            $kehadiran->nama  = $user_name;
            $kehadiran->email = $email;
            $kehadiran->koordinat_x = $x_coor; 
            $kehadiran->koordinat_y = $y_coor;  
            $kehadiran->save();
        }else{
            $request->session()->put('message', 'Anda sudah absen kehadiran hari ini!');
        }

        return response('Data berhasil dikirim ke database!');
    }
}
