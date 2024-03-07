@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold font-title text-base text-gray-600']) }}>
    {{ $value ?? $slot }}
</label>
