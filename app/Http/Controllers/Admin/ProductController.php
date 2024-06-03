<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();

        return view('pages.admin.product.index', compact('data'));
    }

    public function getData()
    {
        $product = Product::with(['category'])->get();

        return DataTables::of($product)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('pages.admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'photo' => 'required|image',
        ]);

        if ($request->hasFile('photo')) {
            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = $data['name'] . "-" . uniqid() . "." . $extension;

            $data['photo'] = $images->storeAs('product', $file_name, 'public');
        }

        $data['is_active'] = true;

        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);
        $category = Category::all();

        return view('pages.admin.product.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'photo' => 'image|max:5012',
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($product->photo);

            $images = $request->file('photo');

            $extension = $images->getClientOriginalExtension();

            $file_name = $data['name'] . "-" . uniqid() . "." . $extension;

            $data['photo'] = $images->storeAs('product', $file_name, 'public');
        }

        $product->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        Storage::disk('public')->delete($product->photo);

        $product->delete();

        return redirect()->route('product.index');
    }
}
