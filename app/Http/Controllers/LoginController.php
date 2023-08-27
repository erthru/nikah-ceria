<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function show(): View
    {
        return view('pages.login', [
            'title' => 'Login'
        ]);
    }

    public function attemp(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (!Auth::attempt($credentials)) {
            return redirect('/login')->with('errorMessage', 'Login gagal, email atau password salah')->withInput();
        }

        $request->session()->regenerate();
        return redirect('/dashboard');
    }
}
