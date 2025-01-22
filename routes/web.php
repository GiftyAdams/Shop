<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::view('/error', 'error');
Route::view('/profile', 'profile');
Route::view('/products', 'products');

Route::view('/detail', 'product-detail');

Route::view('/wishlist', "product-wishlist");

Route::view('/admin', 'admin');


// Route::view('/reset', 'reset');
// Route::view('/otp', 'otp');