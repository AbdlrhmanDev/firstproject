<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#000000">
    <meta name="robots" content="index, follow">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Job Portal is your gateway to finding your dream job in tech and design. Sign up, upload your resume, and get hired.">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Job Portal - Find Your Dream Tech Job">
    <meta property="og:description" content="Sign up, upload your resume, and get hired by top employers in tech and design.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Job Portal">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Job Portal - Find Your Dream Tech Job">
    <meta name="twitter:description" content="Sign up, upload your resume, and get hired by top employers in tech and design.">
    
    <title>{{ config('app.name', 'Job Portal') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- External Libraries -->
    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- KeenSlider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.js"></script>

    <!-- Perfect Scrollbar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.6/css/perfect-scrollbar.css" />
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.6/dist/perfect-scrollbar.min.js"></script>

    <!-- Flowbite -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Application Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black relative font-sans antialiased">
    <!-- Global Gradient Background -->
    <div class="absolute inset-0 overflow-hidden -z-10">
        <!-- Animated Gradient Orbs -->
        <div class="absolute -top-40 -left-40 w-[600px] h-[600px] bg-gradient-to-br from-purple-600/30 via-blue-500/30 to-teal-400/30 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute top-[20%] -right-40 w-[600px] h-[600px] bg-gradient-to-bl from-indigo-500/30 via-fuchsia-500/30 to-pink-500/30 rounded-full blur-[100px] animate-pulse delay-1000"></div>
        <div class="absolute bottom-40 -left-40 w-[600px] h-[600px] bg-gradient-to-tr from-blue-600/30 via-purple-500/30 to-pink-400/30 rounded-full blur-[100px] animate-pulse delay-2000"></div>
        <div class="absolute -bottom-40 -right-40 w-[600px] h-[600px] bg-gradient-to-tl from-teal-500/30 via-cyan-500/30 to-blue-400/30 rounded-full blur-[100px] animate-pulse delay-3000"></div>
        
        <!-- Grid Overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#4f4f4f2e_1px,transparent_1px),linear-gradient(to_bottom,#4f4f4f2e_1px,transparent_1px)] bg-[size:14px_24px]"></div>
        
        <!-- Noise Texture -->
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-[0.015]"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Header -->
        @hasSection('header')
            <header class="bg-gradient-to-r from-gray-900 to-black border-b border-gray-800">
                <div class="mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="flex-grow">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-auto">
            @yield('footer')
        </footer>
    </div>

    <!-- Debug Script -->
    <script>
        console.log('Flowbite loaded:', typeof window.Flowbite !== 'undefined');
    </script>
</body>
</html>