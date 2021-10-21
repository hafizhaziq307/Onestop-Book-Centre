<div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show="open">
    <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

    <div class=" bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50" x-on:click.away="open = false">

        <div class="py-4 px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Confirmation!</p>
                <div class="cursor-pointer" x-on:click="open = false">
                    <x-icons.close class="w-6 h-6" />
                </div>
            </div>

            <!--Body-->
            <p class="text-lg">This item will be removed. Are you sure?</p>

            <!--Footer-->
            <div class="flex justify-end pt-6 space-x-2">
                <div class="px-5 py-2 cursor-pointer bg-transparent rounded-lg font-semibold hover:text-green-600"
                    x-on:click="open = false">No</div>
                <button class="px-5 py-2 green rounded-lg font-semibold">Yes</button>
            </div>
        </div>
    </div>
</div>
