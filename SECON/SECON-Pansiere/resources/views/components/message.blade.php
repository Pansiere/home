<!-- resources/views/components/alert.blade.php -->
@props(['message' => ''])

<div x-data="{ show: false, currentMessage: '{{ $message }}' }"
     x-on:category-deleted.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-on:category-created.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-on:category-updated.window="show = true; currentMessage = $event.detail.message; setTimeout(() => show = false, 1000)"
     x-show="show"
     x-transition:leave="transition ease-in-out duration-1000"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="mb-4 p-2 text-green-800 bg-green-200 border border-green-400 rounded">
    <span x-text="currentMessage"></span>
</div>
