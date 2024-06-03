@extends('layouts.app')

@section('title')
    Ubah Nomor Meja
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Ubah Nomor Meja</div>
        <div>
            <form action="{{ route('chair-number.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Nomor Meja</label>
                    <input type="text" placeholder="Masukkan Nomor Meja" name="number"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" value="{{ $data->number }}" required />
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-4 text-white py-2 text-lg">Ubah Nomor Meja</button>
            </form>
        </div>
    </div>
@endsection
