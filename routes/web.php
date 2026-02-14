<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\userController;

Route::controller(blogController::class)->group(function () {
    Route::get('/', 'index');

    Route::middleware('auth')->group(function () {
        Route::get('blog/create', 'create');
        Route::post('blog/store', 'store');
        Route::get('blog/edit/{id}', 'edit');
        Route::put('blog/update/{id}', 'update');
        Route::delete('blog/delete/{id}', 'destroy');
    });

    Route::get('blog/{id}', 'show');
});

Route::prefix('auth')->controller(userController::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('register', 'register');
        Route::post('register', 'store');
        Route::post('login', 'authenticate');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout');
        Route::get('manage', 'manage');
        Route::get('edit_profile', 'edit_profile');
        Route::put('edit_profile', 'update_profile');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [userController::class, 'profile']);
});

Route::get('user_profile/{id}', [userController::class, 'user_profile']);
