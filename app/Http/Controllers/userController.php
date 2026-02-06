<?php

namespace App\Http\Controllers;

use App\Models\blog;
use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function show()
    {
        return view("auth.profile");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $imageName);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'profile_image' => $imageName,
            'description' => $validated['description'],
        ]);

        auth()->login($user);

        return redirect('/')->with('success', 'Registration successful! You are now logged in.');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/auth/login');
    }

    public function authenticate(Request $request)
    {
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


    public function manage()
    {
        $blogs = auth()->user()->blogs()->latest()->get();
        return view('auth.manage', compact('blogs'));
    }

    public function profile()
    {
        
        return view("auth.profile");
    }


    public function user_profile($id)
    {
       $user = User::findOrFail($id);

    
    $blogs = $user->blogs()->latest()->paginate(6); 

    return view('blog.user_profile', compact('user', 'blogs'));
    }
}
