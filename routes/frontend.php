<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('product/detail/{slug}', 'getProductDetail')->name('product.detail');
    Route::get('product/list', 'getProductList')->name('product.list');
});

Route::controller(MypageController::class)->prefix('mypage')->name('mypage.')->group(function () {
    Route::get('wishlist', 'wishList')->name('wishlist');
    Route::get('cart', 'cart')->name('cart');
    Route::get('checkout', 'checkout')->name('checkout')->middleware('auth');
    Route::get('thank-you', 'thankYou')->name('thankyou')->middleware('auth');
    Route::get('orders', 'orders')->name('orders')->middleware('auth');
    Route::get('return-vnpay', 'returnVnpay')->name('returnVnpay')->middleware('auth');
});

Route::controller(UserController::class)->prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('profile', 'profile')->name('profile');
    Route::put('update', 'update')->name('update');
});
