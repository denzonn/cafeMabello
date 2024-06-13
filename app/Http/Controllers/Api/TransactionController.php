<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ChairNumber;
use App\Models\DetailTransaction;
use App\Models\DetailTransactionAddTopping;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends BaseController
{
    public function index($type)
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', $type)->with(['chair', 'detailTransaction.product', 'detailTransaction.detailTransactionAddTopping.topping'])->get();

        if ($transaction->isEmpty()) {
            return $this->sendError('Transaction Not Found');
        }

        return $this->sendResponse($transaction, 'Success Get Transaction');
    }

    private function generateRandomCodeTransaction()
    {
        $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $numbers = substr(str_shuffle('0123456789'), 0, 3);

        return $letters . $numbers;
    }

    public function store(Request $request)
    {
        $data = Cart::where('user_id', Auth::user()->id)->with(['product', 'cartDetail'])->get();

        $totalPrice = 0;

        foreach ($data as $item) {
            $totalPrice += $item->product->price * $item->quantity;

            if ($item->cartDetail) {
                foreach ($item->cartDetail as $detail) {
                    $totalPrice += $detail->topping->price;
                }
            }
        }

        $transaction = Transaction::create([
            'code_transaction' => $this->generateRandomCodeTransaction(),
            'chair_id' => $request->input('chair_id'),
            'user_id' => Auth::user()->id,
            'total_price' => $totalPrice,
            'status' => 'PROSES'
        ]);

        foreach ($data as $item) {
            $detailTransaction = DetailTransaction::create([
                'product_id' => $item->product->id,
                'transaction_id' => $transaction->id,
                'quantity' => $item->quantity
            ]);

            foreach($item->cartDetail as $detail){
                DetailTransactionAddTopping::create([
                    'detail_transaction_id' => $detailTransaction->id,
                    'topping_id' => $detail->topping_id
                ]);
            }
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        ChairNumber::where('id', $request['chair_id'])->update([
            'status' => 1
        ]);

        return $this->sendResponse($data, 'Success Create Transaction');
    }
}
