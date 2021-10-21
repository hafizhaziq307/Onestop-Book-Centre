@extends('layouts.layout')

@section('content')
    @php
    use App\Models\OrderDetails;
    use Carbon\Carbon;
    @endphp

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.seller-nav />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-seller active="order" />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="My Sales" />

            <!-- Tab -->
            <section class="flex items-center max-w-6xl px-2 pt-8">
                <div class="space-x-5 text-gray-500">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 font-bold focus:outline-none ">To
                        Ship</a>
                    <a href="{{ route('orders.sort') }}"
                        class="px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">Shipping</a>
                </div>
            </section>

            @forelse ($orders as $order)
                <section class="max-w-6xl bg-gray-900 rounded-lg p-4 space-y-2 divide-y-2 divide-gray-500 divide-solid">
                    <!-- Seller Name -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10">
                                <img src="{{ asset('uploads/buyer/' . $order->gambarPembeli) }}" alt="img"
                                    class="rounded-full w-full h-full">
                            </div>
                            <p class="font-bold text-lg">{{ $order->namaPembeli }}</p>
                        </div>
                        <div class="flex space-x-1 items-center text-lg font-bold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <p>Receive</p>
                        </div>
                    </div>

                    <!-- Items -->
                    @php
                        $orderDetails = OrderDetails::getOrderDetails($order->idPesanan);
                    @endphp
                    <div>
                        <a href="{{ route('orders.show', $order->idPesanan) }}">
                            @foreach ($orderDetails as $orderDetail)
                                <div class="flex justify-between py-2 px-6 items-center text-lg">
                                    <div class="flex space-x-6">
                                        <div class="w-20">
                                            <img class="rounded-lg w-full h-full"
                                                src="{{ asset('uploads/book/' . $orderDetail->gambarBuku) }}">
                                        </div>
                                        <div class="space-y-2">
                                            <p class="text-xl">{{ $orderDetail->tajukBuku }}</p>
                                            <p>RM {{ number_format($orderDetail->hargaBuku, 2) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between w-56">
                                        <p>x{{ $orderDetail->kuantitiPesanan }}</p>
                                        <p>RM {{ number_format($orderDetail->jumlahHargaBuku, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </a>
                    </div>

                    <!-- Order Total -->
                    <div class="pr-3 pt-3 space-y-6">
                        <div class="flex justify-end text-3xl pb-2">
                            <p>Order Total:&nbsp;&nbsp;&nbsp;</p>
                            <p>RM {{ number_format($order->hargaPesanan, 2) }}</p>
                        </div>
                    </div>
                </section>
            @empty
                <section class="max-w-6xl grid place-items-center bg-gray-900 h-32 rounded-lg">
                    <p class="text-3xl">No Order</p>
                </section>
            @endforelse
        </main>
    </div>
@endsection
