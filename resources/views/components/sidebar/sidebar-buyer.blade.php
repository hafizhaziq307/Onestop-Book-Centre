<aside class=" w-2/12 fixed top-16 left-0" x-data="{ active : '{{ $active }}' }">
    <div class="flex bg-gray-900 h-screen w-64">
        <nav class="flex-grow px-4 pb-4 space-y-4 mt-5">
            <a href="{{ route('landingPage') }}"
                class="flex items-center space-x-2 px-4 py-2 mt-2 font-semibold text-gray-200 rounded-lg hover:bg-gray-700"
                :class="(active == 'home') ? 'bg-gray-700' : '' ">
                <x-icons.home class="w-6 h-6" />
                <p>Home</p>
            </a>
            <a href="{{ route('orders.index') }}"
                class="flex items-center space-x-2 px-4 py-2 mt-2 font-semibold text-gray-200 rounded-lg hover:bg-gray-700"
                :class="(active == 'order') ? 'bg-gray-700' : '' ">
                <x-icons.order class="w-6 h-6" />
                <p>Order</p>
            </a>
            <a href="{{ route('buyers.edit', $userId) }}"
                class="flex items-center space-x-2 px-4 py-2 mt-2 font-semibold text-gray-200 rounded-lg hover:bg-gray-700"
                :class="(active == 'profile') ? 'bg-gray-700' : '' ">
                <x-icons.user class="w-6 h-6" />
                <p>Profile</p>
            </a>
            <a href="{{ route('addresses.index') }}"
                class="flex items-center space-x-2 px-4 py-2 mt-2 font-semibold text-gray-200 rounded-lg hover:bg-gray-700"
                :class="(active == 'address') ? 'bg-gray-700' : '' ">
                <x-icons.truck class="w-6 h-6" />
                <p>Address </p>
            </a>
            <form action="{{ route('accounts.logout') }}">
                <button
                    class="flex items-center space-x-2 px-4 py-2 mt-2 font-semibold text-gray-200 rounded-lg bg-red-600 w-full">
                    <x-icons.logout class="w-6 h-6" />
                    <p>Log Out</p>
                </button>
            </form>
        </nav>
    </div>
</aside>
