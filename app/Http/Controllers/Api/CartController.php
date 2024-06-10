<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    public function index()
    {
        $data = Cart::where('user_id', Auth::user()->id)->with(['product', 'cartDetail.topping'])->get();

        if ($data->isEmpty()) {
            return $this->sendError('Cart Empty');
        }

        return $this->sendResponse($data, 'Success Get Data');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = Auth::user()->id;
        $data['user_id'] = $user;

        $cart = Cart::where('user_id', $user)
            ->where('product_id', $data['product_id'])
            ->first();

        if ($cart) {
            $cart->increment('quantity');

            if (isset($data['topping_id']) && is_array($data['topping_id'])) {
                foreach ($data['topping_id'] as $item) {
                    CartDetail::create([
                        'cart_id' => $cart->id,
                        'topping_id' => $item
                    ]);
                }
            }

            return $this->sendResponse($cart, 'Success Increment To Cart');
        } else {
            $newCart = Cart::create([
                'user_id' => $user,
                'product_id' => $data['product_id'],
                'quantity' => 1
            ]);

            if (isset($data['topping_id']) && is_array($data['topping_id'])) {
                foreach ($data['topping_id'] as $item) {
                    CartDetail::create([
                        'cart_id' => $newCart->id,
                        'topping_id' => $item
                    ]);
                }
            }

            return $this->sendResponse($newCart, 'Success Add To Cart');
        }
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (!$cart) {
            return $this->sendError('Cart Not Found');
        }

        $cart->delete();

        return $this->sendResponse($cart, 'Success Delete Cart');
    }

    public function increment($cart_id)
    {
        $data = Cart::findOrFail($cart_id);

        $data->increment('quantity');

        return $this->sendResponse($data, 'Success Increment Product in Cart');
    }

    public function decrement($cart_id)
    {
        $data = Cart::findOrFail($cart_id);

        if ($data['quantity'] > 1) {
            $data->decrement('quantity');
            return $this->sendResponse($data, 'Success Decrement Product in Cart');
        } else {
            $data->delete();
            return $this->sendResponse($data, 'Success Delete Product in Cart');
        }
    }
}
