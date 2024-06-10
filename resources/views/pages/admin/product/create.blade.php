@extends('layouts.app')

@section('title')
    Buat Menu
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="text-xl font-semibold">Tambahkan Menu</div>
        <div>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Nama Menu</label>
                        <input type="text" placeholder="Masukkan Nama Menu" name="name"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Kategori Menu</label>
                        <select name="category_id" id="" class="bg-transparent border px-4 py-[10px] rounded-md">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Harga Menu</label>
                        <input type="number" placeholder="Masukkan Harga Menu" name="price"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <label for="">Foto Menu</label>
                        <input type="file" name="photo" class="w-full border px-4 py-2 rounded-md bg-transparent"
                            accept=".jpg, .jpeg, .png" required />
                    </div>
                </div>
                <div class="mt-6 flex flex-col gap-2">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="editor" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="w-full rounded-md bg-primary mt-8 text-white py-2 text-lg">Tambah
                    Menu</button>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
