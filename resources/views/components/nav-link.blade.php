@props(['active'])

@php
$classes = ($active ?? false)
    ? 'flex items-center p-2 text-white bg-primary-600 rounded-lg'
    : 'flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>