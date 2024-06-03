@extends('layouts.app')

@section('title')
    Buat Topping
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Tambahkan Topping</div>
        <div>
            <form action="{{ route('topping.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Topping</label>
                        <input type="text" placeholder="Masukkan Nama Topping" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Harga Topping</label>
                        <input type="number" placeholder="Masukkan Harga Topping" name="price"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                </div>
                <button type="submit" class="w-full rounded-md bg-primary mt-4 text-white py-2 text-lg">Tambah Topping</button>
            </form>
        </div>
    </div>
@endsection
