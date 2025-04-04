<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\CustomerReviewController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisteredUserController;


Route::get('/products', [ProductController::class, 'show'])->name('show');
Route::post('/products', [ProductController::class, 'filter']);
Route::get('/products/filter', [ProductController::class, 'filter'])->name('filter.product');

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('detail');

// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/', [ProductController::class, 'index']);
Route::get('/contact', [ProductController::class, 'contact']);
Route::get('/terms', [ProductController::class, 'terms']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('/review/{product}', [CustomerReviewController::class, 'store'])->name('reviews.store');

Route::view('/email/verify', 'auth.verify')->name('verification.notice');
Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOTP'])->name('password.email');

Route::view('/verify-otp', 'auth.verify-otp')->name('password.verify');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP'])->name('password.verify.post');

Route::view('/reset-password', 'auth.reset-password')->name('password.reset.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/item', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
    Route::get('cart/checkout/add-address', [CartController::class, 'addAddress'])->name('cart.add.address');
    Route::post('cart/checkout/add-address', [CartController::class, 'addAddress']);
    Route::get('cart/checkout/payment', [CartController::class, 'showPaymentPage'])->name('cart.payment');
    Route::get('cart/checkout/review', [CartController::class, 'showReviewPage'])->name('cart.review');
    Route::get('cart/checkout/add-address', [CartController::class, 'addAddress'])->name('cart.add.address');
    Route::post('cart/checkout/add-address', [CartController::class, 'addAddress']);
    Route::get('cart/checkout/payment', [CartController::class, 'showPaymentPage'])->name('cart.payment');
    Route::get('cart/checkout/review', [CartController::class, 'showReviewPage'])->name('cart.review');
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::get('/profile/address', [ProfileController::class, 'address'])->name('profile.address');
    Route::get('/profile/orders', [OrderController::class, 'index']);
    Route::post('/profile/orders', [OrderController::class, 'placeOrder'])->name('profile.orders');
    Route::get('/profile/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/profile/orders/{order}', [OrderController::class, 'cancel'])->name('order.cancel');
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/wishlist/login', [WishlistController::class, 'login'])->name('wishlist.login');

    Route::post('/orders/place', [OrderController::class, 'placeOrder'])->name('orders.place');

    Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.products.index');
    Route::get('/admin/customers', [AdminController::class, 'customers'])->name('admin.customers');
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/admin/orders/{order}', [OrderController::class, 'showorder'])->name('admin.orders.show');
    Route::put('/admin/orders{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/admin/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');


    Route::get('/admin/genders', [AdminController::class, 'genders'])->name('admin.genders');
    Route::get('/admin/genders/create', [GenderController::class, 'create'])->name('genders.create');
    Route::post('/admin/genders', [GenderController::class, 'store'])->name('genders.store');
    Route::delete('/genders/{gender}', [GenderController::class, 'destroy'])->name('genders.destroy');
    Route::put('/genders/{gender}', [GenderController::class, 'update'])->name('genders.update');
    Route::get('/genders/{gender}/edit', [GenderController::class, 'edit'])->name('genders.edit');

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');

    Route::get('/admin/reviews', [CustomerReviewController::class, 'show'])->name('admin.reviews');
    Route::delete('/reviews/{id}', [CustomerReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');

    Route::get('/admin/products/{id}', [AdminController::class, 'showProduct'])->name('admin.product.show');
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('products.update');
    Route::get('/search', [AdminController::class, 'adminSearch'])->name('admin.search');
});
