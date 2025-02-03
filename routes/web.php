<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/contact', 'contact');


Route::get('/', [ProductController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);

Route::get('/products', [ProductController::class, 'show']);
Route::get('/wishlist', [ProductController::class, 'wishlist']);
Route::get('/products/{id}', [ProductController::class, 'detail']);

Route::middleware('guest')->group(function () {
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::view('/error', 'error');
Route::view('/profile', 'profile');
// Route::view('/products', 'products');

// Route::view('/detail', 'product-detail');

// Route::get('/wishlist', "product-wishlist");


Route::view('/admin', 'admin');


// Route::view('/reset', 'reset');
// Route::view('/otp', 'otp');