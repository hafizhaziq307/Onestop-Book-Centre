<!-- Header -->
<header class="flex justify-between items-center bg-gray-900 px-6 py-3 fixed w-full z-10">
    <a href="{{ route('landingPage') }}" class="flex items-center w-44">
        <img src="{{ asset('uploads/newlogo.png') }}" alt="logo">
    </a>

    <form action="{{ route('books.search') }}" class="flex items-center h-10 rounded-lg space-x-2 "
        x-data="{ search:'{{ $query }}' }">
        <div class="flex items-center bg-gray-700 rounded-lg pl-3 w-96">
            <x-icons.search class="w-5 h-5" />
            <input type="text" class="w-full h-full bg-gray-700 focus:ring-0 border-none rounded-r-lg " name="q"
                value="{{ $query }}" x-model="search" placeholder="Find book">
        </div>
        <button class="px-8 green text-lg font-bold h-full rounded-md"
            :disabled="(search === '') ? true : false">Search</button>
    </form>

    <div class="flex space-x-10 items-center">
        <div class="flex items-center space-x-3">
            <p class="font-semibold">{{ $buyer->namaPembeli }}</p>
            <div class="w-11 h-11">
                <img src="{{ asset('uploads/buyer/' . $buyer->gambarPembeli) }}" alt="img"
                    class="rounded-full w-full h-full">
            </div>
        </div>

        <a href="{{ route('carts.index') }}" class="text-center relative w-14">
            <x-icons.cart class="w-9 h-9 mx-auto" />
            @if ($totalCart > 0)
                <div class="absolute top-0 right-0 rounded-full bg-green-600 px-1.5 text-sm font-bold z-20">
                    {{ $totalCart }}</div>
            @endif
        </a>
    </div>
</header>
