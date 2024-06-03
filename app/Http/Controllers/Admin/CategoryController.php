<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

        return view('pages.admin.category.index', compact('data'));
    }

    public function getData()
    {
        $category = Category::all();

        return DataTables::of($category)->make(true);
    }

    public function create()
    {
        return view('pages.admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);

        return view('pages.admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $category = Category::findOrFail($id);

        $category->update($data);

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);

        $data->delete();

        return redirect()->route('category.index');
    }
}
