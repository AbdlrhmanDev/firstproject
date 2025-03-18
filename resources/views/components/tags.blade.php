<div class="mt-8">
    <h2 class="text-white text-xl font-semibold">Tags</h2>
    
    <div class="flex flex-wrap gap-2 mt-2">
        @foreach ($tags as $tag)
            <span class="text-white bg-white/10 backdrop-blur-md backdrop-saturate-150 px-4 py-2 rounded-full text-sm font-medium border border-white/20 transition-all duration-300 hover:bg-white/20 hover:border-blue-400 hover:scale-105">
                {{ $tag->name }}
            </span>
        @endforeach
    </div>
</div>
