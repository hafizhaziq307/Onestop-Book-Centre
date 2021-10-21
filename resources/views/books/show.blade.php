@extends('layouts.layout')

@section('content')

    @php
    use App\Models\OrderDetails;
    use App\Models\Rate;
    @endphp

    @if (session()->get('id') == null)
        <x-headers.guest-nav query="" />
    @else
        <x-headers.buyer-nav query="" />
    @endif

    <div class="w-full flex flex-wrap">

        <!-- Sidebar -->
        @if (session('id') == null)
            <div></div>
        @else
            @if (session('roles') == 'buyer')
                <x-sidebar.sidebar-buyer />
            @else
                <x-sidebar.sidebar-seller />
            @endif
        @endif

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">

            <section class="relative max-w-6xl bg-gray-900 rounded-lg p-4" x-data="{ open:false, count:1 }">
                <button type="button" class="absolute top-3 right-3">
                    <x-icons.edit class="w-8 h-8 text-gray-400 hover:text-gray-100" />
                </button>

                <div class="flex space-x-5">
                    <div class="flex w-72 h-80">
                        <img class="rounded-xl" src="{{ asset('uploads/book/' . $book->gambarBuku) }}" alt="img">
                    </div>

                    <div class="space-y-7">
                        <p class=" text-3xl max-w-3xl truncate">{{ $book->tajukBuku }}</p>
                        <div class=" flex space-x-4">
                            @php
                                $rating = Rate::getAvgRating($book->idBuku);
                                $sold = OrderDetails::getTotalSoldBook($book->idBuku);
                            @endphp
                            <div class="flex items-center space-x-1">
                                @if ($rating->average != null)
                                    <x-rating-stars ratingScore="{{ $rating->average }}" class="w-5 h-5" />
                                @else
                                    <p>No rating yet</p>
                                @endif
                            </div>
                            <p>{{ $sold }} Sold</p>
                        </div>
                        <div class="flex flex-wrap space-x-3 max-w-md">
                            <a href="{{ route('genres.show', $book->idGenre) }}"
                                class="bg-gray-700 px-4 py-0.5 rounded-md font-semibold">
                                {{ $book->namaGenre }}
                            </a>
                        </div>

                        <p class="text-lg">Uploaded: {{ $uploadTime }}</p>

                        <div class="flex space-x-5 items-center">
                            <div class="flex items-center bg-gray-700 rounded-lg">
                                <div class="bg-green-600 py-1.5 px-3 rounded-l-sm cursor-pointer"
                                    x-on:click="(count > 1) ? count-- : count;">
                                    <x-icons.minus class="w-4 h-6" />
                                </div>
                                <div class="w-12 text-center font-semibold" x-text="count"></div>
                                <div class="bg-green-600 py-1.5 px-3 rounded-l-sm cursor-pointer"
                                    x-on:click="(count < {{ $book->stokBuku }}) ? count++ : count;">
                                    <x-icons.plus class="w-4 h-6" />
                                </div>
                            </div>

                            <div>{{ $book->stokBuku }} pieces left</div>
                        </div>

                        <p class="text-3xl">RM {{ number_format($book->hargaBuku, 2) }}</p>
                    </div>
                </div>

                @if ($book->stokBuku)
                    @if (session('id') == null)
                        <!-- if not login -->
                        <div class="cursor-pointer green px-7 py-2.5 text-lg rounded-full font-bold absolute bottom-3 right-3"
                            x-on:click="open = true">Add to Cart</div>
                        <x-modals.login />
                    @else
                        <!-- if login -->
                        <form action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="qty" x-model="count">
                            <input type="hidden" name="book" value="{{ $book->idBuku }}">
                            @if ($book->statusBuku == 'available')
                                <button
                                    class="green px-7 py-2.5 text-lg rounded-full font-bold absolute bottom-3 right-3">Add
                                    to
                                    Cart</button>
                            @endif
                        </form>
                    @endif
                @else
                    <!-- if no stock -->
                    <div
                        class="cursor-not-allowed px-7 py-2.5 text-lg rounded-full font-bold absolute bottom-3 right-3 bg-red-600">
                        Sold out</div>
                @endif
            </section>

            <!-- Courier Info -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg space-y-6">
                <p class=" text-3xl font-semibold">Delivery Service</p>
                <div class="flex space-x-5">
                    @foreach ($couriers as $courier)
                        <div class="rounded-lg bg-gray-700 p-2 text-xl">{{ $courier->namaKurier }} RM
                            {{ number_format($courier->hargaKurier, 2) }}</div>
                    @endforeach
                </div>
            </section>

            <!-- Book Info -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg space-y-6">
                <p class=" text-3xl font-semibold">Book Details</p>
                <div class="grid grid-cols-2 text-lg gap-6 ">
                    <div><span class="font-semibold">ISBN: </span>{{ $book->isbnBuku }}</div>
                    <div><span class="font-semibold">Format: </span>Paperback</div>
                    <div><span class="font-semibold">Author: </span>{{ $book->pengarangBuku }}</div>
                    <div><span class="font-semibold">Dimensions: </span>{{ $book->ukuranBuku }} mm</div>
                    <div><span class="font-semibold">Publisher: </span> {{ $book->penerbitBuku }}</div>
                    <div><span class="font-semibold">Pages: </span>{{ $book->mukaSuratBuku }}</div>
                    <div><span class="font-semibold">Publication Date: </span>{{ $book->tarikhTerbitBuku }}</div>
                </div>
            </section>

            <!-- Book Description -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg space-y-6">
                <p class=" text-3xl font-semibold">Description </p>
                <p class="text-justify text-lg max-w-5xl">{{ $book->sinopsisBuku }}</p>
            </section>


            <!-- Seller Information -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg relative">
                <div class="flex space-x-6">
                    <div class="rounded-full p-1 gradient-green">
                        <img class="rounded-full w-24 h-24" src="{{ asset('uploads/seller/' . $book->gambarPenjual) }}"
                            alt="img">
                    </div>

                    <div class="space-y-4">
                        <p class="text-2xl">{{ $book->namaPenjual }}</p>
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
                <div class="absolute bottom-3 right-3">
                    <form action="{{ route('sellers.show', $book->idPenjual) }}">
                        <button class="green rounded-full px-8 py-2 font-bold">More</button>
                    </form>
                </div>
            </section>

            <!-- rating -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg space-y-6">
                <p class=" text-3xl font-semibold">Rating Details</p>

                <div class="space-x-1">
                    @if ($rating->average != null)
                        <div class="grid grid-cols-12 gap-2">
                            <!-- Average Ratings -->
                            <div class="col-span-3 p-1 bg-gray-700 rounded-lg space-y-1">
                                <p class="text-center text-3xl">{{ $rating->average }}</p>
                                <div class="flex justify-center">
                                    <x-rating-stars ratingScore="{{ $rating->average }}" class="text-center w-8 h-8" />
                                </div>
                                <p class="text-center text-xl">{{ $totalRater }} Ratings</p>
                            </div>
                            <!-- List rating -->
                            <div class="col-span-9 flex items-center justify-center space-x-6">
                                @for ($i = 0; $i < 5; $i++)
                                    @php
                                        $total = Rate::getRatingsPerGroup($book->idBuku, $i + 1);
                                    @endphp
                                    <div class="flex text-lg bg-gray-700 px-4 py-1 rounded-lg space-x-1">
                                        <div class="flex items-center">
                                            <p>{{ $i + 1 }}</p>
                                            <x-icons.star class="w-6 h-6 text-yellow-400" />
                                        </div>
                                        <p>({{ $total }})</p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    @else
                        <div class="max-w-6xl grid place-items-center bg-gray-700 h-32 rounded-lg">
                            <p class="text-3xl">No rating yet</p>
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection
