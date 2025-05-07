@extends('layouts.app')

@section('title', 'Job Portal')

@section('content')
    <!-- Hero Section -->
    <div class="relative min-h-[90vh] flex items-center overflow-hidden" id="hero">
        <!-- Background Elements -->
        {{-- <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 via-purple-900 to-gray-900"></div> --}}

        <!-- Animated Background -->
        <div class="absolute inset-0">
            <!-- Floating Orbs -->
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute top-1/3 right-1/4 w-80 h-80 bg-purple-500/20 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-pink-500/20 rounded-full blur-3xl animate-float-slow"></div>
        </div>

        <div class="container mx-auto px-4 py-16 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Content -->
                <div class="text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center mb-8 px-4 py-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/10 animate-fade-in">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-white/80 text-sm font-medium">Find Your Dream Job</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-7xl font-bold mb-8 text-white leading-tight animate-slide-up" title="{{ __('home.title') }}">
                        {{ __('home.title') }}
                    </h1>

                    <!-- Subtitle -->
                    <h2 class="text-white/80 text-xl mb-12 max-w-xl leading-relaxed animate-slide-up-delayed">{{ __('home.subtitle') }}</h2>

                    <!-- Search Bar -->
                    <div class="mb-12 animate-slide-up-more">
                        <form method="GET" action="{{ route('jobs.index') }}" class="relative" id="search-form">
                            <div class="relative group">
                                <input type="text" 
                                    name="search" 
                                    id="job-search"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 transition-all duration-300 group-hover:bg-white/10"
                                    placeholder="Search jobs..."
                                    value="{{ request('search') }}"
                                    aria-label="Search for jobs"
                                    autocomplete="off">

                                <label for="job-search"
                                    class="absolute left-4 top-4 text-blue-400 text-base transition-all duration-300
                                    peer-placeholder-shown:text-gray-400
                                    peer-focus:text-blue-400 peer-focus:text-sm peer-focus:-top-6
                                    drop-shadow-[0_0_5px_rgba(59,130,246,0.5)]">
                                    Search jobs...
                                </label>

                                <button type="submit" 
                                    class="absolute right-4 top-2 text-white/80 hover:text-white transition-colors p-4 min-w-[48px] min-h-[48px]" 
                                    id="search-button"
                                    aria-label="Search jobs">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="search-icon" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <svg class="animate-spin h-6 w-6 text-white hidden" id="loading-spinner" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </button>

                                @error('search')
                                    <div class="mt-2 flex items-center text-red-400">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </div>

                    <script>
                        document.getElementById('job-search').addEventListener('input', function(e) {
                            const searchTerm = e.target.value;
                            const errorDiv = document.getElementById('search-error');
                            
                            if (searchTerm.length > 0 && searchTerm.length < 2) {
                                errorDiv.classList.remove('hidden');
                                e.target.classList.add('border-red-500/50', 'focus:border-red-500/50', 'focus:ring-red-500/25');
                            } else {
                                errorDiv.classList.add('hidden');
                                e.target.classList.remove('border-red-500/50', 'focus:border-red-500/50', 'focus:ring-red-500/25');
                            }
                        });

                        // Show loading spinner when form is submitted
                        document.getElementById('search-form').addEventListener('submit', function(e) {
                            const searchTerm = document.getElementById('job-search').value;
                            if (searchTerm.length < 2) {
                                e.preventDefault();
                                document.getElementById('search-error').classList.remove('hidden');
                                return;
                            }
                            
                            document.getElementById('search-icon').classList.add('hidden');
                            document.getElementById('loading-spinner').classList.remove('hidden');
                            document.getElementById('search-button').disabled = true;
                        });
                    </script>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 animate-slide-up-more">
                        <a href="{{ route('jobs.index') }}"
                            class="group inline-flex items-center px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold text-lg shadow-lg hover:shadow-blue-500/20 transition-all duration-300 hover:scale-105 min-w-[160px] min-h-[56px] justify-center"
                            aria-label="Browse all available jobs">
                            <span>{{ __('home.browse_jobs') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('login') }}"
                            class="group inline-flex items-center px-8 py-4 rounded-xl bg-white/10 backdrop-blur-xl text-white font-semibold text-lg border border-white/10 shadow-lg hover:bg-white/20 transition-all duration-300 hover:scale-105 min-w-[160px] min-h-[56px] justify-center"
                            aria-label="Post a new job listing">
                            <span>{{ __('home.post_job') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column - Illustration -->
                <div class="hidden lg:block relative">
                    <!-- Floating Cards -->
                    <div class="absolute -top-8 z-50 -right-8 w-64 p-6 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-lg transform rotate-3 animate-float">
                        <h3 class="text-4xl font-bold text-white mb-2">10K+</h3>
                        <p class="text-white/80">Active Jobs</p>
                    </div>

                    <div class="absolute -bottom-8 left-8 w-64 p-6 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-lg transform rotate-3 animate-float z-50">
                        <h3 class="text-4xl font-bold text-white mb-2">5K+</h3>
                        <p class="text-white/80">Companies</p>
                    </div>

                    <!-- Main Illustration -->
                <div
                    class="absolute -bottom-8 left-8 w-64 p-6 rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10 shadow-lg transform rotate-3 animate-float z-50">
                    <div class="text-4xl font-bold text-white mb-2">5K+</div>
                    <div class="text-white/80">Companies</div>
                </div>


                    <!-- Main Illustration -->
                    <div class="relative z-10 w-full h-[500px] bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-3xl backdrop-blur-xl border border-white/10 shadow-2xl flex items-center justify-center overflow-hidden">
                        <!-- Animated Background -->
                        <div class="absolute inset-0">
                            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-500/10 via-transparent to-transparent animate-pulse-slow"></div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10 text-center p-8">
                            <div class="w-24 h-24 mx-auto mb-6 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-xl border border-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Find Your Dream Job</h3>
                            <p class="text-white/60">Join thousands of successful candidates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- Job Seeker Benefits Section -->
    <div class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-white text-center mb-12">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-white/5 backdrop-blur-xl p-8 rounded-2xl border border-white/10 hover:border-blue-400/50 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Fast Job Matching</h3>
                    <p class="text-white/60">Our advanced algorithm matches you with the perfect job opportunities based on your skills and preferences.</p>
                </div>
                <!-- Benefit 2 -->
                <div class="bg-white/5 backdrop-blur-xl p-8 rounded-2xl border border-white/10 hover:border-purple-400/50 transition-all duration-300">
                    <div class="w-16 h-16 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Secure Platform</h3>
                    <p class="text-white/60">Your data is protected with enterprise-grade security measures and privacy controls.</p>
                </div>
                <!-- Benefit 3 -->
                <div class="bg-white/5 backdrop-blur-xl p-8 rounded-2xl border border-white/10 hover:border-pink-400/50 transition-all duration-300">
                    <div class="w-16 h-16 bg-pink-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">24/7 Support</h3>
                    <p class="text-white/60">Our dedicated support team is always available to help you with any questions or concerns.</p>
                </div>
            </div>
        </div>
    </div>







    <!-- Rest of the content -->
    <div class="container mx-auto px-4 py-12">

        <!-- Featured Jobs -->
        <div id="featured-jobs">
            @include('components.featured')
        </div>

        <!-- Job Tags -->
        <div id="job-tags">
            @include('components.tags')
        </div>

        <!-- Recent Jobs -->
        <div id="recent-jobs">
            @include('components.recent-jobs')
        </div>

        <!-- Testimonials -->
        <div id="testimonials">
            @include('components.testimonials')
        </div>

    <!-- How It Works -->
    <div id="how-it-works">
        @include('components.How-works')
    </div>

        <!-- Call To Action -->
        <div id="cta" class="mt-20 flex flex-col items-center text-center">
            <h2 class="text-4xl font-bold text-white mb-6 tracking-tight">{{ __('home.cta_title') }}</h2>
            <p class="text-white/80 text-lg mb-8 max-w-2xl">{{ __('home.cta_text') }}</p>

            <div class="flex flex-wrap justify-center gap-6">
                <!-- Job Seeker CTA -->
                <a href="{{ route('register') }}"
                    class="bg-white/5 backdrop-blur-xl backdrop-saturate-150 px-8 py-4 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/10 transition-all duration-300 hover:scale-105 hover:border-blue-400/50 hover:text-blue-300 hover:shadow-blue-400/10">
                    {{ __('home.cta_jobseeker') }}
                </a>

                <!-- Employer CTA -->
                <a href="{{ route('register') }}"
                    class="bg-white/5 backdrop-blur-xl backdrop-saturate-150 px-8 py-4 rounded-xl text-white font-semibold text-lg shadow-lg border border-white/10 transition-all duration-300 hover:scale-105 hover:border-green-400/50 hover:text-green-300 hover:shadow-green-400/10">
                    {{ __('home.cta_employer') }}
                </a>
            </div>
        </div>

    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 p-3 bg-blue-500/20 backdrop-blur-xl rounded-full text-white border border-white/10 hover:bg-blue-500/30 transition-all duration-300 opacity-0 invisible transform translate-y-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <!-- Footer -->
    @include('layouts.footer')
@endsection

@push('scripts')
<script>
    document.getElementById('job-search').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            this.form.submit();
        }
    });

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // The lower the faster

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const inc = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };

        // Start counting when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(counter);
    });

    // Search form handling
    document.getElementById('search-form').addEventListener('submit', function(e) {
        const searchButton = document.getElementById('search-button');
        const searchIcon = document.getElementById('search-icon');
        const loadingSpinner = document.getElementById('loading-spinner');
        
        searchIcon.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        searchButton.disabled = true;
    });

    // Back to Top Button
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible', 'translate-y-4');
            backToTopButton.classList.add('opacity-100', 'visible', 'translate-y-0');
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible', 'translate-y-4');
            backToTopButton.classList.remove('opacity-100', 'visible', 'translate-y-0');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Keyboard Navigation
    document.addEventListener('keydown', (e) => {
        // Focus search input with Ctrl+K or Cmd+K
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            document.getElementById('job-search').focus();
        }

        // Navigate to main sections with Alt+Number
        const sections = {
            '1': 'hero',
            '2': 'featured-jobs',
            '3': 'job-tags',
            '4': 'recent-jobs',
            '5': 'testimonials',
            '6': 'how-it-works',
            '7': 'cta'
        };

        if (e.altKey && sections[e.key]) {
            e.preventDefault();
            const section = document.getElementById(sections[e.key]);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });

    // Add keyboard focus styles
    document.querySelectorAll('a, button, input').forEach(element => {
        element.addEventListener('focus', () => {
            element.classList.add('ring-2', 'ring-blue-400', 'ring-offset-2');
        });
        element.addEventListener('blur', () => {
            element.classList.remove('ring-2', 'ring-blue-400', 'ring-offset-2');
        });
    });
</script>
@endpush