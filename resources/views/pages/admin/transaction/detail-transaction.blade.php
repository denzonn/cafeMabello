@extends('layouts.app')

@section('title')
    Transaksi
@endsection

@section('content')
    <div class="bg-white p-8 rounded-md text-gray-500 text-lg">
        <div class="flex flex-row gap-4 items-center">
            <div class="font-semibold text-2xl text-black w-[40%]">Detail Transaksi - {{ $data->code_transaction }}</div>
            <div class="w-[60%]">
                <div class="flex flex-row gap-4 justify-end">
                    @if ($data->status === 'PROSES')
                        <div>
                            <i class="fa-solid fa-cash-register text-primary text-4xl"></i>
                        </div>
                    @elseif ($data->status === 'UNPAID')
                        <div>
                            <i class="fa-solid fa-wallet text-primary text-4xl"></i>
                        </div>
                    @elseif ($data->status === 'PAID')
                        <div>
                            <i class="fa-solid fa-circle-check text-4xl text-green-400"></i>
                        </div>
                    @else
                        <div>
                            <i class="fa-solid fa-rectangle-xmark text-4xl text-red-400"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-6">
            <div class="text-xl font-semibold">
                Transaksi Data :
            </div>
            <div class="space-y-3 mt-2">
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">Nama Pemesan</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->user->name }}</div>
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">Nomor Meja</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->chair->number }}</div>
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">Total Pesanan</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">Rp. {{ $data->total_price }}</div>
                </div>
                <div class="flex flex-row gap-1">
                    <div class="w-[20%]">Catatan Pesanan</div>
                    <div class="w-[2%]">:</div>
                    <div class="w-[78%]">{{ $data->notes ?? "-" }}</div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <div class="text-xl font-semibold mb-4">
                Detail Menu :
            </div>
            @foreach ($data->detailTransaction as $item)
                <div class="flex flex-row gap-2 mb-4">
                    <div class="w-[20%]">
                        <img src="{{ Storage::url($item->product->photo) }}" alt="" class="w-full rounded-md">
                    </div>
                    <div class="w-[40%] space-y-2">
                        <div class="text-xl font-semibold">{{ $item->product->name }}</div>
                        <div class=" text-2xl font-semibold ">Rp. {{ $item->product->price }}</div>
                        <div class="">Jumlah : {{ $item->quantity }}</div>
                    </div>
                    <div class="w-[40%] space-y-2">
                        @if ($item->detailTransactionAddTopping && count($item->detailTransactionAddTopping) > 0)
                            <div>Tambahan Toping : </div>
                            @foreach ($item->detailTransactionAddTopping as $topping)
                                <div class="">{{ $topping->topping->name }} - Rp. {{ $topping->topping->price }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
        @endforeach

    </div>
@endsection
