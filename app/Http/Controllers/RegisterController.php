<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Register'
        ];
        
        return view('auth/register', $data);
    }

    public function create(Request $request)
    {
       
        $rules = [
            'email'             => 'required|email|string',
            'name'              => 'required|string',
            'password'          => [
                'required',
                'string',
                Password::min(7)
                    ->mixedCase()
                    ->numbers()
            ],
            'password_confirm'  => 'required|same:password|string'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        } else { 
            User::create([
                'email'             => $request->email,
                'email_verified_at' => now(),
                'name'              => $request->name,
                'role'              => 'user',
                'password'          => Hash::make($request->password),
                'created_at'        => now(),
            ]);

            return redirect()->route('login')->with('sukses', 'Anda berhasil melakukan registrasi');
        }
    }
}