@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm bg-gray-900 text-gray-400 border-gray-800']) !!}>
