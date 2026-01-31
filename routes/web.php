<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\userController;


Route::get('/', [blogController::class, 'index']);

Route::get('blog/create', [blogController::class, 'create']);

Route::post('blog/store', [blogController::class,'store']);

Route::get('blog/{id}', [blogController::class, 'show']);

Route::get('blog/edit/{id}', [blogController::class, 'edit']);

Route::put('blog/update/{id}', [blogController::class, 'update']);

Route::delete('blog/delete/{id}', [blogController::class, 'destroy']);

Route::get('profile', [userController::class,'profile']);

Route::get("/auth/login", [userController::class, 'login']);

Route::get("/auth/register",[userController::class,"register"]);

Route::post("/auth/register",[userController::class,"store"]);

Route::post("/logout",[userController::class,"logout"]);

Route::post("/login",[userController::class,"authenticate"]);
