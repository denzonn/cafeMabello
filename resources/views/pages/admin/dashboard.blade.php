@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="bg-white p-8 rounded-md text-gray-500">
    <div class=" font-semibold text-primary text-4xl">Dashboard</div>
    <div class=" mt-4 mb-2 text-3xl font-semibold ">Transaksi</div>
    <div class="grid grid-cols-4 gap-4">
        <div class="bg-secondary rounded-md p-4 text-third">
            <div class="text-2xl font-semibold">Proses</div>
            <div class="text-6xl font-semibold">{{ $proses }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-secondary rounded-md p-4 text-third">
            <div class="text-2xl font-semibold">Belum Bayar</div>
            <div class="text-6xl font-semibold">{{ $unpaid }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-secondary rounded-md p-4 text-third">
            <div class="text-2xl font-semibold">Selesai</div>
            <div class="text-6xl font-semibold">{{ $paid }} <span class="text-lg font-medium">data</span></div>
        </div>
        <div class="bg-secondary rounded-md p-4 text-third">
            <div class="text-2xl font-semibold">Dibatalkan</div>
            <div class="text-6xl font-semibold">{{ $cancel }} <span class="text-lg font-medium">data</span></div>
        </div>
    </div>
</div>
@endsection
