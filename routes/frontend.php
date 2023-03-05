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
    Route::get('product/detail/{id}', 'getProductDetail')->name('product.detail');
    Route::get('product/list', 'getProductList')->name('product.list');
});

Route::controller(MypageController::class)->group(function () {
    Route::get('mypage/wishlist', 'wishList')->name('mypage.wishlist');
    Route::get('mypage/cart', 'cart')->name('mypage.cart');
});
