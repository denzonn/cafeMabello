<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function proses() {
        return view('pages.admin.transaction.transaction-proses');
    }
    public function unpaid() {
        return view('pages.admin.transaction.transaction-unpaid');
    }
    public function paid() {
        return view('pages.admin.transaction.transaction-paid');
    }
    public function cancel() {
        return view('pages.admin.transaction.transaction-cancel');
    }

    public function detail($id) {
        $data = Transaction::with(['user', 'chair', 'detailTransaction.detailTransactionAddTopping.topping'])->where('id', $id)->first();

        return view('pages.admin.transaction.detail-transaction', compact('data'));
    }
}
