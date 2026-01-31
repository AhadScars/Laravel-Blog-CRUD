<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
