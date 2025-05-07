<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Error') - {{ config('app.name') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #000;
            color: #fff;
            overflow-x: hidden;
        }

        /* Enhanced Background Effects */
        .bg-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            mask-image: radial-gradient(circle at center, black, transparent 80%);
            z-index: 0;
        }

        .bg-noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.05;
            z-index: 1;
        }

        /* Enhanced Gradient Animations */
        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.5;
                transform: scale(1) rotate(0deg);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.05) rotate(5deg);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(-5deg);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shine {
            0% {
                mask-position: -50% 0;
            }
            100% {
                mask-position: 150% 0;
            }
        }

        /* Enhanced Button Styles */
        .btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: linear-gradient(115deg, 
                transparent 0%, 
                transparent 25%, 
                rgba(255, 255, 255, 0.1) 45%, 
                rgba(255, 255, 255, 0.2) 50%, 
                rgba(255, 255, 255, 0.1) 55%, 
                transparent 75%, 
                transparent 100%);
            mask-image: linear-gradient(#fff 0 0);
            animation: shine 8s infinite;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px rgba(var(--btn-glow-color, 147, 51, 234), 0.5);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Enhanced Text Effects */
        .text-gradient {
            background-size: 200% auto;
            animation: gradient 4s linear infinite;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(var(--text-glow-color, 147, 51, 234), 0.5),
                         0 0 20px rgba(var(--text-glow-color, 147, 51, 234), 0.3),
                         0 0 30px rgba(var(--text-glow-color, 147, 51, 234), 0.1);
        }

        /* Enhanced Container Styles */
        .glass-container {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .glass-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(255, 255, 255, 0.2) 50%, 
                transparent 100%);
        }

        /* Animation Classes */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-gradient {
            animation: gradient 4s linear infinite;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .glass-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .text-gradient {
                font-size: 5rem;
            }
        }
    </style>
</head>
<body class="antialiased">
    <!-- Background Effects -->
    <div class="bg-grid"></div>
    <div class="bg-noise"></div>

    <!-- Content -->
    <main class="relative min-h-screen flex items-center justify-center p-4">
        @yield('content')
    </main>
</body>
</html> 