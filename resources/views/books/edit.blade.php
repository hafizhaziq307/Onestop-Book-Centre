@extends('layouts.layout')

@section('content')
    @if (session('id') == null)
        {{ redirect()->route('login')->send() }}
    @endif

    @php
    use App\Models\OrderDetails;
    use App\Models\Rate;
    @endphp

    <x-headers.seller-nav />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-seller />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-9/12">
            <x-title message="Edit Product" />

            @if (session('msg') != '')
                <x-alert type="success" message="{{ session('msg') }}" />
            @endif

            <!-- Image Container -->
            <section class=" max-w-6xl mx-auto grid grid-cols-12 gap-4 rounded-xl">
                <!-- Book Image Container -->
                <div class="col-span-3 bg-gray-900 rounded-xl p-4 mx-auto" x-data="{ open:false }">
                    <img src="{{ asset('uploads/book/' . $book->gambarBuku) }}" class="w-52 h-64 rounded-lg">

                    <div class="mt-5">
                        <p>Image Size: Maximum 1 MB</p>
                        <P>Image Format: JPEG, PNG</P>
                    </div>

                    <div class="text-center mt-4">
                        <span class="bg-green-600 px-4 py-2 rounded-lg font-bold cursor-pointer" x-on:click="open = true">
                            Select
                            Image</span>
                    </div>

                    <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show="open">
                        <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                        <div class=" bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50 p-2"
                            x-on:click.away="open = false">
                            <div class="flex justify-end items-center">
                                <div class="cursor-pointer" x-on:click="open = false">
                                    <x-icons.close class="w-6 h-6" />
                                </div>
                            </div>

                            <form action="{{ route('books.update', $book->idBuku) }}" method="POST"
                                enctype="multipart/form-data" class="px-6 py-4">
                                @csrf
                                @method('PATCH')
                                <input type="file" name="image" class="pb-3" accept="image/x-png,image/jpeg">
                                <input type="hidden" name="oldImage" value="{{ $book->gambarBuku }}">

                                <div class="flex justify-end">
                                    <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-bold"
                                        name="button" value="image">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Title and Price Book -->
                <div class="bg-gray-900 col-span-9 p-4 space-y-6 rounded-xl relative" x-data="{ open:false }">
                    <!-- Title -->
                    <div>
                        <p class="font-bold text-lg">Title:</p>
                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <input type="text"
                                    class="text-lg bg-transparent outline-none border-none focus:ring-0 col-span-8"
                                    value="{{ $book->tajukBuku }}" readonly>
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('books.update', $book->idBuku) }}" method="POST"
                                class="grid grid-cols-10 gap-2" x-show="open">
                                @csrf
                                @method('PATCH')

                                <input type="text" name="title"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ $book->tajukBuku }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="title">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer"
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="font-bold text-lg">Price:</p>
                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <div class="flex items-center col-span-8">
                                    <p class="text-lg">RM</p>
                                    <input type="text" class="text-lg bg-transparent outline-none border-none focus:ring-0 "
                                        value="{{ number_format($book->hargaBuku, 2) }}" readonly>
                                </div>
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('books.update', $book->idBuku) }}" method="POST"
                                class="grid grid-cols-10 gap-2" x-show="open">
                                @csrf
                                @method('PATCH')

                                <input type="text" name="price"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ number_format($book->hargaBuku, 2) }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="price">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer"
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="font-bold text-lg">Stock:</p>
                        <div x-data="{ open : false }">
                            <div x-show="!open" class="grid grid-cols-10 gap-2">
                                <input type="text"
                                    class="text-lg bg-transparent outline-none border-none focus:ring-0 col-span-8"
                                    value="{{ $book->stokBuku }}" readonly>
                                <div class=" col-span-2 rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer flex justify-center items-center"
                                    x-on:click="open = !open">Edit</div>
                            </div>

                            <form action="{{ route('books.update', $book->idBuku) }}" method="POST"
                                class="grid grid-cols-10 gap-2" x-show="open">
                                @csrf
                                @method('PATCH')

                                <input type="text" name="qtyStock"
                                    class="col-span-8 bg-gray-700 rounded-lg py-3 focus:ring-2 ring-green-600 text-lg"
                                    value="{{ $book->stokBuku }}">

                                <div class="col-span-2 flex justify-center items-center space-x-2">
                                    <button class="rounded bg-green-600 px-4 py-2 font-bold" name="button" value="stock">
                                        <svg class="w-7 h-7 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <div class="rounded bg-gray-700 px-4 py-2 font-bold cursor-pointer"
                                        x-on:click="open = false">
                                        <x-icons.close class="w-7 h-7" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Genre Container -->
            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4 space-y-5" x-data="{ open:false }">
                <div class="flex space-x-5 items-center">
                    <p class=" text-3xl font-semibold">Genre</p>
                    <div class="rounded-xl px-8 py-2 bg-gray-800 font-bold text-3xl cursor-pointer select-none"
                        x-on:click="open = true">
                        {{ $selectedGenre->namaGenre }}
                    </div>
                </div>
                <!-- Open -->
                <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show="open">
                    <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

                    <div class=" bg-gray-800 w-11/12 md:max-w-xl mx-auto rounded-xl shadow-lg z-50 p-2"
                        x-on:click.away="open = false">

                        <div class="flex justify-between items-center mb-8">
                            <div class="text-3xl font-bold">
                                Genre List
                            </div>
                            <div class="cursor-pointer" x-on:click="open = false">
                                <x-icons.close class="w-6 h-6" />
                            </div>
                        </div>

                        <form action="{{ route('books.update', $book->idBuku) }} " method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="flex flex-wrap">
                                @foreach ($genres as $genre)

                                    @if ($genre->idGenre === $selectedGenre->idGenre)
                                        <input type="radio" id="radio{{ $loop->index }}" name="genre"
                                            value="{{ $genre->idGenre }}" class="genre-radio hidden" checked>
                                    @else
                                        <input type="radio" id="radio{{ $loop->index }}" name="genre"
                                            value="{{ $genre->idGenre }}" class="genre-radio hidden">
                                    @endif

                                    <label for="radio{{ $loop->index }}"
                                        class="m-1.5 bg-gray-700 px-4 py-2 rounded-md font-semibold cursor-pointer select-none">
                                        {{ $genre->namaGenre }}
                                    </label>
                                @endforeach
                            </div>

                            <div class="flex justify-end mt-8">
                                <button class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-bold" name="button"
                                    value="genre">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Book Details Container -->
            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4 space-y-7" x-data="{ open:false }">
                <div class="flex justify-between items-center">
                    <div>
                        <p class=" text-3xl font-semibold">Book Details</p>
                    </div>
                    <button x-on:click="open = !open">
                        <x-icons.edit class="w-7 h-7" />
                    </button>
                </div>
                <!-- Open -->
                <div class="grid grid-cols-2 gap-10" x-show="!open">
                    <div>
                        <p class="font-semibold text-lg">ISBN:</p>
                        <p class="text-lg px-3">{{ $book->isbnBuku }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Format:</p>
                        <p class="text-lg px-3">{{ $book->jenisKulitBuku }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Author:</p>
                        <p class="text-lg px-3">{{ $book->pengarangBuku }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Dimension:</p>
                        <p class="text-lg px-3">{{ $book->ukuranBuku[0] }} x {{ $book->ukuranBuku[1] }} x
                            {{ $book->ukuranBuku[2] }} cm
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Publisher:</p>
                        <p class="text-lg px-3">{{ $book->penerbitBuku }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Pages:</p>
                        <p class="text-lg px-3">{{ $book->mukaSuratBuku }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-lg">Publication Date:</p>
                        <p class="text-lg px-3">{{ date('F d, Y', strtotime($book->tarikhTerbitBuku)) }}</p>
                    </div>
                </div>
                <!-- Not Open -->
                <form action="{{ route('books.update', $book->idBuku) }}" method="POST" x-show="open">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-2 gap-10">
                        <div>
                            <p class="font-semibold text-lg">ISBN:</p>
                            <input class="block bg-gray-800 rounded-lg w-7/12 text-lg" type="text"
                                value="{{ $book->isbnBuku }}" placeholder="eg: 1234567890" name="isbn">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Format:</p>
                            <input class="block bg-gray-800 rounded-lg text-lg" type="text"
                                value="{{ $book->jenisKulitBuku }}" name="format">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Author:</p>
                            <input class="block bg-gray-800 rounded-lg w-9/12 text-lg" type="text"
                                value="{{ $book->pengarangBuku }}" placeholder="Author of book" name="author">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Dimension:</p>
                            <div class="flex space-x-2 items-center text-lg">
                                <input class=" bg-gray-800 rounded-lg w-full " type="text"
                                    value="{{ $book->ukuranBuku[0] }}" placeholder="length" name="length">
                                <label>x</label>
                                <input class=" bg-gray-800 rounded-lg w-full" type="text"
                                    value="{{ $book->ukuranBuku[1] }}" placeholder="width" name="width">
                                <label>x</label>
                                <input class=" bg-gray-800 rounded-lg w-full" type="text"
                                    value="{{ $book->ukuranBuku[2] }}" placeholder="height" name="height">
                                <label>cm</label>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Publisher:</p>
                            <input class="block bg-gray-800 rounded-lg w-9/12 text-lg" type="text"
                                value="{{ $book->penerbitBuku }}" placeholder="Publisher of book" name="publisher">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Pages:</p>
                            <input class="block bg-gray-800 rounded-lg text-lg" size="5" type="text"
                                value="{{ $book->mukaSuratBuku }}" placeholder="eg: 202" name="pages">
                        </div>
                        <div>
                            <p class="font-semibold text-lg">Publication Date:</p>
                            <input class="block bg-gray-800 rounded-lg text-lg" type="date"
                                value="{{ $book->tarikhTerbitBuku }}" name="publicationDate">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="rounded-full bg-green-600 px-6 py-2 font-bold text-lg" name="button"
                            value="book_details">save</button>
                    </div>
                </form>
            </section>

            <!-- Book Description -->
            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4 space-y-5" x-data="{ open:false }">
                <div class="flex justify-between items-center">
                    <div>
                        <p class=" text-3xl font-semibold">Description</p>
                    </div>
                    <button x-on:click="open = !open">
                        <x-icons.edit class="w-7 h-7" />
                    </button>
                </div>

                <!-- Open -->
                <div class="text-lg px-2 py-3" x-show="!open">
                    <p class="whitespace-pre-line">{{ $book->sinopsisBuku }}</p>
                </div>
                <!-- Not Open -->
                <form action="{{ route('books.update', $book->idBuku) }}" method="POST" x-show="open" class="space-y-2">
                    @csrf
                    @method('PATCH')
                    <textarea rows=" 10" class="bg-gray-800 rounded-lg w-full py-3 px-2 text-lg " name="description"
                        placeholder="Enter description of book">{{ $book->sinopsisBuku }}</textarea>

                    <div class="flex justify-end">
                        <button class="rounded-full bg-green-600 px-6 py-2 font-bold text-lg" name="button"
                            value="description">save</button>
                    </div>
                </form>
            </section>

            <!-- Remove Book -->
            <section class="max-w-6xl mx-auto rounded-lg bg-gray-900 p-4">
                <form action="{{ route('books.destroy', $book->idBuku) }}" method="POST" class="flex justify-end"
                    x-data="{ open : false }">
                    @csrf
                    @method('DELETE')
                    <div class="rounded-lg px-4 py-2 bg-red-600 font-bold cursor-pointer" x-on:click="open = true">Remove
                        Product</div>
                    <x-modals.delete-confirm-form />
                </form>
            </section>

            <!-- rating -->
            <section class="max-w-6xl bg-gray-900 p-4 rounded-lg space-y-6">
                @php
                    $rating = Rate::getAvgRating($book->idBuku);
                    $sold = OrderDetails::getTotalSoldBook($book->idBuku);
                @endphp
                <p class=" text-3xl font-semibold">Rating Details</p>

                <div class="space-x-1">
                    @if ($rating->average != null)
                        <div class="grid grid-cols-12 gap-2">
                            <!-- Average Ratings-->
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
