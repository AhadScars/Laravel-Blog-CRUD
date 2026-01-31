<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class userController extends Controller
{
    public function show(){
        return view("auth.profile");
    }

    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($validatedData);

        auth()->login($user);

        return redirect('/')->with('success', 'Registration successful! You are now logged in.');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/auth/login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function profile(){
        return view("auth.profile");
    }

}
