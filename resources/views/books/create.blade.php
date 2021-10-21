@extends('layouts.layout')

@section('content')

    <x-headers.seller-nav />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-seller />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-9/12">
            <x-title message="New Product" />

            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-7">
                @csrf
                <!-- Image Container -->
                <section class=" max-w-6xl mx-auto grid grid-cols-12 gap-4 rounded-xl">
                    <!-- Book Image Container -->
                    <div class="col-span-3 bg-gray-900 rounded-xl p-4 mx-auto" x-data="imageData()">

                        <label for="thumbnail"
                            class="w-52 h-64 rounded-lg cursor-pointer bg-gray-700 grid place-items-center"
                            x-show="previewUrl == ''">
                            <x-icons.plus-circle class="w-20 h-20 font-bold" />
                        </label>
                        <input type="file" enctype="multipart/form-data" name="bookCover" id="thumbnail" class="hidden"
                            accept="image/*" x-on:change="updatePreview()">


                        <div x-show="previewUrl !== ''" class="relative w-52">
                            <img :src="previewUrl" alt="" class="w-52 h-64 rounded-lg">
                            <div class="absolute top-1 right-1 cursor-pointer" x-on:click="clearPreview()">
                                <x-icons.close class="w-6 h-6" />
                            </div>
                        </div>

                        <div class="mt-5">
                            <p>Image Size: Maximum 1 MB</p>
                            <P>Image Format: JPEG, PNG</P>
                        </div>
                    </div>
                    <!-- Title and Price Book -->
                    <div class="bg-gray-900 col-span-9 p-4 space-y-10 rounded-xl">
                        <input type="text" placeholder="Title book" name="title"
                            class="w-full bg-gray-700 rounded-lg text-xl">

                        <div class="flex items-center bg-gray-700 rounded-lg pl-3 w-36">
                            <p class="text-2xl">RM</p>
                            <input type="text" name="price"
                                class="w-full h-full bg-gray-700 focus:ring-0 border-none rounded-r-lg text-2xl">
                        </div>

                        <input type="text" class="w-36 bg-gray-700 rounded-lg text-xl" name="qtyStock"
                            placeholder="No. of stock">
                    </div>
                </section>

                <!-- Genre Container -->
                <section class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-5">
                    <p class=" text-3xl font-semibold">Genre</p>

                    <div class="flex flex-wrap">
                        @foreach ($genres as $genre)
                            <input type="radio" id="radio{{ $loop->index }}" name="genre" value="{{ $genre->idGenre }}"
                                class="genre-radio hidden">
                            <label for="radio{{ $loop->index }}"
                                class="m-1.5 bg-gray-700 px-4 py-2 rounded-md font-semibold cursor-pointer select-none">
                                {{ $genre->namaGenre }}
                            </label>

                        @endforeach
                    </div>
                </section>

                <!-- Book Details Container -->
                <section class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-5">
                    <p class=" text-3xl font-semibold">Book Details</p>

                    <div class="grid grid-cols-2 gap-10">
                        <div>
                            <label class="font-semibold text-lg">ISBN:</label>
                            <input class="block bg-gray-700 rounded-lg w-7/12 text-lg" type="text"
                                placeholder="eg: 1234567890" name="isbn">
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Format:</label>
                            <input class="block bg-gray-700 rounded-lg text-lg" type="text" value="Paperback" readonly>
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Author:</label>
                            <input class="block bg-gray-700 rounded-lg w-9/12 text-lg" type="text"
                                placeholder="Author of book" name="author">
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Dimension:</label>
                            <div class="flex space-x-2 items-center">
                                <input class=" bg-gray-700 rounded-lg w-full text-lg" type="text" placeholder="length"
                                    name="length">
                                <label>x</label>
                                <input class=" bg-gray-700 rounded-lg w-full text-lg" type="text" placeholder="width"
                                    name="width">
                                <label>x</label>
                                <input class=" bg-gray-700 rounded-lg w-full text-lg" type="text" placeholder="height"
                                    name="height">
                                <label>cm</label>
                            </div>
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Publisher:</label>
                            <input class="block bg-gray-700 rounded-lg w-9/12 text-lg" type="text"
                                placeholder="Publisher of book" name="publisher">
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Pages:</label>
                            <input class="block bg-gray-700 rounded-lg text-lg" size="5" type="text" placeholder="eg: 202"
                                name="pages">
                        </div>
                        <div>
                            <label class="font-semibold text-lg">Publication Date:</label>
                            <input class="block bg-gray-700 rounded-lg text-lg" type="date" name="publicationDate">
                        </div>
                    </div>
                </section>

                <!-- Book Description -->
                <section class="max-w-6xl rounded-lg p-4 bg-gray-900 space-y-5">
                    <p class=" text-3xl font-semibold">Description</p>

                    <textarea rows="10" class="bg-gray-800 rounded-lg w-full py-3 px-2 text-lg" name="description"
                        placeholder="Enter description of book"></textarea>
                </section>

                <!-- Save Container -->
                <section class="max-w-6xl rounded-lg p-4 bg-gray-900 flex justify-end px-2 items-center">
                    <input type="hidden" name="seller" value="{{ session('id') }}">
                    <button class="bg-green-600 rounded-full py-2 px-8 font-bold outline-none">Save</button>
                </section>
            </form>
        </main>
    </div>

    <script>
        function imageData() {
            return {
                previewUrl: "",
                updatePreview() {
                    var reader,
                        files = document.getElementById("thumbnail").files;

                    reader = new FileReader();

                    reader.onload = e => {
                        this.previewUrl = e.target.result;
                    };

                    reader.readAsDataURL(files[0]);
                },
                clearPreview() {
                    document.getElementById("thumbnail").value = null;
                    this.previewUrl = "";
                }
            };
        }
    </script>

@endsection
