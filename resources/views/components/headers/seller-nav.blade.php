<!-- Header -->
<header class="flex justify-between items-center bg-gray-900 px-6 py-3 fixed w-full z-10">
    <a href="{{ route('sellers.dashboard') }}" class="flex items-center w-44">
        <img src="{{ asset('uploads/newlogo.png') }}" alt="logo">
    </a>

    <div class="flex space-x-10 items-center">
        <div class="flex items-center space-x-3">
            <p class="font-semibold">{{ $seller->namaPenjual }}</p>
            <div class="w-11 h-11">
                <img src="{{ asset('uploads/seller/' . $seller->gambarPenjual) }}" alt="img"
                    class="rounded-full w-full h-full">
            </div>
        </div>
    </div>
</header>
