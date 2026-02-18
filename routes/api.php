<?php

use App\Http\Controllers\API\APIAuthController;
use App\Http\Controllers\API\APIBlogController;
use Illuminate\Support\Facades\Route;


Route::post('signup', [APIAuthController::class, 'signup']);

Route::post('login', [APIAuthController::class, 'login']);

Route::get('users', [APIAuthController::class, 'getAllUsers']);

Route::get('blogs', [APIBlogController::class, 'getAllBlogs']);

Route::get('blogs/{id}', [APIBlogController::class, 'showBlogbyId']);

Route::middleware('auth:sanctum')->group(function () {

Route::post('logout', [APIAuthController::class, 'logout']);

Route::post('createBlog', [APIBlogController::class, 'createBlog']);

Route::delete('blogs/{id}', [APIBlogController::class, 'destroy']);

Route::put('editblogs/{id}', [APIBlogController::class, 'updateBlog']);

// Allow multipart/form-data updates (PHP uploads work reliably with POST)
Route::post('editblogs/{id}', [APIBlogController::class, 'updateBlog']);

    
});