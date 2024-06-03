@extends('layouts.app')

@section('title')
    Transaksi
@endsection

@section('content')
        <div class="bg-white p-8 rounded-md text-gray-500">
            <div class="pt-4">
                <table id="paidTable" class="w-full">
                    <thead class="text-left">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-3/12">
                                Kode Transaksi</th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                User</th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                Nomor Meja</th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                Total Harga</th>
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
            $('#paidTable').DataTable({
                processing: true,
                ajax: "{{ route('dataPaid') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'code_transaction',
                        name: 'code_transaction'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'chair.number',
                        name: 'chair.number'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let editUrl = '{{ route('confirm-transaction', ':id') }}';
                            editUrl = editUrl.replace(':id', data);
                            return '<div class="flex">' +
                                '<a href="' + editUrl +
                                '" class="bg-yellow-500 px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Lihat Detail</a>'
                        }
                    },
                ]
            })
        })
    </script>
@endpush
