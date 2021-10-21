@extends('layouts.layout')


@section('content')
    <div class="space-y-7">
        <x-title message="Index Genre"/>

        <div class="bg-gray-800 max-w-6xl mx-auto rounded-lg p-4 space-y-6">
            <div class="space-x-1 space-y-2">
                <button class="bg-gray-700 px-4 py-1 rounded-lg">A</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">B</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">C</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">D</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">E</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">F</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">G</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">H</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">I</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">J</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">K</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">L</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">M</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">N</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">O</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">O</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">P</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">Q</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">R</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">S</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">T</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">U</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">V</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">W</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">X</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">Y</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg">Z</button>
                <button class="bg-gray-700 px-4 py-1 rounded-lg ring-2 text-green-500 ring-green-500">All</button>
                <button class="bg-blue-700 px-4 py-1 rounded-lg font-bold">&plus;</button>
                <button class="bg-yellow-600 px-4 py-1 rounded-lg font-bold">Update</button>
                <button class="bg-red-600 px-4 py-1 rounded-lg font-bold">Delete</button>

            </div>
            <div class="grid grid-cols-4 gap-4">

                @foreach ($genres as $genre)
                    <div class="cursor-pointer">
                        <p>{{ $genre->namaGenre }}</p>
                    </div>
                @endforeach

                {{-- <p>Education</p>
                <p>Novel</p>
                <p>Math</p>
                <p>History</p>
                <p>Horror</p>
                <p>Comedy</p>
                <p>Law</p>
                <p>Anime</p>
                <p>Classics</p>
                <p>Fantasy</p>
                <p>Mystery</p>
                <p>Adventure</p>
                <p>Technology</p>
                <p>Thrillers</p>
                <p>Literature</p>
                <p>Sci-Fi</p>
                <p>Sport</p>
                <p>Biography</p>
                <p>Movie</p>
                <p>Poetry</p>
                <p>Light Novels</p>
                <p>Short Stories</p> --}}
            </div>
        </div>
    </div>
    
@endsection
