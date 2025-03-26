@props(['title', 'value', 'colorClass' => 'text-gray-800'])

<div
    class="flex flex-col items-center justify-center bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
    <h3 class="text-lg sm:text-2xl font-semibold {{ $colorClass }}">{{ $title }}</h3>
    <p class="text-1xl sm:text-2xl font-bold text-gray-800">
        R${{ number_format($value, 2, ',', '.') }}
    </p>
</div>
