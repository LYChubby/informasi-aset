<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-white tracking-tight">
                    Reports Aset IT
                </h2>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('reports.create') }}"
                   class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Laporan
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10 px-6 max-w-7xl mx-auto space-y-6">
        {{-- Flash Message --}}
        @if(session('success'))
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-r-lg shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-gradient-to-r from-red-50 to-orange-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-r-lg shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Total Laporan</p>
                        <p class="text-3xl font-bold">{{ $reports->total() }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white p-6 rounded-2xl shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-100 text-sm font-medium">Belum Ditanggapi</p>
                        <p class="text-3xl font-bold">{{ $reports->where('status', 'belum_ditanggapi')->count() }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 text-white p-6 rounded-2xl shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-emerald-100 text-sm font-medium">Ditanggapi</p>
                        <p class="text-3xl font-bold">{{ $reports->where('status', 'ditanggapi')->count() }}</p>
                    </div>
                    <div class="p-3 bg-white/20 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-800">
            <div class="px-6 py-4 bg-gradient-to-r from-orange-50 to-amber-50 dark:from-gray-800 dark:to-gray-800 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Daftar Laporan
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                    <thead class="text-xs uppercase bg-gradient-to-r from-orange-100 to-amber-100 dark:from-orange-900/30 dark:to-amber-900/30 text-orange-800 dark:text-orange-200 border-b border-orange-200 dark:border-orange-700">
                        <tr>
                            <th class="px-6 py-4 font-semibold">No</th>
                            <th class="px-6 py-4 font-semibold">Judul</th>
                            <th class="px-6 py-4 font-semibold">Nama Aset</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Isi Laporan</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Tanggal</th>
                            @if(auth()->user()->is_admin)
                                <th class="px-6 py-4 font-semibold">Dibuat Oleh</th>
                            @endif
                            <th class="px-6 py-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($reports as $index => $report)
                            <tr class="hover:bg-orange-50 dark:hover:bg-orange-900/10 transition-colors duration-200 group">
                                <td class="px-6 py-4">
                                    <span class="flex items-center justify-center w-8 h-8 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 rounded-full text-sm font-semibold">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900 dark:text-white capitalize">{{ $report->title }}</div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                                        <span class="font-medium text-gray-900 dark:text-white">{{ $report->nama_aset }}</span>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                        {{ $report->kategori }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="max-w-xs truncate text-gray-600 dark:text-gray-300">
                                        {{ $report->laporan }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full
                                        @if($report->status === 'ditanggapi') 
                                            bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300
                                        @else 
                                            bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300
                                        @endif">
                                        <div class="w-1.5 h-1.5 mr-1.5 rounded-full
                                            @if($report->status === 'ditanggapi') bg-emerald-500 @else bg-amber-500 @endif">
                                        </div>
                                        {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                    <div class="text-sm">{{ $report->created_at->format('d M Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $report->created_at->format('H:i') }}</div>
                                </td>

                                @if(auth()->user()->is_admin)
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center">
                                                <span class="text-xs font-semibold text-orange-700 dark:text-orange-300">
                                                    {{ substr($report->user->name ?? 'N', 0, 1) }}
                                                </span>
                                            </div>
                                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $report->user->name ?? '-' }}</span>
                                        </div>
                                    </td>
                                @endif

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('reports.show', $report->id) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition-colors duration-200">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        
                                        @if(($report->status === 'belum_ditanggapi' && auth()->user()->id === $report->user_id) || auth()->user()->is_admin)
                                            <a href="{{ route('reports.edit', $report->id) }}" 
                                               class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-orange-600 dark:text-orange-400 bg-orange-50 dark:bg-orange-900/30 hover:bg-orange-100 dark:hover:bg-orange-900/50 rounded-lg transition-colors duration-200">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('reports.destroy', $report->id) }}" method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus laporan ini?')" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/30 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg transition-colors duration-200">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->is_admin ? 9 : 8 }}" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-gray-500 dark:text-gray-400">
                                            <p class="font-medium">Tidak ada laporan ditemukan</p>
                                            <p class="text-sm">Mulai dengan membuat laporan pertama Anda</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($reports->hasPages())
            <div class="flex justify-center">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg px-6 py-4 border border-gray-200 dark:border-gray-700">
                    {{ $reports->links() }}
                </div>
            </div>
        @endif
    </div>
</x-app-layout>