<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [blogController::class, 'index']);

Route::get('blog/create', [blogController::class, 'create']);

Route::post('blog/store', [blogController::class,'store']);

Route::get('blog/{id}', [blogController::class, 'show']);

Route::get('blog/edit/{id}', [blogController::class, 'edit']);

Route::put('blog/update/{id}', [blogController::class, 'update']);

Route::delete('blog/delete/{id}', [blogController::class, 'destroy']);

Route::get('profile', [userController::class,'show']);

Route::get("/auth/login", [userController::class, 'login']);

Route::get("/auth/register",[userController::class,"register"]);