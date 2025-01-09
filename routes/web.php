<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\RegisteredUserController;

Route::view('/', 'welcome');

Route::get('/register', [RegisteredUserController::class, 'create']);

