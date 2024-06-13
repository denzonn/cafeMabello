<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\ChairNumber;
use App\Models\Transaction;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    public function proses()
    {
        return view('pages.cashier.transaction-proses');
    }
    public function unpaid()
    {
        return view('pages.cashier.transaction-unpaid');
    }
    public function paid()
    {
        return view('pages.cashier.transaction-paid');
    }
    public function cancel()
    {
        return view('pages.cashier.transaction-cancel');
    }

    public function dataProses()
    {
        $proses = Transaction::where('status', 'PROSES')->with(['user', 'chair'])->get();

        return DataTables::of($proses)->make(true);
    }

    public function dataUnpaid()
    {
        $unpaid = Transaction::where('status', 'UNPAID')->with(['user', 'chair'])->get();

        return DataTables::of($unpaid)->make(true);
    }

    public function dataPaid()
    {
        $paid = Transaction::where('status', 'PAID')->with(['user', 'chair'])->get();

        return DataTables::of($paid)->make(true);
    }

    public function dataCancel()
    {
        $cancel = Transaction::where('status', 'CANCEL')->with(['user', 'chair'])->get();

        return DataTables::of($cancel)->make(true);
    }

    public function confirmTransaction($id)
    {
        $data = Transaction::with(['user', 'chair', 'detailTransaction.detailTransactionAddTopping.topping'])->where('id', $id)->first();

        return view('pages.cashier.confirm-transaction', compact('data'));
    }

    public function acceptTransaction($id)
    {
        $data = Transaction::findOrFail($id);

        $data->status = 'UNPAID';
        $data->save();

        return redirect()->route('transaction-cashier-unpaid')->with('success', 'Pesanan berhasil dikonfirmasi!');
    }

    public function rejectTransaction($id)
    {
        $data = Transaction::findOrFail($id);

        ChairNumber::where('id', $data->chair_id)->update([
            'status' => '0'
        ]);

        $data->status = 'CANCEL';
        $data->save();

        return redirect()->route('transaction-cashier-cancel')->with('success', 'Pesanan berhasil dibatalkan!');
    }

    public function finishTransaction($id)
    {
        $data = Transaction::findOrFail($id);

        ChairNumber::where('id', $data->chair_id)->update([
            'status' => '0'
        ]);

        $data->status = 'PAID';
        $data->save();

        return redirect()->route('transaction-cashier-paid')->with('success', 'Pesanan berhasil dikonfirmasi!');
    }
}
