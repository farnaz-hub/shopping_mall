<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form()
    {
        return view('login.form');
    }


    public function login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ]))
        {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        return redirect(route('login.form'));
    }
}
