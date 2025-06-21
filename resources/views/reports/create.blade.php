<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
            ➕ Tambah Laporan Aset
        </h2>
    </x-slot>

    <div class="py-10 px-6 max-w-4xl mx-auto space-y-6">
        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('reports.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Judul Laporan --}}
            <div>
                <label for="title" class="block font-medium text-gray-700 dark:text-white">Judul Laporan</label>
                <select name="title" id="title" required
                        class="w-full mt-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    <option value="">-- Pilih Judul Laporan --</option>
                    <option value="perbaikan">Perbaikan</option>
                    <option value="penambahan">Penambahan</option>
                    <option value="kerusakan">Kerusakan</option>
                </select>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Pilih Aset --}}
            <div>
                <label for="aset_id" class="block font-medium text-gray-700 dark:text-white">Pilih Aset</label>
                <select name="aset_id" id="aset_id" required
                        class="w-full mt-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    <option value="">-- Pilih Aset --</option>
                    @foreach($assets as $asset)
                        <option value="{{ $asset->id }}">{{ $asset->nama }} - ({{ $asset->kategori }}) - ({{ $asset->lokasi }})</option>
                    @endforeach
                </select>
                @error('aset_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            
            {{-- Isi Laporan --}}
            <div>
                <label for="laporan" class="block font-medium text-gray-700 dark:text-white">Isi Laporan</label>
                <textarea name="laporan" id="laporan" rows="5" required
                          class="w-full mt-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2"
                          placeholder="Tuliskan detail masalah, kondisi, dan waktu kejadian..."></textarea>
                @error('laporan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <a href="{{ route('reports.index') }}"
                   class="mr-4 px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg shadow hover:bg-gray-400 dark:hover:bg-gray-500">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">
                    Simpan Laporan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
