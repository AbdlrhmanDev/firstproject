{{-- Featured Jobs --}}
<div class="relative mt-10">
    {{-- Blurred Orange Circle Background --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
        <div class="w-72 h-72 bg-orange-500 rounded-full blur-3xl opacity-30"></div>
    </div>

    <h2 class="relative text-2xl font-semibold mb-4 text-white text-center">Featured Jobs</h2>

    <div class="relative grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Check if there are no featured jobs --}}
        @if($featuredJobs->isEmpty())
            {{-- Skeleton Loading Placeholder --}}
            @for ($i = 0; $i < 3; $i++)
                <div
                    class="mx-auto w-full max-w-sm rounded-lg border border-white/20 bg-white/5 backdrop-blur-xl backdrop-saturate-200 p-6 shadow-lg pointer-events-none">
                    <div class="flex animate-pulse space-x-4">
                        <div class="size-10 rounded-full bg-gray-200"></div>
                        <div class="flex-1 space-y-6 py-1">
                            <div class="h-2 rounded bg-gray-200"></div>
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-2 h-2 rounded bg-gray-200"></div>
                                    <div class="col-span-1 h-2 rounded bg-gray-200"></div>
                                </div>
                                <div class="h-2 rounded bg-gray-200"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        @else
            {{-- Actual Featured Jobs Content --}}
            @foreach ($featuredJobs as $job)
                <div
                    class="text-white bg-white/5 backdrop-blur-xl backdrop-saturate-200 p-6 rounded-lg border border-white/20 shadow-lg transition-all duration-300 hover:scale-105 hover:border-blue-800">
                    <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                    <p class="text-gray-300">{{ $job->description }}</p>
                    <p class="text-gray-400">{{ $job->salary }} USD</p>

                    {{-- Display job tags --}}
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                            <span class="text-white/20 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    {{-- Apply Form --}}
                    @if(auth()->check() && auth()->user()->role === 'user')
                        <form action="{{ url('/apply/' . $job->id) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="message" class="form-control mt-2 w-full p-2 rounded-lg"
                                placeholder="Send a message to facilitate your job application........"></textarea>
                            <button type="submit"
                                class="btn btn-primary mt-3 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                                Apply for the job </button>
                        </form>
                    @elseif(auth()->check() && auth()->user()->role !== 'user')
                        <p class="text-muted mt-4">apply for jobs!</p>
                    @else
                        <p class="mt-4">
                            <a href="{{ route('login') }}"
                                class="btn btn-outline-primary text-white border-white py-2 px-4 rounded-lg hover:bg-white hover:text-black">
                                Log in to apply for the job </a>
                        </p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>