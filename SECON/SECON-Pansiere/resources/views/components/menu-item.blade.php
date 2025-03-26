@props([
    'link' => '#',
    'text' => 'Menu Item',
    'icon' => 'fas fa-question',
    'active' => false,
    'activeIconColor' => 'text-green-300',
    'defaultIconColor' => 'text-green-500',
])

<li class="w-full">
    <a wire:navigate href="{{ $link }}"
        class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 w-full rounded {{ $active ? 'bg-gray-700 text-white' : '' }}">
        <i class="{{ $icon }} text-xl w-6 mr-3 {{ $active ? $activeIconColor : $defaultIconColor }}"></i>
        <span class="text-md">{{ $text }}</span>
    </a>
</li>
