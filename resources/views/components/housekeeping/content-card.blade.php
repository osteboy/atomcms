@props(['classes' => ''])

<div @class([
    $classes,
    'bg-white rounded shadow-lg w-full p-4'
])>
    {{ $slot }}
</div>
