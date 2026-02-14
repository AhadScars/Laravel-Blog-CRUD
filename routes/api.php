<?php

use App\Http\Controllers\API\APIAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('signup', action: [APIAuthController::class, 'signup']);

Route::post('login', [APIAuthController::class, 'login']);

Route::post('logout', [APIAuthController::class, 'logout'])->middleware('auth:sanctum');