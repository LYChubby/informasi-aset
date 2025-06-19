<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-r from-orange-400 to-pink-500 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                    {{ __('Edit Pengguna') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Perbarui informasi pengguna dengan mudah</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r from-orange-400 to-pink-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Informasi Pengguna</span>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 relative">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-400 via-pink-500 to-purple-600"></div>
                <div class="absolute top-4 right-4 opacity-10">
                    <svg class="w-32 h-32 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                    </svg>
                </div>

                <div class="p-8 relative">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Personal Information Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Personal</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <x-text-input id="name" 
                                            class="block w-full pl-10 pr-3 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                            type="text" 
                                            name="name" 
                                            :value="old('name', $user->name)" 
                                            placeholder="Masukkan nama lengkap"
                                            required 
                                            autofocus />
                                        <x-input-label for="name" :value="__('Nama Lengkap')" class="absolute -top-2 left-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-gray-700 dark:text-gray-300 transition-all duration-200" />
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm" />
                                </div>

                                <!-- Email -->
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <x-text-input id="email" 
                                            class="block w-full pl-10 pr-3 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                            type="email" 
                                            name="email" 
                                            :value="old('email', $user->email)" 
                                            placeholder="contoh@email.com"
                                            required />
                                        <x-input-label for="email" :value="__('Email')" class="absolute -top-2 left-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0985" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Keamanan</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Password -->
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <x-text-input id="password" 
                                            class="block w-full pl-10 pr-12 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                            type="password" 
                                            name="password" 
                                            placeholder="Biarkan kosong jika tidak ingin mengubah"
                                            autocomplete="new-password" />
                                        <button type="button" 
                                            onclick="togglePasswordVisibility('password')"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-orange-500 transition-colors duration-200">
                                            <svg id="password-eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg id="password-eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                                            </svg>
                                        </button>
                                        <x-input-label for="password" :value="__('Password Baru')" class="absolute -top-2 left-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Kosongkan jika tidak ingin mengubah password</p>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="group">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-focus-within:text-orange-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <x-text-input id="password_confirmation" 
                                            class="block w-full pl-10 pr-12 py-3 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                            type="password" 
                                            name="password_confirmation" 
                                            placeholder="Konfirmasi password baru" />
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 transition-opacity duration-300" id="confirm-indicator"></div>
                                    </div>
                                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="absolute -top-2 left-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm" />
                                </div>
                            </div>
                        </div>

                        <!-- Role Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Peran & Akses</h3>
                            </div>

                            <div class="max-w-md">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        </svg>
                                    </div>
                                    <select id="role" name="role" 
                                        class="block w-full pl-10 pr-8 py-3 border-2 border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-xl shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 bg-gray-50 hover:bg-white dark:hover:bg-gray-600 appearance-none cursor-pointer" 
                                        required>
                                        <option value="is_admin" {{ old('role', $user->role) == 'is_admin' ? 'selected' : '' }}>
                                            👑 Administrator
                                        </option>
                                        <option value="is_karyawan" {{ old('role', $user->role) == 'is_karyawan' ? 'selected' : '' }}>
                                            👨‍💼 Karyawan
                                        </option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <x-input-label for="role" :value="__('Role Pengguna')" class="absolute -top-2 left-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2 text-sm" />
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-8 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.users.index') }}" 
                                class="inline-flex items-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-sm font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-sm hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Batal
                            </a>
                            
                            <x-primary-button class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-500 to-pink-500 hover:from-orange-600 hover:to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Update Pengguna
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6 border border-blue-200 dark:border-gray-600">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-100">Tips untuk mengedit pengguna:</h4>
                        <ul class="mt-2 text-sm text-blue-800 dark:text-blue-200 space-y-1">
                            <li>• Pastikan email yang digunakan unik dan valid</li>
                            <li>• Kosongkan field password jika tidak ingin mengubah password</li>
                            <li>• Role Administrator memiliki akses penuh, sementara Karyawan memiliki akses terbatas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeOpen = document.getElementById(fieldId + '-eye-open');
            const eyeClosed = document.getElementById(fieldId + '-eye-closed');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordField.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }

        document.getElementById('password_confirmation').addEventListener('input', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = e.target.value;
            const indicator = document.getElementById('confirm-indicator');
            
            if (confirmPassword && password === confirmPassword) {
                indicator.style.opacity = '1';
            } else {
                indicator.style.opacity = '0';
            }
        });
        // Add smooth focus transitions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.group').classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.closest('.group').classList.remove('focused');
                });
            });
        });
    </script>
</x-app-layout>