<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
            ✏️ Edit Laporan Aset
        </h2>
    </x-slot>

    <div class="py-10 px-6 max-w-4xl mx-auto space-y-6">
        {{-- Form --}}
        <form action="{{ route('reports.update', $report->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul Laporan --}}
            <div>
                <label for="title" class="block font-medium text-gray-700 dark:text-white">Jenis Laporan</label>
                <select name="title" id="title" required
                        class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    <option value="perbaikan" {{ $report->title === 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    <option value="penambahan" {{ $report->title === 'penambahan' ? 'selected' : '' }}>Penambahan</option>
                    <option value="kerusakan" {{ $report->title === 'kerusakan' ? 'selected' : '' }}>Kerusakan</option>
                </select>
            </div>

            {{-- Pilih Aset --}}
            <div id="assetField">
                <label for="aset_id" class="block font-medium text-gray-700 dark:text-white">Pilih Aset</label>
                <select name="aset_id" id="aset_id"
                        class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    <option value="">-- Pilih Aset --</option>
                    @foreach($assets as $asset)
                        <option value="{{ $asset->id }}" {{ $report->aset_id == $asset->id ? 'selected' : '' }}>
                            {{ $asset->nama }} - ({{ $asset->kategori }}) - ({{ $asset->lokasi }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Form untuk Aset Baru (muncul jika jenis laporan penambahan) --}}
            <div id="newAssetFields" class="space-y-4 hidden">
                <div>
                    <label for="nama_aset" class="block font-medium text-gray-700 dark:text-white">Nama Aset Baru</label>
                    <input type="text" name="nama_aset" id="nama_aset" value="{{ $report->nama_aset }}"
                           class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                </div>
                
                <div>
                    <label for="kategori" class="block font-medium text-gray-700 dark:text-white">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ $report->kategori }}"
                           class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                </div>
                
                <div>
                    <label for="lokasi" class="block font-medium text-gray-700 dark:text-white">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ $report->lokasi }}"
                           class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                </div>
            </div>

            {{-- Isi Laporan --}}
            <div>
                <label for="laporan" class="block font-medium text-gray-700 dark:text-white">Isi Laporan</label>
                <textarea name="laporan" id="laporan" rows="5" required
                          class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2"
                          placeholder="Update isi laporan...">{{ $report->laporan }}</textarea>
            </div>

            {{-- Status Laporan (hanya untuk admin) --}}
            @if(auth()->user()->is_admin)
                <div>
                    <label for="status" class="block font-medium text-gray-700 dark:text-white">Status Laporan</label>
                    <select name="status" id="status"
                            class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                        <option value="belum_ditanggapi" {{ $report->status === 'belum_ditanggapi' ? 'selected' : '' }}>Belum Ditanggapi</option>
                        <option value="ditanggapi" {{ $report->status === 'ditanggapi' ? 'selected' : '' }}>Ditanggapi</option>
                    </select>
                </div>
            @endif

            {{-- Tombol --}}
            <div class="flex justify-end">
                <a href="{{ route('reports.index') }}"
                   class="mr-4 px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg shadow hover:bg-gray-400 dark:hover:bg-gray-500">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">
                    Simpan Perubahan
                </button>
            </div>
        </form>
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
    </script>
</x-app-layout>