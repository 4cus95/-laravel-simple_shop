<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthRedirect;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrdersController;

Route::get('/', function () {
    return view('welcome');
})->middleware(AuthRedirect::class);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('shop', ProductsController::class)
        ->only(['index', 'store']);

    Route::get('/basket', BasketController::class)->name('basket.page');

    Route::resource('orders', OrdersController::class)
        ->only(['index', 'store', 'destroy']);
});
