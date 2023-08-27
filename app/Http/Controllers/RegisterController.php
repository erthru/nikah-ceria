<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('pages.register', [
            'title' => 'Daftar'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmationPassword = $request->input('confirmationPassword');

        if ($password !== $confirmationPassword) {
            return redirect('/register')->with('errorMessage', 'Password tidak sama')->withInput();
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            return redirect('/register')->with('errorMessage', 'Email telah terdaftar')->withInput();
        }

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'role' => 'CUSTOMER'
        ]);

        Customer::create([
            'name' => $name,
            'user_id' => $user->id
        ]);

        return redirect('/login')->with('successMessage', 'Registrasi berhasil, silahkan login untuk melanjutkan');
    }
}
