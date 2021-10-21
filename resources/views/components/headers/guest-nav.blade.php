<!-- Header -->
<header class="flex justify-between items-center bg-gray-900 px-6 py-3 fixed w-full z-10">
    <a href="{{ route('landingPage') }}" class="flex items-center w-44 ">
        <img src="{{ asset('uploads/newlogo.png') }}" alt="logo">
    </a>

    <form action="{{ route('books.search') }}" class="flex items-center h-10 rounded-lg space-x-2"
        x-data="{ search:'{{ $query }}' }">
        <div class="flex items-center bg-gray-700 rounded-lg pl-3 w-96">
            <x-icons.search class="w-5 h-5" />
            <input type="text" class="w-full h-full bg-gray-700 focus:ring-0 border-none rounded-r-lg" name="q"
                value="{{ $query }}" x-model="search" placeholder="Find book">
        </div>
        <button class="px-8 green text-lg font-bold h-full rounded-md"
            :disabled="(search === '') ? true : false">Search</button>
    </form>

    <div class="space-x-3">
        <a href="{{ route('login') }}" class="font-bold hover:underline">Login</a>
        <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 font-bold rounded-lg">Create
            New Account</a>
    </div>
</header>
