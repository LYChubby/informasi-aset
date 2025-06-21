<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-6 shadow-lg">
            <h2 class="font-bold text-3xl text-white tracking-tight flex items-center">
                <div class="bg-white/20 p-3 rounded-lg mr-4">
                    ✏️
                </div>
                Edit Laporan Aset
            </h2>
            <p class="text-orange-100 mt-2">Perbarui informasi laporan aset dengan mudah</p>
        </div>
    </x-slot>

    <div class="py-10 px-6 max-w-5xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-orange-100 dark:border-gray-700 overflow-hidden">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-orange-50 to-orange-100 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-orange-200 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-orange-800 dark:text-white flex items-center">
                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    Form Edit Laporan
                </h3>
                <p class="text-orange-600 dark:text-gray-300 text-sm mt-1">Lengkapi formulir di bawah ini untuk memperbarui laporan</p>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form action="{{ route('reports.update', $report->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Grid Layout untuk Form -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        
                        <!-- Left Column -->
                        <div class="space-y-6">
                            {{-- Jenis Laporan --}}
                            <div class="group">
                                <label for="title" class="block font-semibold text-gray-700 dark:text-white mb-3 flex items-center">
                                    <div class="w-5 h-5 bg-orange-500 rounded-full mr-2 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-white rounded-full"></div>
                                    </div>
                                    Jenis Laporan
                                </label>
                                <div class="relative">
                                    <select name="title" id="title" required
                                            class="w-full appearance-none border-2 border-orange-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-4 pr-10 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300 hover:border-orange-300">
                                        <option value="perbaikan" {{ $report->title === 'perbaikan' ? 'selected' : '' }}>🔧 Perbaikan</option>
                                        <option value="penambahan" {{ $report->title === 'penambahan' ? 'selected' : '' }}>➕ Penambahan</option>
                                        <option value="kerusakan" {{ $report->title === 'kerusakan' ? 'selected' : '' }}>⚠️ Kerusakan</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Pilih Aset --}}
                            <div id="assetField" class="group">
                                <label for="aset_id" class="block font-semibold text-gray-700 dark:text-white mb-3 flex items-center">
                                    <div class="w-5 h-5 bg-orange-500 rounded-full mr-2 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-white rounded-full"></div>
                                    </div>
                                    Pilih Aset
                                </label>
                                <div class="relative">
                                    <select name="aset_id" id="aset_id"
                                            class="w-full appearance-none border-2 border-orange-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-4 pr-10 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300 hover:border-orange-300">
                                        <option value="">-- Pilih Aset --</option>
                                        @foreach($assets as $asset)
                                            <option value="{{ $asset->id }}" {{ $report->aset_id == $asset->id ? 'selected' : '' }}>
                                                {{ $asset->nama }} - ({{ $asset->kategori }}) - ({{ $asset->lokasi }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Status Laporan (hanya untuk admin) --}}
                            @if(auth()->user()->is_admin)
                                <div class="group">
                                    <label for="status" class="block font-semibold text-gray-700 dark:text-white mb-3 flex items-center">
                                        <div class="w-5 h-5 bg-orange-500 rounded-full mr-2 flex items-center justify-center">
                                            <div class="w-2 h-2 bg-white rounded-full"></div>
                                        </div>
                                        Status Laporan
                                    </label>
                                    <div class="relative">
                                        <select name="status" id="status"
                                                class="w-full appearance-none border-2 border-orange-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-4 pr-10 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300 hover:border-orange-300">
                                            <option value="belum_ditanggapi" {{ $report->status === 'belum_ditanggapi' ? 'selected' : '' }}>⏳ Belum Ditanggapi</option>
                                            <option value="ditanggapi" {{ $report->status === 'ditanggapi' ? 'selected' : '' }}>⚠️ Ditanggapi</option>
                                            <option value="selesai" {{ $report->status === 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            {{-- Form untuk Aset Baru --}}
                            <div id="newAssetFields" class="space-y-6 hidden">
                                <div class="bg-orange-50 dark:bg-gray-700 rounded-xl p-6 border-2 border-dashed border-orange-300 dark:border-gray-600">
                                    <h4 class="font-semibold text-orange-800 dark:text-white mb-4 flex items-center">
                                        <div class="w-6 h-6 bg-orange-500 rounded-lg mr-2 flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        Informasi Aset Baru
                                    </h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="nama_aset" class="block font-medium text-gray-700 dark:text-white mb-2">Nama Aset Baru</label>
                                            <input type="text" name="nama_aset" id="nama_aset" value="{{ $report->nama_aset }}"
                                                   class="w-full border-2 border-orange-200 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-3 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300">
                                        </div>
                                        
                                        <div>
                                            <label for="kategori" class="block font-medium text-gray-700 dark:text-white mb-2">Kategori</label>
                                            <input type="text" name="kategori" id="kategori" value="{{ $report->kategori }}"
                                                   class="w-full border-2 border-orange-200 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-3 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300">
                                        </div>
                                        
                                        <div>
                                            <label for="lokasi" class="block font-medium text-gray-700 dark:text-white mb-2">Lokasi</label>
                                            <input type="text" name="lokasi" id="lokasi" value="{{ $report->lokasi }}"
                                                   class="w-full border-2 border-orange-200 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white px-4 py-3 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Isi Laporan --}}
                    <div class="group">
                        <label for="laporan" class="block font-semibold text-gray-700 dark:text-white mb-3 flex items-center">
                            <div class="w-5 h-5 bg-orange-500 rounded-full mr-2 flex items-center justify-center">
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                            Isi Laporan
                        </label>
                        <div class="relative">
                            <textarea name="laporan" id="laporan" rows="6" required
                                      class="w-full border-2 border-orange-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-4 focus:ring-4 focus:ring-orange-200 focus:border-orange-500 transition-all duration-300 hover:border-orange-300 resize-none"
                                      placeholder="Update isi laporan...">{{ $report->laporan }}</textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-orange-100 dark:border-gray-700">
                        <a href="{{ route('reports.index') }}"
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-white rounded-xl shadow-lg hover:bg-gray-200 dark:hover:bg-gray-500 transition-all duration-300 font-medium border-2 border-transparent hover:border-gray-300 group">
                            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 border-2 border-transparent hover:border-orange-300 group">
                            <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle form fields berdasarkan jenis laporan
        document.getElementById('title').addEventListener('change', function() {
            const assetField = document.getElementById('assetField');
            const newAssetFields = document.getElementById('newAssetFields');
            
            if (this.value === 'penambahan') {
                assetField.classList.add('hidden');
                newAssetFields.classList.remove('hidden');
                document.getElementById('aset_id').removeAttribute('required');
                document.getElementById('nama_aset').setAttribute('required', '');
                document.getElementById('kategori').setAttribute('required', '');
                document.getElementById('lokasi').setAttribute('required', '');
            } else {
                assetField.classList.remove('hidden');
                newAssetFields.classList.add('hidden');
                document.getElementById('aset_id').setAttribute('required', '');
                document.getElementById('nama_aset').removeAttribute('required');
                document.getElementById('kategori').removeAttribute('required');
                document.getElementById('lokasi').removeAttribute('required');
            }
        });

        // Inisialisasi form saat pertama kali load
        document.addEventListener('DOMContentLoaded', function() {
            const titleSelect = document.getElementById('title');
            if (titleSelect) {
                titleSelect.dispatchEvent(new Event('change'));
            }
        });

        // Animasi loading saat submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = `
                <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            `;
            submitBtn.disabled = true;
        });
    </script>
</x-app-layout>