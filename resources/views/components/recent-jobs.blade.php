




{{-- Recent Jobs --}}
<div class="relative mt-10 pb-20">
    {{-- Background Effects --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
        <div class="w-[600px] h-[600px] bg-gradient-to-br from-blue-600/20 via-indigo-500/20 to-purple-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
        <div class="w-[400px] h-[400px] bg-gradient-to-tr from-pink-500/20 via-rose-500/20 to-red-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin-reverse"></div>
    </div>

    <div class="relative  mx-auto px-4 ">
        {{-- Header --}}
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Recent Jobs</h2>
            <p class="text-gray-400 mt-2">Find your next opportunity</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($recentJobs->isEmpty())
                {{-- Skeleton Loading --}}
                @for ($i = 0; $i < 3; $i++)
                    <div class="relative animate-slide-up" style="animation-delay: {{ $i * 100 }}ms">
                        <div class="bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 hover:shadow-2xl hover:shadow-white/5 transition-all duration-300">
                            <div class="animate-pulse space-y-4">
                                <div class="h-6 bg-gradient-to-r from-white/10 to-white/5 rounded-lg w-3/4"></div>
                                <div class="space-y-2">
                                    <div class="h-4 bg-gradient-to-r from-white/10 to-white/5 rounded-lg"></div>
                                    <div class="h-4 bg-gradient-to-r from-white/10 to-white/5 rounded-lg w-5/6"></div>
                                </div>
                                <div class="flex gap-2">
                                    <div class="h-8 bg-gradient-to-r from-white/10 to-white/5 rounded-full w-20"></div>
                                    <div class="h-8 bg-gradient-to-r from-white/10 to-white/5 rounded-full w-24"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @foreach ($recentJobs as $job)
                    <div class="group relative animate-slide-up" style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="relative h-full bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-white/5">
                            {{-- Header Section --}}
                            <div class="flex justify-between items-start gap-4 mb-6">
                                <div>
                                    <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors duration-300">{{ $job->title }}</h3>
                                    <p class="text-sm text-gray-400 mt-1 flex items-center gap-2">
                                        <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Posted {{ $job->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-gradient-to-r from-blue-500/20 to-purple-500/20 text-white rounded-full text-sm font-medium border border-white/10">
                                    {{ $job->type }}
                                </span>
                            </div>

                            {{-- Description --}}
                            <p class="text-gray-300 text-sm leading-relaxed mb-6 group-hover:text-white transition-colors duration-300">{{ $job->description }}</p>

                            {{-- Salary --}}
                            <div class="flex items-center gap-2 mb-6 group-hover:translate-x-1 transition-transform duration-300">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-white font-semibold group-hover:text-blue-400 transition-colors duration-300">
                                    From {{ number_format($job->salary, 2) }} USD
                                </span>
                            </div>

                            {{-- Tags --}}
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach ($job->tags as $tag)
                                    <span class="px-3 py-1.5 bg-white/5 text-gray-300 rounded-full text-sm border border-white/10 transition-all duration-300 hover:scale-105 hover:bg-white/10 hover:text-white">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- Apply Section --}}
                            @if(auth()->check() && auth()->user()->role === 'user')
                                <form action="{{ url('/apply/' . $job->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <textarea name="message" 
                                        class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white placeholder-gray-400 focus:border-white/20 focus:ring-1 focus:ring-white/20 transition-all duration-300 resize-none hover:bg-white/[0.07]"
                                        rows="3"
                                        placeholder="Tell us why you're perfect for this role..."></textarea>
                                    <button type="submit"
                                        class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:scale-[1.02] active:scale-95">
                                        Apply Now
                                    </button>
                                </form>
                            @elseif(auth()->check() && auth()->user()->role !== 'user')
                                <div class="mt-6 text-center p-4 rounded-xl bg-white/5 border border-white/10">
                                    <p class="text-gray-400">Only job seekers can apply for jobs</p>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="block w-full text-center bg-gradient-to-r from-blue-500 to-purple-500 text-white py-3 px-6 rounded-xl font-medium transition-all duration-300 hover:from-blue-600 hover:to-purple-600 hover:scale-[1.02] active:scale-95">
                                    Sign in to Apply
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Pagination --}}
        @if(method_exists($recentJobs, 'links'))
            <div class="mt-8">
                {{ $recentJobs->links() }}
            </div>
        @endif
    </div>
</div>

<style>
@keyframes slow-spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

@keyframes slow-spin-reverse {
    from {
        transform: rotate(360deg);
    }
    to {
        transform: rotate(0deg);
    }
}

@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slow-spin {
    animation: slow-spin 20s linear infinite;
}

.animate-slow-spin-reverse {
    animation: slow-spin-reverse 25s linear infinite;
}

.animate-spin-slow {
    animation: slow-spin 4s linear infinite;
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out forwards;
}

.animate-slide-up {
    opacity: 0;
    animation: slide-up 0.6s ease-out forwards;
}

/* Skeleton loading animation */
@keyframes pulse {
    50% {
        opacity: .5;
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>