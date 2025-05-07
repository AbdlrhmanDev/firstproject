@extends('dashboard')

@section('dashboard-content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 relative overflow-hidden">
        <!-- Enhanced Animated Background Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Animated Gradient Orbs with Parallax Effect -->
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-blue-500/30 to-purple-500/30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-gradient-to-r from-pink-500/30 to-rose-500/30 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-gradient-to-r from-emerald-500/30 to-teal-500/30 rounded-full blur-3xl animate-float-slow"></div>
            
            <!-- Additional Decorative Elements -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-500/5 via-transparent to-transparent"></div>
            <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:50px_50px]"></div>
            
            <!-- Animated Particles -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
        </div>

        <!-- Form Container with Enhanced Glass Effect -->
        <div class="w-full max-w-4xl mx-auto p-8 relative z-10">
            <!-- Form Card with Improved Glass Effect -->
            <div class="bg-white/10 backdrop-blur-2xl border border-white/20 rounded-2xl shadow-2xl overflow-hidden
                        transition-all duration-500 hover:shadow-blue-500/10 hover:border-blue-500/20
                        transform hover:scale-[1.01] relative group">
                <!-- Enhanced Form Header -->
                <div class="relative p-8 text-center border-b border-white/10 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-pink-600/20 animate-gradient-x"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-500/10 via-transparent to-transparent"></div>
                    <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 relative z-10 mb-2">
                        Create Your Resume
                    </h2>
                    <p class="text-blue-300/80 relative z-10">Showcase your professional journey</p>
                </div>

                <!-- Form Content with Enhanced Spacing -->
                <div class="p-8">
                    <form action="{{ route('user.resume.store') }}" method="POST" class="space-y-8" x-data="{ 
                        skills: [],
                        newSkill: '',
                        addSkill() {
                            if (this.newSkill.trim() !== '') {
                                this.skills.push(this.newSkill.trim());
                                this.newSkill = '';
                            }
                        }
                    }">
                        @csrf

                        <!-- Form Grid with Improved Layout -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Enhanced Input Fields -->
                            <div class="relative group">
                                <input type="text" id="full_name" name="full_name" required value="{{ old('full_name') }}"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10
                                    before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-r 
                                    before:from-blue-500/10 before:to-purple-500/10 before:rounded-xl 
                                    before:opacity-0 before:transition-opacity before:duration-300
                                    hover:before:opacity-100
                                    relative overflow-hidden">
                                <label for="full_name"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Full Name
                                </label>
                                @error('full_name') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Repeat enhanced styling for other input fields -->
                            <!-- Phone -->
                            <div class="relative group">
                                <input type="text" id="phone" name="phone" required value="{{ old('phone') }}"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10">
                                <label for="phone"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Phone
                                </label>
                                @error('phone') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="relative group">
                                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10">
                                <label for="email"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Email
                                </label>
                                @error('email') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="relative group">
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10">
                                <label for="address"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Address
                                </label>
                                @error('address') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Enhanced Skills Section -->
                        <div class="space-y-4">
                            <label class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-500/20 to-purple-500/20 
                                        border border-blue-500/30 text-white font-semibold shadow-lg shadow-blue-500/10
                                        before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-r 
                                        before:from-blue-500/10 before:to-purple-500/10 before:rounded-full 
                                        before:opacity-0 before:transition-opacity before:duration-300
                                        hover:before:opacity-100
                                        relative overflow-hidden">
                                <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Skills
                            </label>
                            
                            <!-- Enhanced Skills Input -->
                            <div class="flex gap-3">
                                <div class="relative group flex-1">
                                    <input type="text" 
                                        x-model="newSkill" 
                                        @keydown.enter.prevent="addSkill"
                                        placeholder="Add a skill..."
                                        class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                        focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                        transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                        shadow-lg shadow-black/10">
                                    <label class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                        peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                        peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                        Add a skill...
                                    </label>
                                </div>
                                <button type="button" 
                                        @click="addSkill"
                                        class="px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl 
                                        hover:from-blue-500 hover:to-purple-500 transition-all duration-300 hover:scale-105 
                                        focus:ring-2 focus:ring-blue-500/50 shadow-lg shadow-blue-500/25
                                        relative group overflow-hidden
                                        before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-r 
                                        before:from-blue-500/20 before:to-purple-500/20 before:rounded-xl 
                                        before:opacity-0 before:transition-opacity before:duration-300
                                        hover:before:opacity-100">
                                    <span class="relative z-10 flex items-center">
                                        <svg class="w-5 h-5 mr-2 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Add
                                    </span>
                                </button>
                            </div>

                            <!-- Enhanced Skills Tags Display -->
                            <div class="flex flex-wrap gap-3 min-h-[100px] p-6 rounded-xl bg-white/5 border border-white/20 
                                    transition-all duration-300 group-hover:border-blue-300/30 shadow-lg shadow-black/10">
                                <template x-for="(skill, index) in skills" :key="index">
                                    <div class="group flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500/20 to-purple-500/20 
                                            rounded-full border border-white/20 transition-all duration-300 hover:scale-105 
                                            hover:border-blue-300/30 shadow-lg shadow-black/10">
                                        <span x-text="skill" class="text-white text-sm"></span>
                                        <button type="button" 
                                                @click="skills.splice(index, 1)"
                                                class="text-gray-400 hover:text-red-400 transition-colors duration-300 p-1 hover:bg-white/10 rounded-full">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <input type="hidden" name="skills" x-bind:value="skills.join(',')">
                        </div>

                        <!-- Enhanced Text Areas -->
                        <div class="space-y-6">
                            <!-- Experience -->
                            <div class="relative group">
                                <textarea id="experience" name="experience" rows="4"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10 resize-none"
                                    placeholder="Experience">{{ old('experience') }}</textarea>
                                <label for="experience"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Experience
                                </label>
                                @error('experience') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Education -->
                            <div class="relative group">
                                <textarea id="education" name="education" rows="4"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10 resize-none"
                                    placeholder="Education">{{ old('education') }}</textarea>
                                <label for="education"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Education
                                </label>
                                @error('education') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Summary -->
                            <div class="relative group">
                                <textarea id="summary" name="summary" rows="4"
                                    class="peer w-full p-4 rounded-xl bg-white/5 border border-white/20 text-white placeholder-transparent 
                                    focus:outline-none focus:border-blue-500/50 focus:ring-2 focus:ring-blue-500/25 
                                    transition-all duration-300 group-hover:bg-white/10 group-hover:border-blue-300/30
                                    shadow-lg shadow-black/10 resize-none"
                                    placeholder="Summary">{{ old('summary') }}</textarea>
                                <label for="summary"
                                    class="absolute left-4 -top-2.5 text-sm text-gray-300 bg-gray-900 px-2 transition-all duration-300
                                    peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent
                                    peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-blue-400 peer-focus:bg-gray-900">
                                    Summary
                                </label>
                                @error('summary') 
                                    <p class="text-red-400 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Enhanced Submit Button -->
                        <button type="submit"
                            class="w-full p-4 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 bg-[length:200%_100%] 
                            text-white text-lg font-semibold rounded-xl transition-all duration-300 transform 
                            hover:scale-[1.02] hover:shadow-xl hover:shadow-blue-500/25 focus:ring-2 focus:ring-blue-500/50 
                            relative group overflow-hidden animate-gradient-x
                            before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-r 
                            before:from-blue-500/20 before:to-purple-500/20 before:rounded-xl 
                            before:opacity-0 before:transition-opacity before:duration-300
                            hover:before:opacity-100">
                            <span class="relative z-10 flex items-center justify-center">
                                <svg class="w-6 h-6 mr-2 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Save Resume
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.4; }
            50% { transform: translateY(-20px) scale(1.05); opacity: 0.7; }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 2s;
        }
        .animate-float-slow {
            animation: float 8s ease-in-out infinite;
            animation-delay: 4s;
        }
        @keyframes gradient-x {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient-x {
            animation: gradient-x 15s ease infinite;
        }
        .bg-grid-white {
            background-image: linear-gradient(to right, rgba(255,255,255,0.1) 1px, transparent 1px),
                            linear-gradient(to bottom, rgba(255,255,255,0.1) 1px, transparent 1px);
        }
        
        /* Particle Animation */
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: particle-float 15s infinite;
        }
        
        .particle:nth-child(1) {
            top: 20%;
            left: 20%;
            animation-delay: 0s;
        }
        
        .particle:nth-child(2) {
            top: 60%;
            left: 40%;
            animation-delay: 2s;
        }
        
        .particle:nth-child(3) {
            top: 40%;
            left: 60%;
            animation-delay: 4s;
        }
        
        .particle:nth-child(4) {
            top: 80%;
            left: 80%;
            animation-delay: 6s;
        }
        
        .particle:nth-child(5) {
            top: 30%;
            left: 90%;
            animation-delay: 8s;
        }
        
        @keyframes particle-float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
    </style>
@endsection