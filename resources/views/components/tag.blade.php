@props(['name'])

<div class="px-4 py-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 
    rounded-full border border-white/10 
    hover:from-blue-500/20 hover:to-purple-500/20 
    transition-all duration-300 group">
    <span class="text-gray-300 text-sm font-medium 
        group-hover:text-white transition-colors">
        {{ $name }}
    </span>
</div> 