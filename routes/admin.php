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

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::controller(CategoryController::class)->prefix('categories')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('create', 'save')->name('save');
    Route::get('/{category}/edit', 'edit')->name('edit');
    Route::put('/{category}/update', 'update')->name('update');
});

Route::controller(BrandController::class)->prefix('brands')->name('brand.')->group(function () {
    Route::get('/', 'index')->name('index');
});
