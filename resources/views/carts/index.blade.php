@extends('layouts.layout')

@section('content')

    @php
    use App\Models\Cart;
    @endphp

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer />

        <!-- Content -->
        <main class="max-w-6xl mt-28 ml-96 w-10/12">
            <header class="max-w-6xl text-center rounded-t-lg py-4 bg-green-600">
                <p class="text-2xl font-bold">Shopping Cart</p>
            </header>

            <form action="{{ route('checkouts.store') }}" method="POST" class="max-w-6xl bg-gray-900 space-y-5"
                x-data="{ total : 0 }">
                @if ($sellers->isNotEmpty())
                    @foreach ($sellers as $seller)
                        <section class="divide-y-2 divide-gray-500 divide-solid ">
                            <!-- Seller Name -->
                            <div class="py-3 px-6 flex items-center space-x-5">
                                {{-- <input type="checkbox" class="w-7 h-7"/> --}}
                                <a href="{{ route('sellers.show', $seller->idPenjual) }}"
                                    class="flex items-center font-bold space-x-1 text-lg">
                                    <x-icons.shop class="w-7 h-7" />
                                    <p>{{ $seller->namaPenjual }}</p>
                                </a>
                            </div>
                            <!-- Cart -->
                            @php
                                $items = Cart::getCarts(session('id'), $seller->idPenjual);
                            @endphp
                            <div>
                                @foreach ($items as $item)
                                    <div class="flex justify-between py-3 px-6">
                                        <!-- Image and Title -->
                                        <div class="flex space-x-10 items-center relative">
                                            <div class="flex space-x-6">
                                                @if ($item->stokBuku > 0)
                                                    <input type="checkbox" class="w-7 h-7 self-center cursor-pointer"
                                                        x-on:change="total = ($event.target.checked) ? total + {{ $item->hargaTroli }} : total - {{ $item->hargaTroli }}"
                                                        name="carts[]" value="{{ $item->idTroli }}">

                                                @else
                                                    <input type="checkbox"
                                                        class="w-7 h-7 self-center bg-gray-600 cursor-not-allowed"
                                                        x-on:change="total = ($event.target.checked) ? total + {{ $item->hargaTroli }} : total - {{ $item->hargaTroli }}"
                                                        name="carts[]" value="{{ $item->idTroli }}" disabled>
                                                @endif

                                                <img class="rounded-md w-36 h-52"
                                                    src="{{ asset('uploads/book/' . $item->gambarBuku) }}" alt="img">
                                                <div class="space-y-5">
                                                    <p class="text-2xl break-words max-w-xl">{{ $item->tajukBuku }}</p>
                                                    <p class="text-lg">RM {{ number_format($item->hargaBuku, 2) }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-16">
                                            <!-- Counter Button -->
                                            <div x-data="{ isShow : false }" class="flex items-center space-x-5">
                                                <p class="text-lg">{{ $item->stokBuku }} pieces left</p>
                                                <div class="flex items-center  rounded-lg" x-show="!isShow">
                                                    @if ($item->kuantitiTroli <= 1)
                                                        <div class="bg-green-600 py-1.5 px-3 cursor-pointer">
                                                            <x-icons.minus class="w-4 h-6" />
                                                        </div>
                                                    @else
                                                        <a href="{{ route('carts.update', $item->idTroli) }}?button=minus&qty={{ $item->kuantitiTroli }}"
                                                            class="bg-green-600 py-1.5 px-3">
                                                            <x-icons.minus class="w-4 h-6" />
                                                        </a>
                                                    @endif

                                                    <div
                                                        class="text-center bg-gray-700 w-14 cursor-pointer py-1 border-2 border-green-600">
                                                        {{ $item->kuantitiTroli }}</div>

                                                    @if ($item->kuantitiTroli < $item->stokBuku)
                                                        <a href="{{ route('carts.update', $item->idTroli) }}?button=plus&qty={{ $item->kuantitiTroli }}"
                                                            class="bg-green-600 py-1.5 px-3">
                                                            <x-icons.plus class="w-4 h-6" />
                                                        </a>
                                                    @else
                                                        <div class="bg-green-600 py-1.5 px-3 cursor-pointer">
                                                            <x-icons.plus class="w-4 h-6" />
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Delete  -->
                                            <div x-data="{ open : false }">
                                                <div class="cursor-pointer" x-on:click="open = true">
                                                    <x-icons.trash class="w-8 h-8 hover:text-red-400" />
                                                </div>
                                                <x-modals.delete-confirm-link
                                                    href="{{ route('carts.destroy', $item->idTroli) }}" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                    <!-- Checkout Price -->
                    <section class="flex justify-end py-3 px-6 items-center space-x-4">
                        <p class="text-3xl text-right">Total:&nbsp;&nbsp;RM <span x-text="total.toFixed(2)"></span></p>
                        <button
                            :class="(total<=0) ? 'bg-green-600 px-7 py-2.5 text-lg rounded-full font-bold opacity-50' : 'bg-green-600 px-7 py-2.5 text-lg rounded-full font-bold' "
                            :disabled="total<=0">Checkout</button>
                    </section>
                @else
                    <section class="grid place-items-center h-24 text-2xl font-bold">No Books in Cart</section>
                @endif
            </form>
        </main>
    </div>
@endsection
