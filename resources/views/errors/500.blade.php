@extends('layouts.app')

@section('title', '500 Server Error')

@section('content')
<div class="relative min-h-screen bg-gray-900 flex items-center justify-center p-4">
    <!-- Stars Background -->
    <div class="stars"></div>

    <!-- Space Background Gradients -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-red-900/50 via-orange-800/50 to-yellow-900/50 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-yellow-900/50 via-red-800/50 to-orange-900/50 rounded-full blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="glass-container relative w-full max-w-2xl rounded-2xl p-8 overflow-hidden z-10">
        <div class="text-center space-y-8">
            <!-- Meteor Animation -->
            <div class="relative w-64 h-64 mx-auto">
                <div class="animate-portal text-red-500/80">
                    <svg class="w-full h-full drop-shadow-[0_0_15px_rgba(239,68,68,0.3)]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                            d="M13 3l9 9-9 9M5 3l9 9-9 9">
                            <animate attributeName="stroke-dasharray" values="0 100;100 100" dur="2s" repeatCount="indefinite"/>
                        </path>
                        <path class="opacity-50" stroke-width="1" stroke-linecap="round"
                            d="M3 12h18">
                            <animate attributeName="stroke-dasharray" values="0 20;20 20" dur="1.5s" repeatCount="indefinite"/>
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Error Code -->
            <h1 class="text-[10rem] font-bold text-gradient bg-gradient-to-r from-red-400 via-orange-500 to-yellow-500 leading-none md:text-[12rem]">
                500
            </h1>

            <!-- Error Message -->
            <div class="space-y-4">
                <h2 class="text-3xl md:text-4xl font-bold text-white drop-shadow-[0_0_10px_rgba(239,68,68,0.3)]">
                    Houston, we have a problem!
                </h2>
                <p class="text-gray-300 text-lg max-w-md mx-auto">
                    Our systems are experiencing some turbulence. Our team of space engineers is working to fix it.
                </p>
            </div>

            <!-- Action Button -->
            <div class="flex justify-center">
                <button onclick="window.location.reload()" 
                    class="space-btn group px-8 py-4 bg-gradient-to-r from-red-600 to-orange-600 rounded-xl font-medium text-white shadow-lg shadow-red-500/25 hover:shadow-red-500/40">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 transform transition-transform group-hover:rotate-180" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Restart Systems
                    </span>
                </button>
            </div>

            <!-- Technical Details -->
            <div class="mt-8 pt-8 border-t border-white/10">
                <p class="text-sm text-gray-400">
                    Error ID: {{ Str::random(8) }} | Mission Control has been notified
                </p>
            </div>
        </div>
    </div>
</div>

<style>
/* Space Theme Animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(-5deg);
    }
}

@keyframes twinkle {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.3;
    }
}

@keyframes meteor {
    0% {
        transform: translate(-50%, -50%) rotate(0deg);
    }
    100% {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

/* Stars Background */
.stars {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    background: 
        radial-gradient(circle at 20% 20%, white 1px, transparent 1px),
        radial-gradient(circle at 40% 50%, white 1px, transparent 1px),
        radial-gradient(circle at 60% 30%, white 1px, transparent 1px),
        radial-gradient(circle at 80% 70%, white 1px, transparent 1px);
    background-size: 200px 200px;
    animation: twinkle 4s ease-in-out infinite;
}

/* Meteor Animation */
.meteor {
    position: relative;
    width: 100%;
    height: 100%;
    color: #ef4444;
    animation: meteor 20s linear infinite;
}

.meteor svg {
    filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.5));
}

/* Enhanced Container Styles */
.glass-container {
    background: rgba(13, 17, 23, 0.7);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Button Hover Effects */
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(239, 68, 68, 0.4);
}

.btn:active {
    transform: translateY(0);
}

/* Text Gradient Animation */
.text-gradient {
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradient 4s linear infinite;
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
</style>
@endsection 