@switch($type)
    @case('success')
        <div class="bg-blue-600 flex justify-between items-center rounded-lg px-2 py-4 max-w-6xl mx-auto"
            x-data="{ toogle : true }" x-show="toogle">
            <div class="space-x-2 flex items-center">
                <x-icons.exclamation-circle class="w-7 h-7" />

                <div class="text-lg font-semibold">{{ $message }}</div>
            </div>

            <button type="button" x-on:click="toogle = false">
                <x-icons.close class="w-6 h-6" />
            </button>
        </div>
    @break
    @case('error')
        <div class="bg-red-600 w-full rounded-lg px-2 py-4 relative" x-data="{ toogle : true }" x-show="toogle">
            <span class="flex items-center space-x-1">
                <x-icons.exclamation-circle class="w-7 h-7" />
                <label class="text-lg font-semibold">Error</label>
            </span>

            <p>{{ $message }}</p>

            <button type="button" class="absolute top-2 right-2" x-on:click="toogle = false">
                <x-icons.close class="w-6 h-6" />
            </button>
        </div>
    @break
    @default
        <div>Alert component not working properly !</div>
@endswitch
