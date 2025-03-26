<!-- resources/views/components/button.blade.php -->
@props(['variant' => 'default', 'type' => 'button'])

@php
    $variants = [
        'edit' => [
            'class' => 'px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded',
            'icon' => 'fas fa-edit',
        ],
        'delete' => [
            'class' => 'px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded',
            'icon' => 'fas fa-trash',
        ],
        'default' => [
            'class' =>
                'inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150',
            'icon' => null,
        ],
    ];
    $selected = $variants[$variant] ?? $variants['default'];
    $class = $selected['class'];
    if ($type === 'submit') {// If true, it will be a blue button
        $class = preg_replace('/\b(bg|hover:bg)-[^ ]+/', '', $class);
        $class .= ' bg-blue-600 hover:bg-blue-700';
        $class = preg_replace('/\s+/', ' ', trim($class));
    }
@endphp

{{-- If the button is called with a custom class, it will use only that class and ignore the default styling of the component. --}}
{{-- Otherwise, it will automatically apply the default styles based on the specified variant. --}}
<button {{ $attributes->merge(['type' => $type])->except('class') }} class="{{ $attributes->get('class', $class) }}">
    @if ($selected['icon'])
        <i class="{{ $selected['icon'] }}"></i>
    @endif
    {{ $slot }}
</button>
