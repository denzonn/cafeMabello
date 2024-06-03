<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topping;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Topping::all();

        return view('pages.admin.topping.index', compact('data'));
    }

    public function getData()
    {
        $topping = Topping::all();

        return DataTables::of($topping)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.topping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Topping::create($data);

        return redirect()->route('topping.index');
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
        $data = Topping::findOrFail($id);

        return view('pages.admin.topping.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        Topping::findOrFail($id)->update($data);

        return redirect()->route('topping.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topping::findOrFail($id)->delete();

        return redirect()->route('topping.index');
    }
}
