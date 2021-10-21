@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    @php
    use App\Models\OrderDetails;
    @endphp

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer active="order" />

        <!-- Content -->
        <div class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">

            <x-title message="Order Status" />

            <!-- Tabs -->
            <section class="flex justify-between items-center max-w-6xl px-2 pt-8">
                <div class="space-x-5 text-gray-500">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 font-bold focus:outline-none">To Ship</a>
                    <a href="{{ route('orders.sort') }}"
                        class=" px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">To
                        Receive</a>
                </div>
                <a href="{{ route('orders.history') }}" class="hover:underline font-bold text-lg">
                    Order History
                </a>
            </section>

            <!-- Items -->
            @forelse ($orders as $order)
                <section
                    class="max-w-6xl rounded-lg bg-gray-900 p-4 space-y-2 divide-y-2 divide-gray-500 divide-solid px-6 py-3">
                    <!-- Seller Name -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <x-icons.shop class="w-6 h-6" />
                            <p class="font-bold text-xl">{{ $order->namaPenjual }}</p>
                        </div>
                        <div class="capitalize text-xl font-bold">To {{ $order->statusPesanan }}</div>
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
                    <div class="pr-3 pt-3 space-y-6 pb-2">
                        <div class="flex justify-end text-3xl">
                            <p>Order Total:&nbsp;&nbsp;&nbsp;</p>
                            <p>RM {{ number_format($order->hargaPesanan, 2) }}</p>
                        </div>
                        <form action="{{ route('orders.update', $order->idPesanan) }}" method="POST"
                            class="flex justify-end">
                            @csrf
                            @method('PATCH')
                            <button class="px-6 py-2 rounded-lg bg-green-600 font-bold text-lg">Order Received</button>
                        </form>
                    </div>
                </section>
            @empty
                <section class="max-w-6xl grid place-items-center bg-gray-900 h-32 rounded-lg">
                    <p class="text-3xl">No Order</p>
                </section>
            @endforelse
        </div>
    </div>
@endsection
