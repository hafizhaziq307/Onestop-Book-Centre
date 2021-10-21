<div x-data="{ open:true }">
    <div class=" fixed w-full h-full top-0 left-0 flex items-center justify-center z-50" x-show.transition="open">
        <div class="absolute w-full h-full bg-gray-900 opacity-80 z-50"></div>

        <div class=" bg-gray-800 w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50" x-on:click.away="open = false">
            <div class="py-4 px-6">
                <!--Title-->
                <div class="flex justify-center pb-3 ">
                    <div class="p-2 bg-green-600 rounded-full">
                        <x-icons.check class="w-28 h-28 text-white" />
                    </div>
                </div>
                <!--Body-->
                <p class="flex justify-center text-xl font-semibold capitalize">{{ $message }}</p>
                <!--Footer-->
                <div class="flex justify-center pt-6">
                    <div class="rounded-lg bg-green-600 w-72 py-3 font-bold text-center cursor-pointer"
                        x-on:click="open = false">OK</div>
                </div>
            </div>
        </div>
    </div>
</div>
