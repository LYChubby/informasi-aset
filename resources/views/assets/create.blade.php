<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($asset) ? __('Edit Aset') : __('Tambah Aset Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ isset($asset) ? route('assets.update', $asset->id) : route('assets.store') }}">
                        @csrf
                        @if(isset($asset))
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div>
                                <x-input-label for="nama" :value="__('Nama Aset')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', isset($asset) ? $asset->nama : '')" required autofocus />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>

                            <!-- Kategori -->
                            <div>
                                <x-input-label for="kategori" :value="__('Kategori')" />
                                <x-text-input id="kategori" class="block mt-1 w-full" type="text" name="kategori" :value="old('kategori', isset($asset) ? $asset->kategori : '')" required />
                                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <x-input-label for="lokasi" :value="__('Lokasi')" />
                                <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi', isset($asset) ? $asset->lokasi : '')" required />
                                <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#FF4B2B] dark:focus:border-[#FF8A65] focus:ring-[#FF4B2B] dark:focus:ring-[#FF8A65] rounded-md shadow-sm" required>
                                    <option value="aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'aktif') ? 'selected' : '' }}>Aktif</option>
                                    <option value="perbaikan" {{ (old('status', isset($asset) ? $asset->status : '') == 'perbaikan') ? 'selected' : '' }}>Perbaikan</option>
                                    <option value="non-aktif" {{ (old('status', isset($asset) ? $asset->status : '') == 'non-aktif') ? 'selected' : '' }}>Non-Aktif</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Tanggal Pembelian -->
                            <div>
                                <x-input-label for="tanggal_pembelian" :value="__('Tanggal Pembelian')" />
                                <x-text-input id="tanggal_pembelian" class="block mt-1 w-full" type="date" name="tanggal_pembelian" :value="old('tanggal_pembelian', isset($asset) ? $asset->tanggal_pembelian->format('Y-m-d') : '')" required />
                                <x-input-error :messages="$errors->get('tanggal_pembelian')" class="mt-2" />
                            </div>

                            <!-- Nilai -->
                            <div>
                                <x-input-label for="nilai" :value="__('Nilai Aset (Rp)')" />
                                <x-text-input id="nilai" class="block mt-1 w-full" type="number" step="0.01" name="nilai" :value="old('nilai', isset($asset) ? $asset->nilai : '')" required />
                                <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                            </div>


                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('assets.index') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                                Batal
                            </a>
                            <x-primary-button class="bg-[#FF4B2B] hover:bg-[#E53935] dark:bg-[#FF8A65] dark:hover:bg-[#FF7043]">
                                {{ isset($asset) ? __('Update Aset') : __('Tambah Aset') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>