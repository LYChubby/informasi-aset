<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
            📊 Reports Aset IT
        </h2>
    </x-slot>

    <div class="py-10 px-6 max-w-7xl mx-auto space-y-6">
        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('reports.index') }}" class="flex flex-col sm:flex-row gap-3 items-start sm:items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari aset, lokasi, atau status..."
                class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 outline-none">
            <button type="submit"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition shadow">
                Cari
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
            </button>
        </form>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-lg shadow-lg ring-1 ring-black/5 dark:ring-white/10">
            <table class="min-w-full bg-white dark:bg-gray-900 text-sm text-left text-gray-800 dark:text-gray-200">
                <thead class="text-xs uppercase bg-gradient-to-r from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Nama Aset</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assets as $index => $asset)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium">{{ $asset->nama }}</td>
                            <td class="px-6 py-4">{{ $asset->kategori }}</td>
                            <td class="px-6 py-4">{{ $asset->lokasi }}</td>
                            <td class="px-6 py-4">{{ $asset->deskripsi }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full text-white
                                    @if($asset->status === 'Aktif') bg-green-500 
                                    @elseif($asset->status === 'Perbaikan') bg-red-500 
                                    @else bg-gray-500 @endif">
                                    {{ $asset->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('reports.updateStatus', $asset->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()"
                                        class="block w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white shadow-sm">
                                        <option value="aktif" {{ $asset->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="perbaikan" {{ $asset->status === 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                        <option value="non-aktif" {{ $asset->status === 'non-aktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-300">Tidak ada data aset ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
