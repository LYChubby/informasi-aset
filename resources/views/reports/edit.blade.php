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
                <label for="title" class="block font-medium text-gray-700 dark:text-white">Judul Laporan</label>
                <select name="title" id="title" required
                        class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    <option value="perbaikan" {{ $report->title === 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    <option value="penambahan" {{ $report->title === 'penambahan' ? 'selected' : '' }}>Penambahan</option>
                    <option value="kerusakan" {{ $report->title === 'kerusakan' ? 'selected' : '' }}>Kerusakan</option>
                </select>
            </div>

            {{-- Pilih Aset --}}
            <div>
                <label for="aset_id" class="block font-medium text-gray-700 dark:text-white">Pilih Aset</label>
                <select name="aset_id" id="aset_id" required
                        class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2">
                    @foreach($assets as $asset)
                        <option value="{{ $asset->id }}" {{ $report->aset_id == $asset->id ? 'selected' : '' }}>
                            {{ $asset->nama }} - ({{ $asset->kategori }}) - ({{ $asset->lokasi }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Isi Laporan --}}
            <div>
                <label for="laporan" class="block font-medium text-gray-700 dark:text-white">Isi Laporan</label>
                <textarea name="laporan" id="laporan" rows="5" required
                          class="w-full mt-2 border dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2"
                          placeholder="Update isi laporan...">{{ $report->laporan }}</textarea>
            </div>

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
</x-app-layout>
