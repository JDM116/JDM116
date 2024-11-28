<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('index');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/');
    }

    return response()->json([
        'success' => false,
        'errors' => ['email' => ['The provided credentials do not match our records.']]
    ], 422);
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}