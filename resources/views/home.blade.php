@extends('layouts.app')

@section('title', 'Job Portal')

@section('content')
    <div class="container mx-auto px-4 py-10 ">

        <!-- Header -->

        <h1 class="text-4xl font-bold text-center mb-6 text-white">Find Your Dream Job – Apply Today!</h1>
        <p class="text-white text-center my-4">Thousands of job opportunities are waiting for you.</p>

        <!-- Search Bar -->
        <div class="flex justify-center mb-10">
            <div class="relative w-full max-w-lg">
                <!-- Input Field -->
                <input type="text" id="job-search"
                    class="peer w-full p-4 rounded-md bg-white/10 backdrop-blur-lg border border-white/20 text-white focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400 transition shadow-lg"
                    placeholder=" ">

                <!-- Floating Label (Hides on Typing) -->
                <label for="job-search"
                    class="absolute left-4 top-3 text-gray-400 text-lg transition-all duration-300 peer-placeholder-shown:opacity-100 peer-focus:opacity-0">
                    Web Developer
                </label>
            </div>
        </div>


        {{-- button --}}
        <div class="mt-8 flex justify-center space-x-4">
            <a href="{{ route('jobs.index') }}"
                class="bg-white/10 backdrop-blur-md backdrop-saturate-200 px-6 py-3 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-blue-400 hover:text-blue-300">
                📝 Browse Jobs
            </a>
            <a href="{{ route('login') }}"
                class="bg-white/10 backdrop-blur-md backdrop-saturate-200 px-6 py-3 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-green-400 hover:text-green-300">
                📢 Post a Job
            </a>
        </div>

   




        {{-- Featured Jobs --}}
        @include('components.featured')
        {{-- End Featured Jobs --}}



        <!-- Tags Section -->
        @include('components.tags')
        <!-- End Tags Section -->



        <!-- Recent Jobs Section -->
        @include('components.recent-jobs')
        <!--End Recent Jobs Section -->


        <!-- Testimonials -->
        {{-- @include('components.testimonials') --}}
        <!-- Testimonials -->

        <!-- How its Working -->
        {{-- @include('components.How-works') --}}
        <!-- End How its Working -->
         <div class="mt-12 flex flex-col items-center text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Take the Next Step?</h2>
            <p class="text-gray-300 mb-6">Join thousands of professionals and employers finding success here.</p>

            <div class="flex flex-wrap justify-center gap-6">
                <!-- Job Seeker CTA -->
                <a href="{{ route('register') }}"
                    class="bg-white/10 backdrop-blur-md backdrop-saturate-200 px-6 py-3 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-blue-400 hover:text-blue-300">
                    📩 Sign Up Now
                </a>

                <!-- Employer CTA -->
                <a href="{{ route('register') }}"
                    class="bg-white/10 backdrop-blur-md backdrop-saturate-200 px-6 py-3 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/20 transition-all duration-300 hover:scale-105 hover:border-green-400 hover:text-green-300">
                    📊 Start Hiring
                </a>
            </div>
        </div> 

        <!-- Footer -->
        @extends('layouts.footer')
        <!-- End Footer -->


    </div>

@endsection  





<!-- Featured Jobs Section -->
         {{-- <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4 text-white">Featured Jobs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($featuredJobs as $job)
                <div
                    class="text-white bg-gray-700 p-6 rounded-lg shadow-lg border-2 border-transparent hover:border-sky-500 transition-all duration-300 hover:scale-105">
                    <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                    <p class="text-gray-500">{{ $job->description }}</p>
                    <h5 class="text-gray-400">{{ $job->salary }} USD</h5>

                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($job->tags as $tag)
                        <span class="text-white bg-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach

                    </div>
                </div>
                @endforeach
            </div>
        </div>  --}}
