<div class="mt-8">
    <h2 class="text-white text-4xl font-bold mb-12 tracking-tight relative inline-block">
        Popular Tags
        <div class="absolute -bottom-4 left-0 right-0">
            <div class="h-px bg-gradient-to-r from-transparent via-rose-500 to-transparent"></div>
            <div class="h-px mt-2 bg-gradient-to-r from-transparent via-violet-500 to-transparent"></div>
        </div>
    </h2>
    
    <div class="relative overflow-hidden">
        <div class="flex flex-wrap gap-3 animate-scroll">
            @foreach ($tags as $tag)
                <a href="" class="group">
                    <!-- Premium Glass Card -->
                    <div class="relative p-[1px] rounded-xl bg-gradient-to-br from-white/20 via-white/5 to-white/0
                        before:absolute before:inset-0 before:bg-gradient-to-br before:from-rose-500/20 before:via-violet-500/20 before:to-cyan-500/20 before:rounded-xl before:opacity-0 before:transition-opacity before:duration-500
                        group-hover:before:opacity-100 overflow-hidden">
                        
                        <!-- Glass Background -->
                        <div class="relative px-5 py-2.5 rounded-xl bg-white/[0.07] backdrop-blur-xl
                            border border-white/[0.08] shadow-[0_8px_16px_rgba(0,0,0,0.2)]
                            transition-all duration-300 group-hover:bg-white/[0.12]
                            group-hover:shadow-[0_8px_24px_rgba(0,0,0,0.3)]">
                            
                            <!-- Content Container -->
                            <div class="relative flex items-center gap-2.5">
                                <!-- Hashtag with Gradient -->
                                <span class="text-lg font-bold bg-gradient-to-br from-rose-400 via-violet-400 to-cyan-400 bg-clip-text text-transparent
                                    transition-transform duration-300 group-hover:scale-110">#</span>
                                
                                <!-- Tag Text -->
                                <span class="text-white/90 font-medium tracking-wide transition-colors duration-300
                                    group-hover:text-white">{{ $tag->name }}</span>
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500
                                bg-gradient-to-r from-transparent via-white/[0.05] to-transparent
                                -translate-x-full group-hover:translate-x-full transform transition-transform duration-1000"></div>
                        </div>
                        
                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-br from-rose-500 via-violet-500 to-cyan-500 rounded-xl opacity-0 blur-xl
                            group-hover:opacity-20 transition-opacity duration-500"></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-scroll {
        animation: scroll 20s linear infinite;
        display: flex;
        flex-wrap: nowrap;
        white-space: nowrap;
    }

    .animate-scroll:hover {
        animation-play-state: paused;
    }
</style>
