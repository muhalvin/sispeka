<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Login'
        ];
        
        return view('auth/login', $data);
    }
   
    public function loginProses(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ],[
            'email.required'    => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        $loginData = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($loginData)){
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin/dashboard');
                
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('gagal', 'Kamu tidak memiliki akses!');
            }
        } else {
            return redirect()->route('login')->with('gagal', 'Email atau Password anda salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('sukses', 'Kamu berhasil Logout');
    }
}