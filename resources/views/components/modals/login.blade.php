<div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show="open">
    <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

    <div class=" bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50" x-on:click.away="open=false">

        <div class="py-4 px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Alert!</p>
                <div class="cursor-pointer" x-on:click="open=false">
                    <x-icons.close class="w-6 h-6" />
                </div>
            </div>

            <!--Body-->
            <p>Required Login to access this function</p>

            <!--Footer-->
            <div class="flex justify-center space-x-5 px-3 pt-8">
                <a href="{{ route('login') }}"
                    class="px-5 py-2 rounded-lg font-semibold border-2 border-gray-700 hover:bg-gray-700">Login</a>
                <a href="{{ route('register') }}"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-bold">Create New Account</a>
            </div>
        </div>
    </div>
</div>
