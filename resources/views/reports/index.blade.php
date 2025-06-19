<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Reports
        </h2>
    </x-slot>

    <div class="py-6 px-6 max-w-7xl mx-auto">
        {{-- Flash message --}}
        @if(session('success'))
            <div class="mb-4 text-green-600 bg-green-100 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search --}}
        <div class="mb-6">
            <form method="GET" action="{{ route('reports.index') }}" class="flex items-center gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / lokasi / status..." 
                    class="w-full md:w-1/3 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Cari
                </button>
            </form>
        </div>

        {{-- Tabel --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-blue-100 dark:bg-blue-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">Nama Aset</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">Lokasi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">Ubah Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($assets as $index => $asset)
                        <tr>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $asset->nama }}</td>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $asset->kategori }}</td>
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $asset->lokasi }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-white text-sm 
                                    @if($asset->status === 'Aktif') bg-green-500 
                                    @elseif($asset->status === 'Rusak') bg-red-500 
                                    @else bg-gray-500 @endif">
                                    {{ $asset->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('reports.updateStatus', $asset->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()"
                                        class="p-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                        <option value="Aktif" {{ $asset->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Rusak" {{ $asset->status === 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                        <option value="Nonaktif" {{ $asset->status === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-600 dark:text-gray-300">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
