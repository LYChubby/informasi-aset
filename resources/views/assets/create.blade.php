<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-orange-500 via-orange-600 to-red-500 rounded-xl p-6 shadow-xl">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10">
                <h2 class="text-3xl font-bold text-white leading-tight flex items-center">
                    <div class="bg-white/20 p-3 rounded-lg mr-4 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4a2 2 0 100-4m6 4a2 2 0 100-4m0 4a2 2 0 100 4m0-4a2 2 0 100-4m6-8a2 2 0 100-4m0 4a2 2 0 100 4m0-4a2 2 0 100-4" />
                        </svg>
                    </div>
                    {{ isset($asset) ? __('Edit Aset') : __('Tambah Aset Baru') }}
                </h2>
                <p class="text-orange-100 mt-2 text-lg">
                    {{ isset($asset) ? __('Perbarui informasi aset Anda') : __('Tambahkan aset baru ke dalam sistem') }}
                </p>
            </div>
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progress Pengisian</span>
                        <span class="text-sm font-medium text-orange-600 dark:text-orange-400" id="progress-text">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-orange-500 to-red-500 h-2 rounded-full transition-all duration-500 ease-out" style="width: 0%" id="progress-bar"></div>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200 dark:border-gray-700 relative">
                <!-- Decorative top border with gradient -->
                <div class="h-2 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500"></div>
                
                <!-- Floating decoration -->
                <div class="absolute top-4 right-4 w-20 h-20 bg-gradient-to-br from-orange-500/10 to-red-500/10 rounded-full blur-xl"></div>
                
                <div class="p-8">
                    <form method="POST" action="{{ isset($asset) ? route('assets.update', $asset->id) : route('assets.store') }}" id="asset-form">
                        @csrf
                        @if(isset($asset))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Nama Aset -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-orange-500 to-red-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </div>
                                        <x-input-label for="nama" :value="__('Nama Aset')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative group">
                                        <x-text-input id="nama" 
                                            class="block w-full pl-4 pr-12 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-orange-500 focus:ring-orange-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-orange-300" 
                                            type="text" 
                                            name="nama" 
                                            :value="old('nama', isset($asset) ? $asset->nama : '')" 
                                            required 
                                            autofocus 
                                            placeholder="Masukkan nama aset..." />
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <div class="h-2 w-2 bg-orange-500 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('nama')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-blue-500 to-indigo-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="kategori" :value="__('Kategori')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative group">
                                        <x-text-input id="kategori" 
                                            class="block w-full pl-4 pr-12 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-blue-300" 
                                            type="text" 
                                            name="kategori" 
                                            :value="old('kategori', isset($asset) ? $asset->kategori : '')" 
                                            required 
                                            placeholder="Contoh: Elektronik, Furniture, Kendaraan..." />
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <div class="h-2 w-2 bg-blue-500 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('kategori')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-green-500 to-emerald-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="lokasi" :value="__('Lokasi')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative group">
                                        <x-text-input id="lokasi" 
                                            class="block w-full pl-4 pr-12 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-green-500 focus:ring-green-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-green-300" 
                                            type="text" 
                                            name="lokasi" 
                                            :value="old('lokasi', isset($asset) ? $asset->lokasi : '')" 
                                            required 
                                            placeholder="Contoh: Lantai 2, Ruang IT, Gudang A..." />
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <div class="h-2 w-2 bg-green-500 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('lokasi')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-purple-500 to-violet-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="status" :value="__('Status')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative">
                                        <select id="status" name="status" class="block w-full pl-4 pr-12 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 hover:border-purple-300" required>
                                            <option value="" class="text-gray-500">Pilih status aset...</option>
                                            <option value="aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'aktif') ? 'selected' : '' }} class="bg-green-50 text-green-800 dark:bg-green-900/30 dark:text-green-300">🟢 Aktif</option>
                                            <option value="perbaikan" {{ (old('status', isset($asset) ? $asset->status : '') == 'perbaikan') ? 'selected' : '' }} class="bg-yellow-50 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">🟡 Perbaikan</option>
                                            <option value="non-aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'non-aktif') ? 'selected' : '' }} class="bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-300">🔴 Non-Aktif</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Tanggal Pembelian -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="tanggal_pembelian" :value="__('Tanggal Pembelian')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative group">
                                        <x-text-input id="tanggal_pembelian" 
                                            class="block w-full pl-4 pr-12 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-cyan-300" 
                                            type="date" 
                                            name="tanggal_pembelian" 
                                            :value="old('tanggal_pembelian', isset($asset) ? $asset->tanggal_pembelian->format('Y-m-d') : '')" 
                                            required />
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <div class="h-2 w-2 bg-cyan-500 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('tanggal_pembelian')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Nilai -->
                            <div class="form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="nilai" :value="__('Nilai Aset')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                        <span class="text-red-500 ml-1">*</span>
                                    </div>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-gray-500 dark:text-gray-400 text-lg font-semibold">Rp</span>
                                        </div>
                                        <x-text-input id="nilai" 
                                            class="block w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-yellow-300" 
                                            type="number" 
                                            step="0.01" 
                                            name="nilai" 
                                            :value="old('nilai', isset($asset) ? $asset->nilai : '')" 
                                            required 
                                            placeholder="0.00" />
                                    </div>
                                    <x-input-error :messages="$errors->get('nilai')" class="mt-2 text-sm" />
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="lg:col-span-2 form-group opacity-0 translate-y-4" data-animate>
                                <div class="relative">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-br from-pink-500 to-rose-500 p-2 rounded-lg mr-3 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <x-input-label for="deskripsi" :value="__('Deskripsi')" class="text-gray-700 dark:text-gray-300 font-semibold text-lg" />
                                    </div>
                                    <div class="relative group">
                                        <textarea id="deskripsi" 
                                            name="deskripsi" 
                                            rows="4" 
                                            class="block w-full pl-4 pr-4 py-4 text-lg border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:border-pink-500 focus:ring-pink-500 dark:bg-gray-700 dark:text-gray-300 transition-all duration-300 group-hover:border-pink-300 resize-none" 
                                            placeholder="Tambahkan deskripsi detail mengenai aset ini...">{{ old('deskripsi', isset($asset) ? $asset->deskripsi : '') }}</textarea>
                                    </div>
                                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2 text-sm" />
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end mt-12 space-x-6 opacity-0 translate-y-4" data-animate>
                            <a href="{{ route('assets.index') }}" 
                               class="group inline-flex items-center px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-lg font-semibold rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-lg font-semibold rounded-xl text-white focus:outline-none focus:ring-4 focus:ring-orange-200 transition-all duration-300 hover:scale-105 hover:shadow-xl transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                {{ isset($asset) ? __('Update Aset') : __('Tambah Aset') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-group {
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .form-group.animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Custom animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in-up {
            animation: slideInUp 0.6s ease-out forwards;
        }
        
        /* Hover effects for inputs */
        input:focus, select:focus, textarea:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        /* Button hover effects */
        button:hover, .group:hover {
            transform: translateY(-2px);
        }
        
        /* Progress bar animation */
        #progress-bar {
            transition: width 0.5s ease-in-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate form elements on load
            const formGroups = document.querySelectorAll('[data-animate]');
            formGroups.forEach((group, index) => {
                setTimeout(() => {
                    group.classList.add('animate');
                }, index * 100);
            });
            
            // Progress bar functionality
            const form = document.getElementById('asset-form');
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const requiredFields = form.querySelectorAll('input[required], select[required]');
            
            function updateProgress() {
                let filledFields = 0;
                requiredFields.forEach(field => {
                    if (field.value.trim() !== '') {
                        filledFields++;
                    }
                });
                
                const progress = Math.round((filledFields / requiredFields.length) * 100);
                progressBar.style.width = progress + '%';
                progressText.textContent = progress + '%';
                
                // Change color based on progress
                if (progress < 50) {
                    progressBar.className = 'bg-gradient-to-r from-red-500 to-orange-500 h-2 rounded-full transition-all duration-500 ease-out';
                } else if (progress < 80) {
                    progressBar.className = 'bg-gradient-to-r from-yellow-500 to-orange-500 h-2 rounded-full transition-all duration-500 ease-out';
                } else {
                    progressBar.className = 'bg-gradient-to-r from-green-500 to-emerald-500 h-2 rounded-full transition-all duration-500 ease-out';
                }
            }
            
            // Update progress on input
            requiredFields.forEach(field => {
                field.addEventListener('input', updateProgress);
                field.addEventListener('change', updateProgress);
            });
            
            // Initial progress update
            updateProgress();
            
            // Form validation with smooth animations
            form.addEventListener('submit', function(e) {
                const submitButton = form.querySelector('button[type="submit"]');
                
                // Add loading state
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
                
                // Validate required fields with visual feedback
                let isValid = true;
                requiredFields.forEach(field => {
                    const fieldContainer = field.closest('.form-group');
                    if (!field.value.trim()) {
                        isValid = false;
                        fieldContainer.classList.add('animate-pulse');
                        field.classList.add('border-red-500');
                        
                        // Remove animation after 2 seconds
                        setTimeout(() => {
                            fieldContainer.classList.remove('animate-pulse');
                        }, 2000);
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    submitButton.disabled = false;
                    submitButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        {{ isset($asset) ? __('Update Aset') : __('Tambah Aset') }}
                    `;
                    
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-in-up';
                    errorDiv.innerHTML = `
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Mohon lengkapi semua field yang wajib diisi!
                        </div>
                    `;
                    document.body.appendChild(errorDiv);
                    
                    // Remove error message after 5 seconds
                    setTimeout(() => {
                        errorDiv.remove();
                    }, 5000);
                }
            });
            
            // Add floating label effect
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
                
                // Check if field has value on load
                if (input.value) {
                    input.parentElement.classList.add('focused');
                }
            });
            
            // Add number formatting for currency input
            const nilaiInput = document.getElementById('nilai');
            nilaiInput.addEventListener('input', function(e) {
                // Remove non-numeric characters except decimal point
                let value = e.target.value.replace(/[^\d.]/g, '');
                
                // Ensure only one decimal point
                const parts = value.split('.');
                if (parts.length > 2) {
                    value = parts[0] + '.' + parts.slice(1).join('');
                }
                
                // Limit decimal places to 2
                if (parts[1] && parts[1].length > 2) {
                    value = parts[0] + '.' + parts[1].substring(0, 2);
                }
                
                e.target.value = value;
            });
            
            // Add tooltips for better UX
            const tooltips = [
                { id: 'nama', text: 'Masukkan nama yang jelas dan mudah diidentifikasi' },
                { id: 'kategori', text: 'Kelompokkan aset berdasarkan jenisnya' },
                { id: 'lokasi', text: 'Tentukan lokasi fisik aset berada' },
                { id: 'status', text: 'Pilih kondisi operasional aset saat ini' },
                { id: 'tanggal_pembelian', text: 'Tanggal pembelian untuk menghitung usia aset' },
                { id: 'nilai', text: 'Nilai pembelian atau estimasi nilai saat ini' }
            ];
            
            tooltips.forEach(tooltip => {
                const element = document.getElementById(tooltip.id);
                if (element) {
                    element.setAttribute('title', tooltip.text);
                    
                    // Create custom tooltip
                    const tooltipDiv = document.createElement('div');
                    tooltipDiv.className = 'absolute bottom-full left-0 mb-2 px-3 py-2 bg-gray-800 text-white text-sm rounded-lg opacity-0 pointer-events-none transition-opacity duration-300 z-10 whitespace-nowrap';
                    tooltipDiv.textContent = tooltip.text;
                    
                    element.parentElement.style.position = 'relative';
                    element.parentElement.appendChild(tooltipDiv);
                    
                    element.addEventListener('mouseenter', () => {
                        tooltipDiv.style.opacity = '1';
                    });
                    
                    element.addEventListener('mouseleave', () => {
                        tooltipDiv.style.opacity = '0';
                    });
                }
            });
            
            // Add smooth scroll to first error field
            window.scrollToError = function(fieldName) {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    field.focus();
                }
            };
            
            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + S to save
                if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                    e.preventDefault();
                    form.dispatchEvent(new Event('submit'));
                }
                
                // Escape to cancel
                if (e.key === 'Escape') {
                    const cancelButton = document.querySelector('a[href*="assets.index"]');
                    if (cancelButton) {
                        cancelButton.click();
                    }
                }
            });
        });
        
        // Add success animation for form submission
        function showSuccessMessage(message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-in-up';
            successDiv.innerHTML = `
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ${message}
                </div>
            `;
            document.body.appendChild(successDiv);
            
            setTimeout(() => {
                successDiv.remove();
            }, 5000);
        }
        
        // Add auto-save functionality (optional)
        function autoSave() {
            const formData = new FormData(document.getElementById('asset-form'));
            const data = Object.fromEntries(formData);
            
            // Save to localStorage as draft
            localStorage.setItem('asset_draft', JSON.stringify(data));
            
            // Show auto-save indicator
            const indicator = document.createElement('div');
            indicator.className = 'fixed bottom-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg text-sm opacity-0 transition-opacity duration-300';
            indicator.textContent = 'Draft tersimpan otomatis';
            document.body.appendChild(indicator);
            
            setTimeout(() => indicator.style.opacity = '1', 100);
            setTimeout(() => {
                indicator.style.opacity = '0';
                setTimeout(() => indicator.remove(), 300);
            }, 2000);
        }
        
        // Auto-save every 30 seconds
        setInterval(autoSave, 30000);
        
        // Load draft on page load
        window.addEventListener('load', function() {
            const draft = localStorage.getItem('asset_draft');
            if (draft && confirm('Ditemukan draft yang tersimpan. Apakah Anda ingin memulihkannya?')) {
                const data = JSON.parse(draft);
                Object.keys(data).forEach(key => {
                    const field = document.querySelector(`[name="${key}"]`);
                    if (field && !field.value) {
                        field.value = data[key];
                    }
                });
                
                // Update progress after loading draft
                setTimeout(() => {
                    const event = new Event('input');
                    document.getElementById('nama').dispatchEvent(event);
                }, 100);
            }
        });
        
        // Clear draft on successful submission
        document.getElementById('asset-form').addEventListener('submit', function() {
            setTimeout(() => {
                localStorage.removeItem('asset_draft');
            }, 1000);
        });
    </script>
</x-app-layout>