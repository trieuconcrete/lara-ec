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
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Str;

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/login', [AdminLoginController::class, 'login']);
