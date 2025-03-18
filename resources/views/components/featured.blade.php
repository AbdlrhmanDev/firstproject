{{-- Featured Jobs
<div class="relative mt-10">
    {{-- Blurred Orange Circle Background --}}
    {{-- <div class="absolute inset-0 flex justify-center items-center">
        <div class="w-72 h-72 bg-orange-500 rounded-full blur-3xl opacity-30"></div>
    </div>

    <h2 class="relative text-2xl font-semibold mb-4 text-white text-center">Featured Jobs</h2> --}} --}}

    {{-- <div class="relative grid grid-cols-1 md:grid-cols-3 gap-6"> --}}
        {{-- Check if there are no featured jobs --}}
        {{-- @if($featuredJobs->isEmpty()) --}}
            {{-- Skeleton Loading Placeholder --}}
            {{-- @for ($i = 0; $i < 3; $i++)
                <div
                    class="relative mx-auto w-full max-w-sm rounded-lg border border-white/20 bg-white/5 backdrop-blur-xl backdrop-saturate-200 p-6 shadow-lg">
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
        @else --}}
            {{-- Actual Featured Jobs Content --}}
            {{-- @foreach ($featuredJobs as $job)
                <div
                    class="relative text-white bg-white/5 backdrop-blur-xl backdrop-saturate-200 p-6 rounded-lg border border-white/20 shadow-lg transition-all duration-300 hover:scale-105 hover:border-blue-800">
                    <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                    <p class="text-gray-300">{{ $job->description }}</p>
                    <h5 class="text-gray-400">{{ $job->salary }} USD</h5>

                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                            <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div> --}}

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
                    <h5 class="text-gray-400">{{ $job->salary }} USD</h5>

                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                            <span class="text-white bg-white/20 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>