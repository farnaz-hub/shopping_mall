<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function form()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('login.form');
    }


    public function login(Request $request)
    {
        $cred = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if (Auth::attempt($cred, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        return redirect(route('login'));
    }
}
