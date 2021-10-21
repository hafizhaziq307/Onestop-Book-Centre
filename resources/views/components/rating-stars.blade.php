<div class="flex items-center">
    <!-- Rate -->
    @for ($i = 0; $i < (int) $ratingScore; $i++)
        <x-icons.star class="{{ $class }} text-yellow-400" />
    @endfor
    <!-- Remaining -->
    @for ($i = 0; $i < $ratingRemaining; $i++)
        <x-icons.star class="{{ $class }} text-gray-600" />
    @endfor
</div>
