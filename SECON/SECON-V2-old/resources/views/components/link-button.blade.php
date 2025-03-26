@props(['href' => '#', 'icon' => null, 'cancelar' => false])

@php
    $classes = $cancelar
        ? 'bg-gray-500 hover:bg-gray-600 focus:ring-gray-400'
        : 'bg-green-500 hover:bg-green-600 focus:ring-green-400';
@endphp

<a wire:navigate href="{{ $href }}"
    {{ $attributes->merge(['class' => "inline-flex items-center gap-2 px-4 py-2 text-white font-semibold rounded-md focus:ring-2 focus:outline-none transition ease-in-out duration-150 $classes"]) }}>
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
