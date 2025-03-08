@props(['color' => 'green'])

@php
    $colorClasses = [
        'green' => 'bg-green-500 hover:bg-green-600',
        'blue' => 'bg-blue-500 hover:bg-blue-600',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-600',
        'red' => 'bg-red-500 hover:bg-red-600'
    ];
@endphp

<button {{ $attributes->merge(['class' => "{$colorClasses[$color]} text-white px-4 py-2 rounded-lg transition"]) }}>
    {{ $slot }}
</button>