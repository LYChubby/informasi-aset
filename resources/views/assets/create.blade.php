<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($asset) ? __('Edit Aset') : __('Tambah Aset Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-orange-500">
                <div class="p-6">
                    <form method="POST" action="{{ isset($asset) ? route('assets.update', $asset->id) : route('assets.store') }}">
                        @csrf
                        @if(isset($asset))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    <x-input-label for="nama" :value="__('Nama Aset')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <x-text-input id="nama" class="block w-full" type="text" name="nama" :value="old('nama', isset($asset) ? $asset->nama : '')" required autofocus />
                                <x-input-error :messages="$errors->get('nama')" class="mt-1 text-sm" />
                            </div>

                            <!-- Kategori -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    <x-input-label for="kategori" :value="__('Kategori')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <x-text-input id="kategori" class="block w-full" type="text" name="kategori" :value="old('kategori', isset($asset) ? $asset->kategori : '')" required />
                                <x-input-error :messages="$errors->get('kategori')" class="mt-1 text-sm" />
                            </div>

                            <!-- Lokasi -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <x-input-label for="lokasi" :value="__('Lokasi')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <x-text-input id="lokasi" class="block w-full" type="text" name="lokasi" :value="old('lokasi', isset($asset) ? $asset->lokasi : '')" required />
                                <x-input-error :messages="$errors->get('lokasi')" class="mt-1 text-sm" />
                            </div>

                            <!-- Status -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <x-input-label for="status" :value="__('Status')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <select id="status" name="status" class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                                    <option value="aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'aktif') ? 'selected' : '' }} class="bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">Aktif</option>
                                    <option value="perbaikan" {{ (old('status', isset($asset) ? $asset->status : '') == 'perbaikan') ? 'selected' : '' }} class="bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">Perbaikan</option>
                                    <option value="non-aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'non-aktif') ? 'selected' : '' }} class="bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">Non-Aktif</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-1 text-sm" />
                            </div>

                            <!-- Tanggal Pembelian -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <x-input-label for="tanggal_pembelian" :value="__('Tanggal Pembelian')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <x-text-input id="tanggal_pembelian" class="block w-full" type="date" name="tanggal_pembelian" :value="old('tanggal_pembelian', isset($asset) ? $asset->tanggal_pembelian->format('Y-m-d') : '')" required />
                                <x-input-error :messages="$errors->get('tanggal_pembelian')" class="mt-1 text-sm" />
                            </div>

                            <!-- Nilai -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <x-input-label for="nilai" :value="__('Nilai Aset (Rp)')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 dark:text-gray-400 sm:text-sm">Rp</span>
                                    </div>
                                    <x-text-input id="nilai" class="block w-full pl-10" type="number" step="0.01" name="nilai" :value="old('nilai', isset($asset) ? $asset->nilai : '')" required />
                                </div>
                                <x-input-error :messages="$errors->get('nilai')" class="mt-1 text-sm" />
                            </div>

                            <!-- Deskripsi -->
                            <div class="md:col-span-2 space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <x-input-label for="deskripsi" :value="__('Deskripsi')" class="text-gray-700 dark:text-gray-300" />
                                </div>
                                <textarea id="deskripsi" name="deskripsi" rows="3" class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">{{ old('deskripsi', isset($asset) ? $asset->deskripsi : '') }}</textarea>
                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1 text-sm" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 space-x-4">
                            <a href="{{ route('assets.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Batal
                            </a>
                            <x-primary-button class="bg-orange-600 hover:bg-orange-700 dark:bg-orange-500 dark:hover:bg-orange-600 focus:ring-orange-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                {{ isset($asset) ? __('Update Aset') : __('Tambah Aset') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>