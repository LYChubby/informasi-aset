<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
                📊 Reports Aset IT
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('reports.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                    ➕ Tambah Laporan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10 px-6 max-w-7xl mx-auto space-y-6">
        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto rounded-lg shadow-lg ring-1 ring-black/5 dark:ring-white/10">
            <table class="min-w-full bg-white dark:bg-gray-900 text-sm text-left text-gray-800 dark:text-gray-200">
                <thead class="text-xs uppercase bg-gradient-to-r from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Judul</th>
                        <th class="px-6 py-4">Nama Aset</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Isi Laporan</th>
                        <th class="px-6 py-4">Status Laporan</th>
                        <th class="px-6 py-4">Tanggal Dibuat</th>
                        @if(auth()->user()->role === 'admin')
                            <th class="px-6 py-4">Dibuat Oleh</th>
                        @endif
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $index => $report)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            
                            {{-- Judul laporan dari kolom title --}}
                            <td class="px-6 py-4 capitalize">{{ $report->title }}</td>
                            
                            <td class="px-6 py-4 font-medium">{{ $report->nama_aset }}</td>
                            <td class="px-6 py-4">{{ $report->kategori }}</td>
                            <td class="px-6 py-4">{{ $report->laporan }}</td>

                            {{-- Status Laporan with Badge --}}
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full text-white
                                    @if($report->status === 'ditanggapi') bg-green-500 
                                    @else bg-yellow-500 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">{{ $report->created_at->format('d-m-Y H:i') }}</td>

                            @if(auth()->user()->role === 'admin')
                                <td class="px-6 py-4">{{ $report->user->name ?? '-' }}</td>
                            @endif

                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('reports.edit', $report->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-6 text-gray-500 dark:text-gray-300">Tidak ada laporan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</x-app-layout>
