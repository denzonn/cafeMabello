@extends('layouts.app')

@section('title')
    Buat Kategori
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Tambahkan Kategori</div>
        <div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Nama Kategori</label>
                    <input type="text" placeholder="Masukkan Nama Kategori" name="name"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-4 text-white py-2 text-lg">Tambah Kategori</button>
            </form>
        </div>
    </div>
@endsection
