<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\CustomerReviewController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisteredUserController;


Route::get('/', [ProductController::class, 'index']);
Route::get('/contact', [ProductController::class, 'contact']);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/products', [ProductController::class, 'show'])->name('show');
// Route::get('/wishlist', [ProductController::class, 'wishlist']);
Route::get('/products/{id}', [ProductController::class, 'detail'])->name('detail');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');
Route::post('/cart/item', [CartController::class, 'updateQuantity'])->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
Route::post('cart/checkout/add-address', [CartController::class, 'addAddress'])->name('cart.add.address')->middleware('auth');
Route::get('cart/checkout/payment', [CartController::class, 'showPaymentPage'])->name('cart.payment')->middleware('auth');


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::view('/email/verify', 'auth.verify')->name('verification.notice');
Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOTP'])->name('password.email');

Route::view('/verify-otp', 'auth.verify-otp')->name('password.verify');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP'])->name('password.verify.post');

Route::view('/reset-password', 'auth.reset-password')->name('password.reset.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('/wishlist', [WishlistController::class, 'index']);
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove')->middleware('auth');
Route::get('/wishlist/login', [WishlistController::class, 'login'])->name('wishlist.login');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings')->middleware('auth');
Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders')->middleware('auth');

Route::post('/review/{product}', [CustomerReviewController::class, 'store'])->name('reviews.store');



// Route::view('/settings', 'settings');
// Route::view('/orders', 'orders');
// Route::view('/error', 'error');
// Route::view('/profile', 'profile');

// Route::view('/checkout', 'checkout');
// Route::view('/products', 'products');

// Route::view('/detail', 'product-detail');




Route::view('/admin', 'admin');
// Route::view('/terms', 'terms');

// Route::view('/otp', 'otp');