@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block m-2 px-3 py-2 rounded-lg text-base font-bold text-gray-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-400 transition duration-150 ease-in-out'
            : 'block m-2 px-3 py-2 rounded-lg text-base font-medium text-gray-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-400 transition duration-150 ease-in-out';
@endphp

{{-- 'block pl-3 pr-4 py-2 text-base font-medium text-gray-400 bg-button focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out' --}}

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
