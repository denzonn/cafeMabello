@extends('layouts.app')

@section('title')
    Menu
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <div class="pt-4">
            <table id="productTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Foto</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-3/12">
                            Nama</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Kategori</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Harga</th>
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
            $('#productTable').DataTable({
                processing: true,
                ajax: "{{ route('productCashierData') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        render: function(data, type, row, meta) {
                            return '<img src="{{ url('storage') }}/' + data +
                                '" alt="Product Image" class="w-full object-cover">';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name',
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            let editUrl = '{{ route('product-cashier-update', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            let buttonText = row.is_active == 1 ? 'Ready' : 'Not Ready';
                            let buttonClass = row.is_active == 1 ? 'bg-green-500' : 'bg-red-500';
                            return '<div class="flex">' +
                                '<form action="' + editUrl + '" method="POST" class="d-inline">' +
                                '@csrf' +
                                '@method('PUT')' +
                                '<button class="' + buttonClass +
                                ' text-white px-3 text-sm py-1 rounded-md mr-2" type="submit">' +
                                buttonText + '</button>' +
                                '</form>' +
                                '</div>';
                        }
                    },
                ]

            })
        })
    </script>
@endpush
