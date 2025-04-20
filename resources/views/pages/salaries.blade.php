@extends('layouts.app')

@section('title', 'Salaries')

@section('content')
    <div class="relative mt-10 mb-36 ">
        {{-- Background Effects --}}
        <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
            <div class="w-[600px] h-[600px] bg-gradient-to-br from-green-600/20 via-blue-500/20 to-purple-400/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
            <div class="w-[400px] h-[400px] bg-gradient-to-tr from-indigo-500/20 via-fuchsia-500/20 to-teal-400/20 rounded-full blur-3xl opacity-50 animate-slow-spin-reverse"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4">
            {{-- Page Header --}}
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">💰 Salary Insights</h2>
                <p class="text-gray-400 mt-2">Explore salary data for various roles</p>
            </div>

            {{-- Salaries Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($salaries as $salary)
                    <div class="group relative animate-slide-up" style="animation-delay: {{ $loop->index * 100 }}ms">
                        <div class="relative h-full bg-white/[0.05] backdrop-blur-xl rounded-xl border border-white/10 p-6 transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl hover:shadow-white/5">
                            {{-- Role Title --}}
                            <div class="flex justify-between items-start gap-4 mb-6">
                                <div>
                                    <h3 class="text-xl font-bold text-white group-hover:text-green-400 transition-colors duration-300">{{ $salary->role }}</h3>
                                </div>
                            </div>

                            {{-- Salary Amount --}}
                            <div class="flex items-center gap-2 group-hover:translate-x-1 transition-transform duration-300">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-green-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-2xl font-bold text-white group-hover:text-green-400 transition-colors duration-300">
                                    {{ $salary->amount }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="text-center p-8 rounded-xl bg-white/[0.05] backdrop-blur-xl border border-white/10">
                            <p class="text-gray-400">No salary data available at the moment. 😔</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Animations Style --}}
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

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-slide-up {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
        }
    </style>

    {{-- Footer --}}
    @include('layouts.footer')
@endsection