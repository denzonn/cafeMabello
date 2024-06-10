<?php

use App\Http\Controllers\Api\ToppingController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChairController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function() {
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('topping', [ToppingController::class, 'index']);
    Route::get('chairNumber', [ChairController::class, 'index']);
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/{category_id}', [ProductController::class, 'getByCategory']);

    Route::get('cart', [CartController::class, 'index']);
    Route::post('cart', [CartController::class, 'store']);
    Route::delete('cart/{id}', [CartController::class, 'destroy']);

    Route::post('cart/increment/{cart_id}', [CartController::class, 'increment']);
    Route::post('cart/decrement/{cart_id}', [CartController::class, 'decrement']);

    Route::get('transaction/{type}', [TransactionController::class, 'index']);
    Route::post('transaction', [TransactionController::class, 'store']);
});
