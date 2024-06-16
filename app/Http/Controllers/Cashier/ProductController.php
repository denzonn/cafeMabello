<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.cashier.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */

     public function getData()
    {
        $product = Product::with(['category'])->get();

        return DataTables::of($product)->make(true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::findOrFail($id);

        $data->is_active = !$data->is_active;

        $data->save();

        return redirect()->route('product-cashier-index');
    }
}
