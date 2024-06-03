@extends('layouts.app')

@section('title')
    Topping
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <a href="{{ route('topping.create') }}" class="px-6 py-3 bg-primary rounded-md text-white">
            Tambah Topping
        </a>
        <div class="pt-4">
            <table id="toppingTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                            Nama Topping</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            Harga
                        </th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#toppingTable').DataTable({
                processing: true,
                ajax: "{{ route('toppingData') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let editUrl = '{{ route('topping.edit', ':id') }}';
                            let deleteUrl = '{{ route('topping.destroy', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            deleteUrl = deleteUrl.replace(':id', data);
                            return '<div class="flex">' +
                                '<a href="' + editUrl +
                                '" class="bg-yellow-500 px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Edit</a>' +
                                '<form action="' + deleteUrl + '" method="POST" class="d-inline">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button class="bg-red-500 text-white px-3 text-sm py-1 rounded-md" onclick="return confirm(\'Yakin ingin menghapus data?\')" type="submit">Delete</button>' +
                                '</form>' +
                                '</div>';
                        }
                    },
                ]
            })
        })
    </script>
@endpush
