<a {{ $attributes->merge([
    'class' =>
        'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-100 
         hover:bg-white/20 focus:bg-white/20 rounded transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>