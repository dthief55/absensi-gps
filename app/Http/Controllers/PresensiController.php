<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    function index(Request $request){
        if($request->input('x_coordinate') and $request->input('y_coordinate')){
            $x_coordinate = $request->input('x_coordinate');
            $y_coordinate = $request->input('y_coordinate');
        }

        $email = $request->session()->get('email');

        $get_user_data = User::where('email', $email)->get()->toArray();
        $user_data     = $get_user_data[0];
        
        $user_id    = $user_data['id'];
        $user_name  = $user_data['name'];

        return view('actions/presensi', 
        [
            'id'   => $user_id,
            'name' => $user_name,
            'x_coordinate' => $x_coordinate ?? '',
            'y_coordinate' => $y_coordinate ?? ''
        ]);
    }
}
