@props(['title', 'value', 'color' => 'indigo'])

<div class="bg-gradient-to-br from-{{ $color }}-600 to-{{ $color }}-800 p-6 rounded-xl shadow-lg text-white">
    <h2 class="text-lg font-medium">{{ $title }}</h2>
    <p class="text-3xl font-bold mt-2">{{ $value }}</p>
</div>