@props(['disabled' => false])

{{-- <input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}> --}}


<input @disabled($disabled) {{ $attributes->merge(['class' => 'pt-2 peer bg-transparent border border-white/30 text-white placeholder-transparent rounded-md w-full px-4 py-2 focus:outline-none focus:border-blue-400 transition']) }}>