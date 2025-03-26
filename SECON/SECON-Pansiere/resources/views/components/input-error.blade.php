<!-- resources/views/components/error.blade.php -->
@props(['field', 'class' => 'text-red-500 text-sm'])

@error($field)
    <span {{ $attributes->merge(['class' => $class]) }}>{{ $message }}</span>
@enderror
