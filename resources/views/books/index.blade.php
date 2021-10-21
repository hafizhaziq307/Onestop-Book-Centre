@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif

    @php
    use App\Models\OrderDetails;
    use App\Models\Rate;
    @endphp

    <x-headers.seller-nav />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-seller active="product" />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-9/12">
            <section class="flex justify-between items-center pr-7">
                <div>
                    <x-title message="My Products" />
                </div>
                <form action="{{ route('books.create') }}" method="GET">
                    <button class="flex items-center space-x-1 rounded-lg bg-blue-600 px-4 py-2 font-bold">
                        <x-icons.plus class="w-5 h-5" />
                        <p>New Product</p>
                    </button>
                </form>
            </section>

            @if (session('msg') != '')
                <x-alert type="success" message="{{ session('msg') }}" />
            @endif

            <!-- Product List -->
            <section class=" grid grid-cols-2 gap-5 ">
                @foreach ($books as $book)
                    @php
                        $rating = Rate::getAvgRating($book->idBuku);
                        $sold = OrderDetails::getTotalSoldBook($book->idBuku);
                    @endphp
                    <form action="{{ route('books.edit', $book->idBuku) }}" method="GET">
                        <button x-data="{ bookStock: {{ $book->stokBuku }} }"
                            class="bg-gray-900 rounded-lg text-left flex"
                            :class="(bookStock > 0) ? 'opacity-90 hover:opacity-100' : 'opacity-60'">
                            <!-- Book image -->
                            <img class="rounded-lg w-32 h-40" src="{{ asset('uploads/book/' . $book->gambarBuku) }}">
                            <!-- Book info -->
                            <div class="space-y-2 m-3 relative">
                                <p class="text-lg truncate w-96">{{ $book->tajukBuku }}</p>
                                <p class="text-lg">RM {{ number_format($book->hargaBuku, 2) }}</p>

                                <!-- Rating -->
                                <div class="flex items-center">
                                    @if ($rating->average != null)
                                        <div class="space-x-1 flex">
                                            <x-rating-stars ratingScore="{{ $rating->average }}" class="w-5 h-5" />
                                            <p>{{ $rating->average }}</p>
                                        </div>
                                    @else
                                        <p>No rating yet</p>
                                    @endif
                                </div>

                                <p class="absolute bottom-0 left-0">{{ $sold }} sold</p>
                                @if ($book->stokBuku > 0)
                                    <p class="absolute bottom-0 right-0">{{ $book->stokBuku }}
                                        pieces left
                                    </p>
                                @else
                                    <p class="bg-red-600 absolute bottom-0 right-0 font-semibold px-2 rounded-full">
                                        Sold out
                                    </p>
                                @endif
                            </div>
                        </button>
                    </form>
                @endforeach
            </section>
        </main>
    </div>
@endsection
