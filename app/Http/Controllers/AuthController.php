<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthController 
{
    public function register()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('blogs.index')->with('Berhasil', 'Akun Berhasil Dibuat');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validate
         $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route('blogs.index')->with('Berhasil', 'Anda Berhasil Login');
        }

        return redirect()->route('login')->withErrors([
            'email' => "Anda Tidak Terdaftar"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('Berhasil', 'Logout Berhasil');
    }

    
}
