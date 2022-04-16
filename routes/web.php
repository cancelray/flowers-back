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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/payment-and-delivery', [App\Http\Controllers\PaymentAndDeliveryController::class, 'index']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index']);
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index']);
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index']);

Route::get('/product-card', [App\Http\Controllers\ProductCardController::class, 'index']);

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index']);

Route::get('/payment-success', [App\Http\Controllers\PaymentSuccessController::class, 'index']);
Route::get('/payment-error', [App\Http\Controllers\PaymentErrorController::class, 'index']);

