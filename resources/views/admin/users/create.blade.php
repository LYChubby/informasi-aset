<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-400 via-red-400 to-pink-400 opacity-10"></div>
            <div class="relative">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 leading-tight flex items-center">
                    <div class="p-3 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg mr-4 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    {{ __('Tambah Pengguna Baru') }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2 ml-20">Buat akun pengguna baru dengan mudah dan aman</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4 mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">Informasi Dasar</span>
                    </div>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-orange-500 to-red-500 h-2 rounded-full shadow-sm" style="width: 100%"></div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl sm:rounded-2xl border-t-4 border-gradient-to-r from-orange-500 to-red-500 transform transition-all duration-300 hover:shadow-3xl">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-orange-50 to-red-50 dark:from-gray-700 dark:to-gray-600 px-8 py-6 border-b border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Detail Pengguna</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Lengkapi semua informasi yang diperlukan</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 bg-red-400 rounded-full animate-pulse"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Name Field -->
                            <div class="group space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg mr-3 group-focus-within:scale-110 transition-transform duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                                    </div>
                                    <span class="text-red-500 text-sm">*</span>
                                </div>
                                <div class="relative">
                                    <x-text-input id="name" 
                                        class="block w-full pl-4 pr-12 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-300 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                        type="text" 
                                        name="name" 
                                        :value="old('name')" 
                                        required 
                                        autofocus 
                                        placeholder="Masukkan nama lengkap" />
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 transition-opacity duration-300" id="name-indicator"></div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm animate-fade-in" />
                            </div>

                            <!-- Email Field -->
                            <div class="group space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg mr-3 group-focus-within:scale-110 transition-transform duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                                    </div>
                                    <span class="text-red-500 text-sm">*</span>
                                </div>
                                <div class="relative">
                                    <x-text-input id="email" 
                                        class="block w-full pl-4 pr-12 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-300 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                        type="email" 
                                        name="email" 
                                        :value="old('email')" 
                                        required 
                                        placeholder="contoh@email.com" />
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 transition-opacity duration-300" id="email-indicator"></div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm animate-fade-in" />
                            </div>

                            <!-- Password Field -->
                            <div class="group space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg mr-3 group-focus-within:scale-110 transition-transform duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                                    </div>
                                    <span class="text-red-500 text-sm">*</span>
                                </div>
                                <div class="relative">
                                    <x-text-input id="password" 
                                        class="block w-full pl-4 pr-12 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-300 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                        type="password" 
                                        name="password" 
                                        required 
                                        autocomplete="new-password" 
                                        placeholder="Minimal 8 karakter" />
                                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600" onclick="togglePassword('password')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Password Strength Indicator -->
                                <div class="mt-2">
                                    <div class="flex space-x-1">
                                        <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-600" id="strength-1"></div>
                                        <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-600" id="strength-2"></div>
                                        <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-600" id="strength-3"></div>
                                        <div class="h-1 flex-1 rounded-full bg-gray-200 dark:bg-gray-600" id="strength-4"></div>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1" id="password-feedback">Password harus minimal 8 karakter</p>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm animate-fade-in" />
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="group space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-lg mr-3 group-focus-within:scale-110 transition-transform duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                                    </div>
                                    <span class="text-red-500 text-sm">*</span>
                                </div>
                                <div class="relative">
                                    <x-text-input id="password_confirmation" 
                                        class="block w-full pl-4 pr-12 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-300 bg-gray-50 dark:bg-gray-700 hover:bg-white dark:hover:bg-gray-600" 
                                        type="password" 
                                        name="password_confirmation" 
                                        required 
                                        placeholder="Ulangi password" />
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                                        <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 transition-opacity duration-300" id="confirm-indicator"></div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm animate-fade-in" />
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="mt-8">
                            <div class="group space-y-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg mr-3 group-focus-within:scale-110 transition-transform duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <x-input-label for="role" :value="__('Pilih Role Pengguna')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                    <span class="text-red-500 text-sm ml-2">*</span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <!-- Admin Role Card -->
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="is_admin" class="sr-only peer" {{ old('role') == 'is_admin' ? 'checked' : '' }}>
                                        <div class="p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl transition-all duration-300 peer-checked:border-orange-500 peer-checked:bg-orange-50 dark:peer-checked:bg-orange-900/20 hover:shadow-lg hover:scale-105 peer-checked:shadow-xl peer-checked:shadow-orange-500/25">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center">
                                                    <div class="p-3 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg mr-3">
                                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Administrator</h3>
                                                </div>
                                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full peer-checked:border-orange-500 peer-checked:bg-orange-500 flex items-center justify-center transition-all duration-200">
                                                    <div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100"></div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Akses penuh ke semua fitur sistem, dapat mengelola pengguna dan konfigurasi</p>
                                            <div class="mt-3 flex flex-wrap gap-2">
                                                <span class="px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs rounded-full">Full Access</span>
                                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded-full">User Management</span>
                                            </div>
                                        </div>
                                    </label>

                                    <!-- Karyawan Role Card -->
                                    <label class="cursor-pointer">
                                        <input type="radio" name="role" value="is_karyawan" class="sr-only peer" {{ old('role') == 'is_karyawan' ? 'selected' : '' }}>
                                        <div class="p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl transition-all duration-300 peer-checked:border-orange-500 peer-checked:bg-orange-50 dark:peer-checked:bg-orange-900/20 hover:shadow-lg hover:scale-105 peer-checked:shadow-xl peer-checked:shadow-orange-500/25">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center">
                                                    <div class="p-3 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg mr-3">
                                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Karyawan</h3>
                                                </div>
                                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full peer-checked:border-orange-500 peer-checked:bg-orange-500 flex items-center justify-center transition-all duration-200">
                                                    <div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100"></div>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Akses terbatas untuk operasional harian, fokus pada tugas dan tanggung jawab</p>
                                            <div class="mt-3 flex flex-wrap gap-2">
                                                <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs rounded-full">Limited Access</span>
                                                <span class="px-2 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs rounded-full">Operations</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('role')" class="mt-2 text-sm animate-fade-in" />
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between mt-12 pt-8 border-t border-gray-200 dark:border-gray-600">
                            <a href="{{ route('admin.users.index') }}" 
                               class="inline-flex items-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-sm font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-600 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                            
                            <div class="flex space-x-4">
                                <button type="button" 
                                        class="inline-flex items-center px-6 py-3 border-2 border-orange-300 text-sm font-medium rounded-xl text-orange-700 bg-orange-50 hover:bg-orange-100 focus:outline-none focus:ring-4 focus:ring-orange-200 transition-all duration-300 hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Preview
                                </button>
                                
                                <x-primary-button class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 dark:from-orange-500 dark:to-red-500 dark:hover:from-orange-600 dark:hover:to-red-600 focus:ring-orange-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Buat Pengguna
                                    <div class="ml-2 w-2 h-2 bg-white rounded-full animate-ping"></div>
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-6 border border-blue-200 dark:border-gray-600">
                <div class="flex items-start">
                    <div class="p-2 bg-blue-500 rounded-lg mr-4 flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Tips Membuat Pengguna</h4>
                        <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li>• Pastikan email yang digunakan valid dan belum terdaftar</li>
                            <li>• Password minimal 8 karakter dengan kombinasi huruf dan angka</li>
                            <li>• Pilih role sesuai dengan tanggung jawab pengguna</li>
                            <li>• Admin memiliki akses penuh, Karyawan memiliki akses terbatas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 5px rgba(249, 115, 22, 0.5); }
            50% { box-shadow: 0 0 20px rgba(249, 115, 22, 0.8), 0 0 30px rgba(249, 115, 22, 0.4); }
        }
        
        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        .group:focus-within .group-focus-within\:scale-110 {
            transform: scale(1.1);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f97316, #dc2626);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #ea580c, #b91c1c);
        }
    </style>

    <!-- JavaScript for Interactivity -->
    <script>
        // Password strength checker
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrength(strength);
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return Math.min(strength, 4);
        }

        function updatePasswordStrength(strength) {
            const indicators = ['strength-1', 'strength-2', 'strength-3', 'strength-4'];
            const colors = ['bg-red-500', 'bg-yellow-500', 'bg-blue-500', 'bg-green-500'];
            const feedback = [
                'Password terlalu lemah',
                'Password lemah',
                'Password sedang',
                'Password kuat',
                'Password sangat kuat'
            ];

            indicators.forEach((id, index) => {
                const element = document.getElementById(id);
                element.className = 'h-1 flex-1 rounded-full transition-all duration-300';
                if (index < strength) {
                    element.classList.add(colors[Math.min(strength - 1, 3)]);
                } else {
                    element.classList.add('bg-gray-200', 'dark:bg-gray-600');
                }
            });

            document.getElementById('password-feedback').textContent = feedback[strength];
        }

        // Password confirmation check
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

        // Input validation indicators
        document.getElementById('name').addEventListener('input', function(e) {
            const indicator = document.getElementById('name-indicator');
            if (e.target.value.length >= 2) {
                indicator.style.opacity = '1';
            } else {
                indicator.style.opacity = '0';
            }
        });

        document.getElementById('email').addEventListener('input', function(e) {
            const indicator = document.getElementById('email-indicator');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(e.target.value)) {
                indicator.style.opacity = '1';
            } else {
                indicator.style.opacity = '0';
            }
        });

        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }

        // Form submission with loading state
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitButton = document.querySelector('x-primary-button');
            const originalContent = submitButton.innerHTML;
            
            submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Membuat Pengguna...
            `;
            
            submitButton.disabled = true;
        });

        // Add floating animation to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.hover\\:scale-105');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.05)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</x-app-layout>