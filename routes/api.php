<?php

use App\Http\Controllers\API\APIAuthController;
use App\Http\Controllers\API\APIBlogController;
use Illuminate\Support\Facades\Route;


Route::post('signup', action: [APIAuthController::class, 'signup']);

Route::post('login', [APIAuthController::class, 'login']);

Route::post('logout', [APIAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('users', [APIAuthController::class, 'getAllUsers']);

Route::get('blogs', [APIBlogController::class, 'getAllBlogs']);

Route::post('createBlog', [APIBlogController::class, 'createBlog'])->middleware('auth:sanctum');

Route::get('blogs/{id}', [APIBlogController::class, 'showBlogbyId']);

Route::delete('blogs/{id}', [APIBlogController::class, 'destroy'])->middleware('auth:sanctum');