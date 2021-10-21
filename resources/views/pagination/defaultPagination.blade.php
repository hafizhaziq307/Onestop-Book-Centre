@if ($paginator->hasPages())
    <div class="flex justify-center space-x-2">
        @if ($paginator->onFirstPage())
            <div class=" flex justify-center items-center w-12 h-12 text-gray-500 hover:text-gray-100 px-1">
                <x-icons.chevron-left class="w-10 h-10" />
            </div>
        @else
            <a href="{{ $paginator->previousPageUrl() . $req }}"
                class="flex justify-center items-center w-12 h-12 text-gray-500 hover:text-gray-100 px-1">
                <x-icons.chevron-left class="w-10 h-10" />
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div
                            class=" flex justify-center items-center w-12 h-12 rounded-full text-gray-900 bg-gray-400 font-bold">
                            {{ $page }}
                        </div>
                    @else
                        <a href="{{ $url . $req }}"
                            class="flex justify-center items-center w-12 h-12 rounded-full text-gray-500 hover:text-gray-100 hover:bg-gray-700 font-bold">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() . $req }}"
                class="flex justify-center items-center w-12 h-12 text-gray-500 hover:text-gray-100 px-1">
                <x-icons.chevron-right class="w-10 h-10" />
            </a>
        @else
            <div class="flex justify-center items-center w-12 h-12 text-gray-500 hover:text-gray-100 px-1">
                <x-icons.chevron-right class="w-10 h-10" />
            </div>
        @endif
    </div>
@endif
