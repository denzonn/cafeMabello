@extends('layouts.app')

@section('title')
    Nomor Meja
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500">
        <a href="{{ route('chair-number.create') }}" class="px-6 py-3 bg-primary rounded-md text-white">
            Tambah Nomor Meja
        </a>
        <div class="pt-4">
            <table id="chairTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                            Nomor Meja</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                            Status
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
            $('#chairTable').DataTable({
                processing: true,
                ajax: "{{ route('chairData') }}",
                columns: [
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            return data === 1 ? 'Meja Terpakai' : 'Meja Kosong';
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let editUrl = '{{ route('chair-number.edit', ':id') }}';
                            let deleteUrl = '{{ route('chair-number.destroy', ':id') }}';
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
