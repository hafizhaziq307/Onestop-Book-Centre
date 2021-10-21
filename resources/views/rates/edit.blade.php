@extends('layouts.layout')

@section('content')

    @if (session('id') == null)
        {{ redirect()->route('landingPage')->send() }}
    @endif


    <x-headers.buyer-nav query="" />

    <div class="w-full flex flex-wrap">
        <!-- Sidebar -->
        <x-sidebar.sidebar-buyer />

        <!-- Content -->
        <main class=" max-w-6xl space-y-7 mt-24 ml-96 w-10/12">
            <x-title message="Rate Product(s)" />

            <form action="{{ route('rates.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <section class="bg-gray-900 rounded-lg px-4 divide-y-2 divide-gray-500 divide-solid">
                    @foreach ($ratings as $rating)
                        <div class="grid grid-cols-12 gap-4 ">
                            <input type="hidden" value="{{ $rating->idPenilaian }}" name="rateIds[]">

                            <!-- Book Details -->
                            <div class=" flex space-x-3 p-4 col-span-9 ">
                                <img src="{{ asset('uploads/book/' . $rating->gambarBuku) }}" class="w-20 rounded-md">
                                <div>
                                    <p class="text-lg">{{ $rating->tajukBuku }}</p>
                                    <p>RM {{ $rating->hargaBuku }}</p>
                                </div>
                            </div>

                            <!-- ratings stars -->
                            <div class="col-span-3 flex items-center justify-center">
                                <div
                                    x-data="{ rating: 0, hoverRating: 0, ratings: [{'amount': 1}, {'amount': 2}, {'amount': 3}, {'amount': 4}, {'amount': 5}], rate(amount) { (this.rating == amount) ? this.rating = 0 : this.rating = amount;} }">
                                    <template x-for="(star, index) in ratings" :key="index">
                                        <button type="button" @click="rate(star.amount)"
                                            @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                                            class=" text-gray-400 p-1 w-12"
                                            :class="{'text-gray-600': hoverRating >= star.amount, 'text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                                            <x-icons.star class="w-9" />
                                        </button>
                                    </template>
                                    <input type="hidden" name="rateScores[]" x-model="rating">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>

                <section class="flex justify-end bg-gray-900 rounded-lg p-4">
                    <button class="bg-blue-600 rounded-md text-lg px-4 py-2 font-bold">save</button>
                </section>
            </form>
        </main>
    </div>
@endsection
