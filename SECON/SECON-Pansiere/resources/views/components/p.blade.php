<!-- resources/views/components/p.blade.php -->
@props(['class' => 'text-gray-600'])
<p {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</p>
