@props(['value'])

{{-- <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label> --}}
<label {{ $attributes->merge(['class' => 'absolute left-4 top-2 text-gray-300 peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-placeholder-shown:text-base peer-focus:top-2 peer-focus:text-blue-400 transition-all']) }}>
    {{ $value ?? $slot }}
</label>