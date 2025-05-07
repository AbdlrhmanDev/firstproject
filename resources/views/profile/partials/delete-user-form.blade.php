<section class="space-y-6">
    <header>
       
        <p class="mt-2 text-sm text-gray-300">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <!-- Trigger Delete Modal -->
    <button onclick="document.getElementById('delete-modal').classList.remove('hidden')"
        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-900">
        Delete Account
    </button>

    <!-- Modal -->
    <div id="delete-modal"
        class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-2xl w-full max-w-md transform transition-all">
          

            <p class="text-sm text-gray-700 dark:text-gray-400">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter
                your password to confirm you would like to permanently delete your account.
            </p>

            <!-- Form -->
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6">
                @csrf
                @method('DELETE')

                <!-- Password -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="Enter your password"
                        class="pl-10 mt-1 block w-full bg-white/20 text-white border border-gray-500/30 rounded-lg px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-150 ease-in-out" />
                </div>

                @if ($errors->userDeletion->has('password'))
                    <p class="text-sm text-red-400 mt-2">{{ $errors->userDeletion->first('password') }}</p>
                @endif

                <!-- Actions -->
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('delete-modal').classList.add('hidden')"
                        class="px-4 py-2 rounded-lg shadow text-gray-300 hover:bg-gray-700 transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Cancel
                    </button>

                    <button type="submit" 
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow-lg transform transition-all hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>