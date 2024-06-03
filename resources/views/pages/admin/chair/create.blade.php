@extends('layouts.app')

@section('title')
    Buat Nomor Meja
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Tambahkan Nomor Meja</div>
        <div>
            <form action="{{ route('chair-number.store') }}" method="POST">
                @csrf
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Nomor Meja</label>
                    <input type="text" placeholder="Masukkan Nomor Meja" name="number"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-4 text-white py-2 text-lg">Tambah Nomor Meja</button>
            </form>
        </div>
    </div>
@endsection
