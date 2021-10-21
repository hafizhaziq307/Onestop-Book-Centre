@extends('layouts.layout')

@section('content')

    @php
    use App\Models\OrderDetails;
    use App\Models\Rate;
    @endphp

    @if (session('id') == null)
        <x-headers.guest-nav query="{{ $q }}" />
    @else
        <x-headers.buyer-nav query="{{ $q }}" />
    @endif

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        @if (session('id') == null)
            <div></div>
        @else
            <x-sidebar.sidebar-buyer />
        @endif

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="Search Results" />

            <!-- Tabs -->
            <section class="flex justify-between items-center max-w-6xl pt-8 pl-2">
                <div class="flex space-x-5 text-gray-500">
                    <a href="{{ route('books.search') }}?q={{ $q }}"
                        class="px-4 py-2 font-bold focus:outline-none ">Latest</a>
                    @if ($sortby == 'cheapest')
                        <a href="{{ route('books.sort') }}?q={{ $q }}&sortby=cheapest"
                            class="px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">Cheapest</a>
                        <a href="{{ route('books.sort') }}?q={{ $q }}&sortby=mostSales"
                            class="px-4 py-2 font-bold focus:outline-none">Most Sales</a>
                    @else
                        <a href="{{ route('books.sort') }}?q={{ $q }}&sortby=cheapest"
                            class="px-4 py-2 font-bold focus:outline-none">Cheapest</a>
                        <a href="{{ route('books.sort') }}?q={{ $q }}&sortby=mostSales"
                            class="px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">Most
                            Sales</a>
                    @endif
                </div>
                <div class="pr-10">{{ $books->total() }} Books found</div>
            </section>

            <!-- Books -->
            @if ($books->isNotEmpty())
                <section class=" grid grid-cols-2 gap-5 max-w-6xl">
                    @foreach ($books as $book)
                        @php
                            $rating = Rate::getAvgRating($book->idBuku);
                            $sold = OrderDetails::getTotalSoldBook($book->idBuku);
                        @endphp
                        <form action="{{ route('books.show', $book->idBuku) }}" method="GET">
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
            @else
                <section class="max-w-6xl grid place-items-center bg-gray-900 h-32 rounded-lg">
                    <p class="text-3xl">No books found</p>
                </section>
            @endif

            <!-- pagination -->
            <section class="max-w-6xl">
                {{ $books->links('pagination.defaultPagination', ['req' => "&q=$q&sortby=$sortby"]) }}
            </section>
        </main>
    </div>
@endsection
