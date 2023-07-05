<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $info_login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($info_login)){
            if(Auth::user()->role == 'admin'){
                return redirect('dashboard/admin');
            }elseif(Auth::user()->role == 'operator'){
                return redirect('dashboard/operator');
            }
        }else{
            return redirect('')->withErrors('Email dan Password Tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
    
}
 