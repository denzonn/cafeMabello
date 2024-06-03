<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChairNumber;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChairNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.chair.index');
    }

    public function getData()
    {
        $chair = ChairNumber::all();

        return DataTables::of($chair)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.chair.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['status'] = false;

        ChairNumber::create($data);

        return redirect()->route('chair-number.index');
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
        $data = ChairNumber::findOrFail($id);

        return view('pages.admin.chair.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        ChairNumber::findOrFail($id)->update($data);

        return redirect()->route('chair-number.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChairNumber::findOrFail($id)->delete();

        return redirect()->route('chair-number.index');
    }
}
