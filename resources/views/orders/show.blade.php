@extends('layouts.layout')

@section('content')

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        @if (session('id') == null)
            <div></div>
        @else
            <x-sidebar.sidebar-buyer />
        @endif

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">

            <div class="space-y-7">

                <section class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-5">
                    <div class="text-xl font-bold text-right">OrderID: {{ $order->idPesanan }}</div>

                    <!-- Progress bar order -->
                    @if ($rating->markahPenilaian > 0)
                        <x-progressbar.order-buyer currentStatus="rated" />
                    @else
                        <x-progressbar.order-buyer currentStatus="{{ $order->statusPesanan }}" />
                    @endif
                </section>

                <!-- Address -->
                <section class="grid grid-cols-7 gap-4 max-w-6xl">
                    <div class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-2 col-span-5">
                        <div class="flex items-center space-x-2">
                            <x-icons.address class="w-6 h-6" />
                            <p class="text-2xl font-bold">Delivery Address</p>
                        </div>
                        <div class="px-8 text-lg">
                            <p class="font-bold">{{ $address->namaPenerima }}</p>
                            <p class="font-bold">+6<span>{{ $address->noTel }}</span></p>

                            <p>{{ $address->butiranAlamat }}</p>
                            <p>{{ $address->daerah }}, {{ $address->poskod }} {{ $address->negeri }}</p>
                        </div>
                    </div>

                    <div class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-4 col-span-2">
                        <div class="flex items-center space-x-2">
                            <x-icons.truck class="w-6 h-6" />
                            <div class="text-2xl font-bold">Shipping Option</div>
                        </div>
                        <div>
                            <ul class="text-xl list-disc px-8">
                                <li>{{ $courier->namaKurier }}</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Order -->
                <section
                    class="max-w-6xl rounded-lg p-4 bg-gray-900 divide-y-4 divide-gray-600 divide-solid px-6 py-3 space-y-2">
                    <!-- Seller Name -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <x-icons.shop class="w-6 h-6" />
                            <a href="{{ route('sellers.show', $order->idPenjual) }}"
                                class="font-bold text-xl">{{ $order->namaPenjual }}</a>
                        </div>
                        <div class="capitalize text-xl font-bold">
                            @if ($order->statusPesanan == 'completed')
                                {{ $order->statusPesanan }}
                            @else
                                To {{ $order->statusPesanan }}
                            @endif
                        </div>
                    </div>
                    <!-- Order items -->
                    @foreach ($orderDetails as $orderDetail)
                        <div class="flex justify-between py-2 px-6 items-center text-lg">
                            <div class="flex space-x-6">
                                <div class="w-20">
                                    <img class="rounded-lg w-full h-full"
                                        src="{{ asset('uploads/book/' . $orderDetail->gambarBuku) }}">
                                </div>
                                <div class="space-y-2">
                                    <a href="{{ route('books.show', $orderDetail->idBuku) }}"
                                        class="text-xl">{{ $orderDetail->tajukBuku }}</a>
                                    <p>RM {{ number_format($orderDetail->hargaBuku, 2) }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-56">
                                <p>x{{ $orderDetail->kuantitiPesanan }}</p>
                                <p>RM {{ number_format($orderDetail->jumlahHargaBuku, 2) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Order Total -->
                    <div class="grid grid-cols-8 text-right text-lg py-2 px-6">
                        <div class="col-span-6">Books subTotal:</div>
                        <div class="col-span-2">RM {{ number_format($order->subHargaPesanan, 2) }}</div>

                        <div class="col-span-6">{{ $courier->namaKurier }}:</div>
                        <div class="col-span-2">RM {{ number_format($courier->hargaKurier, 2) }}</div>

                        <div class="col-span-6 text-3xl mt-5">Order Total:</div>
                        <div class="col-span-2 text-3xl mt-5">RM {{ number_format($order->hargaPesanan, 2) }}</div>
                    </div>
                </section>
            </div>
        </main>
    @endsection
