<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-6 shadow-lg">
            <h2 class="font-bold text-3xl text-white tracking-tight flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-lg">
                    ➕
                </div>
                Tambah Laporan Aset
            </h2>
            <p class="text-orange-100 mt-2">Kelola dan laporkan aset dengan mudah</p>
        </div>
    </x-slot>

    <div class="py-10 px-6 max-w-5xl mx-auto">
        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-400 text-green-800 px-6 py-4 rounded-r-lg shadow-sm mb-6 flex items-center gap-3">
                <div class="bg-green-400 text-white rounded-full p-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Container --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-orange-100 dark:border-orange-900/20 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 px-8 py-6 border-b border-orange-200 dark:border-orange-700">
                <h3 class="text-xl font-semibold text-orange-800 dark:text-orange-200">Formulir Laporan</h3>
                <p class="text-orange-600 dark:text-orange-300 text-sm mt-1">Isi informasi laporan aset dengan lengkap</p>
            </div>

            {{-- Form --}}
            <form action="{{ route('reports.store') }}" method="POST" class="p-8 space-y-8">
                @csrf

                {{-- Judul Laporan --}}
                <div class="space-y-2">
                    <label for="title" class="block font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        Judul Laporan
                    </label>
                    <select name="title" id="title" required
                            class="w-full mt-2 border-2 border-orange-200 dark:border-orange-700 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 shadow-sm"
                            onchange="toggleAssetFields()">
                        <option value="">-- Pilih Judul Laporan --</option>
                        <option value="perbaikan">🔧 Perbaikan</option>
                        <option value="penambahan">➕ Penambahan</option>
                        <option value="kerusakan">⚠️ Kerusakan</option>
                    </select>
                    @error('title')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Pilih Aset --}}
                <div id="asset-selection" class="space-y-2">
                    <label for="aset_id" class="block font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        Pilih Aset
                    </label>
                    <select name="aset_id" id="aset_id"
                            class="w-full mt-2 border-2 border-orange-200 dark:border-orange-700 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 shadow-sm">
                        <option value="">-- Pilih Aset --</option>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}">{{ $asset->nama }} - ({{ $asset->kategori }}) - ({{ $asset->lokasi }})</option>
                        @endforeach
                    </select>
                    @error('aset_id')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Form Manual untuk Penambahan Aset Baru --}}
                <div id="manual-fields" class="hidden">
                    <div class="bg-gradient-to-r from-orange-50 to-amber-50 dark:from-orange-900/10 dark:to-amber-900/10 rounded-xl p-6 border border-orange-200 dark:border-orange-800 space-y-6">
                        <h4 class="font-semibold text-orange-800 dark:text-orange-200 flex items-center gap-2">
                            <div class="bg-orange-500 text-white rounded-full p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            Informasi Aset Baru
                        </h4>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama_aset" class="block font-medium text-gray-700 dark:text-gray-300">Nama Aset Baru</label>
                                <input type="text" name="nama_aset" id="nama_aset"
                                       class="w-full border-2 border-orange-200 dark:border-orange-700 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200"
                                       placeholder="Masukkan nama aset">
                                @error('nama_aset')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="kategori" class="block font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <input type="text" name="kategori" id="kategori"
                                       class="w-full border-2 border-orange-200 dark:border-orange-700 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200"
                                       placeholder="Masukkan kategori">
                                @error('kategori')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="lokasi" class="block font-medium text-gray-700 dark:text-gray-300">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi"
                                   class="w-full border-2 border-orange-200 dark:border-orange-700 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200"
                                   placeholder="Masukkan lokasi aset">
                            @error('lokasi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Isi Laporan --}}
                <div class="space-y-2">
                    <label for="laporan" class="block font-semibold text-gray-800 dark:text-white flex items-center gap-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        Isi Laporan
                    </label>
                    <textarea name="laporan" id="laporan" rows="6" required
                              class="w-full mt-2 border-2 border-orange-200 dark:border-orange-700 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 dark:focus:ring-orange-800 transition-all duration-200 shadow-sm resize-none"
                              placeholder="Tuliskan detail masalah, kondisi, dan waktu kejadian dengan lengkap..."></textarea>
                    @error('laporan')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit Buttons --}}
                <div class="flex justify-end gap-4 pt-6 border-t border-orange-100 dark:border-orange-800">
                    <a href="{{ route('reports.index') }}"
                       class="px-6 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-xl shadow-sm transition-all duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2 transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleAssetFields() {
            const title = document.getElementById('title').value;
            const assetSelection = document.getElementById('asset-selection');
            const manualFields = document.getElementById('manual-fields');
            
            if (title === 'penambahan') {
                assetSelection.classList.add('hidden');
                manualFields.classList.remove('hidden');
                document.getElementById('aset_id').required = false;
            } else {
                assetSelection.classList.remove('hidden');
                manualFields.classList.add('hidden');
                document.getElementById('aset_id').required = true;
            }
        }

        // Panggil saat pertama kali load
        document.addEventListener('DOMContentLoaded', function() {
            toggleAssetFields();
        });

        // Add smooth transitions for form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('transform', 'scale-102');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('transform', 'scale-102');
                });
            });
        });
    </script>
</x-app-layout>