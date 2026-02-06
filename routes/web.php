<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\userController;


Route::get('/', [blogController::class, 'index']);

Route::get('blog/create', [blogController::class, 'create'])->middleware('auth');

Route::post('blog/store', [blogController::class,'store'])->middleware('auth');

Route::get('blog/{id}', [blogController::class, 'show']);

Route::get('blog/edit/{id}', [blogController::class, 'edit'])->middleware('auth');

Route::put('blog/update/{id}', [blogController::class, 'update'])->middleware('auth');

Route::delete('blog/delete/{id}', [blogController::class, 'destroy'])->middleware('auth');

Route::get('profile', [userController::class,'profile'])->middleware('auth');

Route::get("/auth/login", [userController::class, 'login'])->name('login')->middleware('guest');

Route::get("/auth/register",[userController::class,'register'])->middleware('guest');

Route::post("/auth/register",[userController::class,'store']);

Route::post("/logout",[userController::class,'logout'])->middleware('auth');

Route::get('/auth/manage',[userController::class, 'manage'])->middleware('auth');

Route::post("/auth/login",[userController::class,'authenticate']);

Route::get('/user_profile/{id}', [userController::class, 'user_profile']);