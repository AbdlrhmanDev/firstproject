{{-- <div class="mt-10 my-7"> --}}
    {{-- Blurred Orange Circle Background --}}
    {{-- <div class="absolute inset-0 flex justify-center items-center">
        <div class="w-72 h-72 bg-orange-500 rounded-full blur-3xl opacity-40"></div>
    </div>
    <h2 class="text-white text-2xl font-semibold mb-4 text-center">Recent Jobs</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($recentJobs as $recentJob)
            <div
                class="bg-white/10 backdrop-blur-xl backdrop-saturate-200 p-6 rounded-xl shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-blue-500">
                <h3 class="text-white text-xl font-bold hover:text-blue-400 transition-all duration-300">
                    {{ $recentJob->title }}
                </h3>
                <p class="text-gray-300">{{ $recentJob->type }} - From {{ $recentJob->salary }} USD</p>

                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($recentJob->tags as $tag)
                        <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div> --}}




<div class="mt-10 my-7 relative">
    {{-- Blurred Orange Circle Background --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
        <div class="w-72 h-72 bg-orange-500 rounded-full blur-3xl opacity-40"></div>
    </div>

    <h2 class="text-white text-2xl font-semibold mb-4 text-center">Recent Jobs</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($recentJobs as $recentJob)
            <div
                class="relative z-10 bg-white/10 backdrop-blur-xl backdrop-saturate-200 p-6 rounded-xl shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-blue-500">
                <h3 class="text-white text-xl font-bold hover:text-blue-400 transition-all duration-300">
                    {{ $recentJob->title }}
                </h3>
                <p class="text-gray-300">{{ $recentJob->type }} - From {{ $recentJob->salary }} USD</p>

                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($recentJob->tags as $tag)
                        <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Add Pagination --}}
    <div class="mt-6 text-center">
        {{ $recentJobs->links() }}
    </div>
</div>