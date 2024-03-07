@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-foreground border-2 border-gray-950 focus:border-gray-900 focus:ring-gray-900 text-gray-200 rounded-md px-16 py-20']) !!}>
