@extends('layouts.app')

@section('title')
    Ubah Kategori
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Ubah Kategori</div>
        <div>
            <form action="{{ route('category.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Nama Kategori</label>
                    <input type="text" placeholder="Masukkan Nama Kategori" name="name"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->name }}" required />
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-4 text-white py-2 text-lg">Add SOP</button>
            </form>
        </div>
    </div>
@endsection
