<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChairNumberController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ToppingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Cashier\ProductController as CashierProductController;
use App\Http\Controllers\Cashier\TransactionController as CashierTransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/user', function () {
        return view('user');
    })->name('user');
});

Route::get('get-transaction-proses', [CashierTransactionController::class, 'dataProses'])->name('dataProses');
Route::get('get-transaction-unpaid', [CashierTransactionController::class, 'dataUnpaid'])->name('dataUnpaid');
Route::get('get-transaction-paid', [CashierTransactionController::class, 'dataPaid'])->name('dataPaid');
Route::get('get-transaction-cancel', [CashierTransactionController::class, 'dataCancel'])->name('dataCancel');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('chair-number', ChairNumberController::class);
    Route::resource('product', ProductController::class);
    Route::resource('topping', ToppingController::class);

    Route::get('transaction-proses', [TransactionController::class, 'proses'])->name('transaction-proses');
    Route::get('transaction-unpaid', [TransactionController::class, 'unpaid'])->name('transaction-unpaid');
    Route::get('transaction-paid', [TransactionController::class, 'paid'])->name('transaction-paid');
    Route::get('transaction-cancel', [TransactionController::class, 'cancel'])->name('transaction-cancel');
    Route::get('transaction-detail/{id}', [TransactionController::class, 'detail'])->name('transaction-detail');

    Route::get('get-chair', [ChairNumberController::class, 'getData'])->name('chairData');
    Route::get('get-product', [ProductController::class, 'getData'])->name('productData');
    Route::get('get-category', [CategoryController::class, 'getData'])->name('categoryData');
    Route::get('get-topping', [ToppingController::class, 'getData'])->name('toppingData');
});

Route::prefix('cashier')->middleware(['auth', 'isCashier'])->group(function () {
    Route::get('product', [CashierProductController::class, 'index'])->name('product-cashier-index');
    Route::put('product/{id}', [CashierProductController::class, 'update'])->name('product-cashier-update');

    Route::get('get-cashier-product', [CashierProductController::class, 'getData'])->name('productCashierData');

    Route::get('transaction-proses', [CashierTransactionController::class, 'proses'])->name('transaction-cashier-proses');
    Route::get('transaction-unpaid', [CashierTransactionController::class, 'unpaid'])->name('transaction-cashier-unpaid');
    Route::get('transaction-paid', [CashierTransactionController::class, 'paid'])->name('transaction-cashier-paid');
    Route::get('transaction-cancel', [CashierTransactionController::class, 'cancel'])->name('transaction-cashier-cancel');

    Route::get('transaction/confirm/{id}', [CashierTransactionController::class, 'confirmTransaction'])->name('confirm-transaction');
    Route::post('transaction/accept/{id}', [CashierTransactionController::class, 'acceptTransaction'])->name('accept-transaction');
    Route::post('transaction/reject/{id}', [CashierTransactionController::class, 'rejectTransaction'])->name('reject-transaction');
    Route::post('transaction/finish/{id}', [CashierTransactionController::class, 'finishTransaction'])->name('finish-transaction');
});

require __DIR__ . '/auth.php';
