@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        <x-headers.guest-nav query="" />
    @else
        <x-headers.buyer-nav query="" />
    @endif

    @php
    use App\Models\OrderDetails;
    use App\Models\Rate;
    @endphp

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        @if (session('id') == null)
            <div></div>
        @else
            <x-sidebar.sidebar-buyer />
        @endif

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <section class="max-w-6xl rounded-lg bg-gray-900 p-4">
                <div class="flex space-x-6">
                    <div class="rounded-full p-1 gradient-green">
                        <img class="rounded-full w-28 h-28" src="{{ asset('uploads/seller/' . $seller->gambarPenjual) }}"
                            alt="img">
                    </div>
                    <div class="space-y-4">
                        <p class="text-2xl">{{ $seller->namaPenjual }}</p>
                        <div class="space-y-1">
                            <div class="flex items-center space-x-4">
                                <x-icons.book class="w-6 h-6" />
                                <p>Book: {{ $totalBook }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <x-icons.user class="w-6 h-6" />
                                <p>Joined: {{ $joinedDate }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tabs -->
            <section class="flex justify-between items-center max-w-6xl pt-8 pl-2 ">
                <div class="flex space-x-5 text-gray-500 ">
                    <a href="{{ route('sellers.show', $seller->idPenjual) }}"
                        class="px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">Latest</a>
                    <a href="{{ route('sellers.sort', $seller->idPenjual) }}?sortby=cheapest"
                        class="px-4 py-2 font-bold focus:outline-none">Cheapest</a>
                    <a href="{{ route('sellers.sort', $seller->idPenjual) }}?sortby=mostSales"
                        class="px-4 py-2 font-bold focus:outline-none">Most Sales</a>
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
                <section class="bg-gray-900 max-w-6xl mx-auto font-bold text-2xl text-center py-7 rounded-lg">No Books Found
                </section>
            @endif

            <!-- pagination -->
            <section class="max-w-6xl mx-auto">
                {{ $books->links('pagination.defaultPagination', ['q' => '']) }}
            </section>
        </main>
    </div>
@endsection
