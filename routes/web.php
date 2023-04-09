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
use App\Http\Controllers\Auth\BackendLoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Str;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    return view('welcome');
});
Route::get('/terms-of-service', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('backend/login', [BackendLoginController::class, 'login'])->name('backend.login');
Route::post('backend/logout', [LogoutController::class, 'logout'])->name('backend.logout');

Route::controller(SocialController::class)->group(function() {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
