@extends('dashboard')

@section('dashboard-content')
    <div class="flex items-center justify-center min-h-screen bg-opacity-80 relative">
        <!-- Background Effects -->
        <div class="absolute -top-20 -left-20 w-[400px] h-[400px] bg-gradient-to-br from-purple-600/20 via-blue-500/20 to-teal-400/20 rounded-full blur-3xl animate-slow-spin"></div>
        <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-500/20 via-fuchsia-500/20 to-pink-500/20 rounded-full blur-3xl animate-slow-spin-reverse"></div>

        <!-- Resume Edit Form -->
        <div class="w-full max-w-3xl bg-gradient-to-br from-gray-900/80 to-gray-800/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl p-8 text-white z-10">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Edit Resume</h2>
                <p class="text-gray-400 mt-2">Update Your Professional Profile</p>
            </div>

            <form action="{{ route('user.resume.update', $resume->id) }}" method="POST" class="space-y-6" x-data="{ 
                skills: {{ $resume->skills ? collect(explode(',', $resume->skills))->map(fn($skill) => trim($skill))->filter()->values()->toJson() : '[]' }},
                newSkill: '',
                addSkill() {
                    if (this.newSkill.trim() !== '') {
                        this.skills.push(this.newSkill.trim());
                        this.newSkill = '';
                    }
                }
            }">
                @csrf
                @method('PUT')

                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h4>

                    <!-- Full Name -->
                    <div class="relative">
                        <input type="text" id="full_name" name="full_name" required
                            value="{{ old('full_name', $resume->full_name) }}"
                            class="peer w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                   placeholder-transparent focus:outline-none focus:border-blue-400 
                                   focus:ring-1 focus:ring-blue-400 transition-all">
                        <label for="full_name"
                            class="absolute left-4 -top-2.5 text-sm text-gray-400 transition-all 
                                   peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 
                                   peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-sm 
                                   peer-focus:text-blue-400">
                            Full Name
                        </label>
                        @error('full_name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Contact Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div class="relative">
                            <input type="text" id="phone" name="phone" required 
                                value="{{ old('phone', $resume->phone) }}"
                                class="peer w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                       placeholder-transparent focus:outline-none focus:border-blue-400 
                                       focus:ring-1 focus:ring-blue-400 transition-all">
                            <label for="phone"
                                class="absolute left-4 -top-2.5 text-sm text-gray-400 transition-all 
                                       peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 
                                       peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-sm 
                                       peer-focus:text-blue-400">
                                Phone
                            </label>
                            @error('phone') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="relative">
                            <input type="email" id="email" name="email" required 
                                value="{{ old('email', $resume->email) }}"
                                class="peer w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                       placeholder-transparent focus:outline-none focus:border-blue-400 
                                       focus:ring-1 focus:ring-blue-400 transition-all">
                            <label for="email"
                                class="absolute left-4 -top-2.5 text-sm text-gray-400 transition-all 
                                       peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 
                                       peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-sm 
                                       peer-focus:text-blue-400">
                                Email
                            </label>
                            @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="relative">
                        <input type="text" id="address" name="address" 
                            value="{{ old('address', $resume->address) }}"
                            class="peer w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                   placeholder-transparent focus:outline-none focus:border-blue-400 
                                   focus:ring-1 focus:ring-blue-400 transition-all">
                        <label for="address"
                            class="absolute left-4 -top-2.5 text-sm text-gray-400 transition-all 
                                   peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 
                                   peer-placeholder-shown:top-4 peer-focus:-top-2.5 peer-focus:text-sm 
                                   peer-focus:text-blue-400">
                            Address
                        </label>
                        @error('address') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Skills Section -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        Skills
                    </h4>
                    
                    <!-- Skills Input -->
                    <div class="flex gap-2">
                        <input type="text" 
                               x-model="newSkill" 
                               @keydown.enter.prevent="addSkill"
                               placeholder="Add a skill..."
                               class="flex-1 p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                      placeholder-gray-500 focus:outline-none focus:border-blue-400 
                                      focus:ring-1 focus:ring-blue-400 transition-all">
                        <button type="button" 
                                @click="addSkill"
                                class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white 
                                       rounded-xl transition-all duration-300 hover:scale-105 
                                       hover:shadow-lg hover:shadow-purple-500/25">
                            Add
                        </button>
                    </div>

                    <!-- Skills Tags Display -->
                    <div class="flex flex-wrap gap-2 min-h-[50px] p-4 rounded-xl bg-white/5 border border-white/10">
                        <template x-for="(skill, index) in skills" :key="index">
                            <div class="group flex items-center gap-2 px-3 py-1 bg-gray-800/80 rounded-full 
                                      border border-gray-700 transition-all duration-300 
                                      hover:bg-gray-700/50 hover:border-gray-600">
                                <span x-text="skill" class="text-gray-300 text-sm"></span>
                                <button type="button" 
                                        @click="skills.splice(index, 1)"
                                        class="text-gray-400 hover:text-red-400 transition-colors duration-300">
                                    ×
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Hidden input to store skills -->
                    <input type="hidden" name="skills" x-bind:value="skills.join(',')">
                </div>

                <!-- Experience Section -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Experience
                    </h4>
                    <div class="relative">
                        <textarea id="experience" name="experience" rows="4"
                            class="w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                   focus:outline-none focus:border-blue-400 focus:ring-1 
                                   focus:ring-blue-400 transition-all">{{ old('experience', $resume->experience) }}</textarea>
                        @error('experience') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Education Section -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                        Education
                    </h4>
                    <div class="relative">
                        <textarea id="education" name="education" rows="4"
                            class="w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                   focus:outline-none focus:border-blue-400 focus:ring-1 
                                   focus:ring-blue-400 transition-all">{{ old('education', $resume->education) }}</textarea>
                        @error('education') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Summary
                    </h4>
                    <div class="relative">
                        <textarea id="summary" name="summary" rows="4"
                            class="w-full p-4 rounded-xl bg-white/5 border border-white/10 text-white 
                                   focus:outline-none focus:border-blue-400 focus:ring-1 
                                   focus:ring-blue-400 transition-all">{{ old('summary', $resume->summary) }}</textarea>
                        @error('summary') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <button type="submit"
                        class="flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 
                               text-white rounded-xl font-medium transition-all duration-300 hover:scale-105 
                               hover:shadow-lg hover:shadow-purple-500/25">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Resume
                    </button>

                    <a href="{{ route('user.resume.index') }}"
                        class="flex items-center gap-2 px-6 py-3 bg-gray-800/50 border border-gray-700
                               text-white rounded-xl font-medium transition-all duration-300 hover:scale-105
                               hover:bg-gray-700/50 hover:border-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
    @keyframes slow-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes slow-spin-reverse {
        from { transform: rotate(360deg); }
        to { transform: rotate(0deg); }
    }

    .animate-slow-spin {
        animation: slow-spin 20s linear infinite;
    }

    .animate-slow-spin-reverse {
        animation: slow-spin-reverse 25s linear infinite;
    }
    </style>
@endsection