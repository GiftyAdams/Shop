<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'welcome');

Route::get('/register', [RegisteredUserController::class, 'create']);

Route::get('/login', [SessionController::class, 'create']);

Route::view('/reset', 'reset');
Route::view('/otp', 'otp');
Route::view('/error', 'error');
Route::view('/profile', 'profile');