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
            <x-sidebar.sidebar-buyer active="home" />
        @endif

        <!-- Content -->
        <main div class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">

            <!-- Genre -->
            <section
                x-data="{ open:false, colors:['bg-pink-600', 'bg-pink-700', 'bg-indigo-600' , 'bg-indigo-700', 'bg-yellow-600', 'bg-yellow-700', 'bg-red-600', 'bg-red-700', 'bg-green-600', 'bg-green-700', 'bg-blue-600', 'bg-blue-700'] }"
                class="max-w-6xl flex space-x-4">

                @foreach ($showedGenres as $showedGenre)
                    <a href="{{ route('genres.show', $showedGenre->idGenre) }}"
                        class="rounded-lg px-4 py-3 text-white font-semibold text-sm opacity-95"
                        :class="colors[Math.floor(Math.random() * colors.length)]">{{ $showedGenre->namaGenre }}</a>
                @endforeach
                <button class="flex items-center space-x-1" type="button" x-on:click="open = true">
                    <p>More Genres</p>
                    <x-icons.chevron-right class="w-5 h-5" />
                </button>
                <!-- Genres  Modals -->
                <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50 shadow-lg"
                    x-show="open">
                    <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                    <div class=" bg-gray-800 w-11/12 md:max-w-3xl mx-auto rounded-xl shadow-lg z-50  overflow-auto h-96"
                        x-on:click.away="open = false">
                        <div class="px-6 py-4 space-y-2 ">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-6">
                                <p class="text-2xl font-bold">Genres</p>
                                <div class="cursor-pointer" x-on:click="open = false">
                                    <x-icons.close class="w-6 h-6" />
                                </div>
                            </div>
                            <!--Body-->

                            <div class="flex flex-wrap">
                                @foreach ($genres as $genre)
                                    <a href="{{ route('genres.show', $genre->idGenre) }}"
                                        class="rounded-lg px-4 py-3 text-white font-semibold text-sm block m-1 opacity-95"
                                        :class="colors[Math.floor(Math.random() * colors.length)]">{{ $genre->namaGenre }}</a>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- Tabs -->
            <section class="flex justify-between items-center max-w-6xl pt-8 pl-2">
                <div class="flex space-x-5 text-gray-500">
                    <a href="{{ route('landingPage') }}?q={{ $q }}"
                        class="px-4 py-2 font-bold focus:outline-none border-t-4 border-green-500 text-gray-50">Latest</a>
                    <a href="{{ route('landingPageSort') }}?q={{ $q }}&sortby=cheapest"
                        class="px-4 py-2 font-bold focus:outline-none">Cheapest</a>
                    <a href="{{ route('landingPageSort') }}?q={{ $q }}&sortby=mostSales"
                        class="px-4 py-2 font-bold focus:outline-none">Most Sales</a>
                </div>
            </section>

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
                {{ $books->onEachSide(1)->links('pagination.defaultPagination', ['req' => "&q=$q"]) }}
            </section>
        </main>
    </div>
@endsection
