@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md bg-gray-800 text-gray-400 border-gray-800']) !!}>
