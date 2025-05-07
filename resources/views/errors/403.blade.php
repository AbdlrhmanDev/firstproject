@extends('layouts.app')

@section('title', '403 Forbidden')

@section('content')
<div class="relative min-h-screen bg-gray-900 flex items-center justify-center p-4">
    <!-- Stars Background -->
    <div class="stars"></div>

    <!-- Space Background Gradients -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-yellow-900/50 via-amber-800/50 to-orange-900/50 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-orange-900/50 via-yellow-800/50 to-amber-900/50 rounded-full blur-3xl"></div>
    </div>

    <!-- Main Content -->
    <div class="glass-container relative w-full max-w-2xl rounded-2xl p-8 overflow-hidden z-10">
        <div class="text-center space-y-8">
            <!-- Shield Animation -->
            <div class="relative w-64 h-64 mx-auto">
                <div class="animate-portal text-yellow-500/80">
                    <svg class="w-full h-full drop-shadow-[0_0_15px_rgba(234,179,8,0.3)]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <!-- Shield Body -->
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z">
                            <animate attributeName="stroke-dasharray" values="0 100;100 100" dur="3s"/>
                        </path>
                        <!-- Lock -->
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M8 11h8v4H8v-4zm1-3a3 3 0 116 0">
                            <animate attributeName="stroke-dasharray" values="0 100;100 100" dur="2s" begin="1s"/>
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Error Code -->
            <h1 class="text-[10rem] font-bold text-gradient bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-500 leading-none md:text-[12rem]">
                403
            </h1>

            <!-- Error Message -->
            <div class="space-y-4">
                <h2 class="text-3xl md:text-4xl font-bold text-white drop-shadow-[0_0_10px_rgba(234,179,8,0.3)]">
                    Restricted Space Zone
                </h2>
                <p class="text-gray-300 text-lg max-w-md mx-auto">
                    Access denied. You don't have the necessary clearance to enter this sector.
                </p>
            </div>

            <!-- Action Button -->
            <div class="flex justify-center">
                <a href="{{ url('/') }}" 
                    class="space-btn group px-8 py-4 bg-gradient-to-r from-yellow-600 to-amber-600 rounded-xl font-medium text-white shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 transform transition-transform group-hover:-translate-x-1" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Return to Safe Zone
                    </span>
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 pt-8 border-t border-white/10">
                <p class="text-sm text-gray-400">
                    Need access? Contact Mission Control for proper authorization.
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

@keyframes shield-pulse {
    0%, 100% {
        transform: scale(1);
        filter: drop-shadow(0 0 10px rgba(234, 179, 8, 0.3));
    }
    50% {
        transform: scale(1.05);
        filter: drop-shadow(0 0 20px rgba(234, 179, 8, 0.5));
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

/* Shield Animation */
.shield {
    position: relative;
    width: 100%;
    height: 100%;
    color: #eab308;
    animation: shield-pulse 4s ease-in-out infinite;
}

.shield svg {
    filter: drop-shadow(0 0 15px rgba(234, 179, 8, 0.4));
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
    box-shadow: 0 0 20px rgba(234, 179, 8, 0.4);
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