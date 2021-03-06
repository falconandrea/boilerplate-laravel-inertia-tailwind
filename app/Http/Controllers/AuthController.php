<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Login', [
            'seo' => [
                'title' => 'Login',
                'description' => 'This is the login page'
            ]
        ]);
    }

    public function show_register()
    {
        return Inertia::render('Auth/Registration', [
            'seo' => [
                'title' => 'Register',
                'description' => 'This is the register page'
            ]
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Email not found or wrong credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::route('home');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string'
        ]);

        $user = User::create($data);

        auth()->login($user);

        return Redirect::route('home')->with('success', "Account successfully registered.");
    }
}
