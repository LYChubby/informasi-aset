<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        {{ __('Kelola Aset') }}
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manajemen aset organisasi Anda</p>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <div class="flex items-center px-3 py-2 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg text-white text-sm font-medium shadow-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ now()->format('d M Y, H:i') }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-8 relative overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 text-green-800 dark:text-green-200 rounded-2xl border border-green-200/50 dark:border-green-800/50 shadow-lg backdrop-blur-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 bg-green-500 rounded-full shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                        <div class="absolute -top-1 -right-1 w-24 h-24 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full blur-xl"></div>
                    </div>
                </div>
            @endif

            <!-- Stats Cards -->
            

            <!-- Main Content -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl overflow-hidden shadow-2xl rounded-3xl border border-gray-200/50 dark:border-gray-700/50">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-500/5 to-red-500/5 dark:from-orange-500/10 dark:to-red-500/10"></div>
                    <div class="relative p-8">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                            <div class="flex items-center space-x-4 mb-6 lg:mb-0">
                                <div class="p-3 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Daftar Aset</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Kelola dan pantau semua aset organisasi</p>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                                <div class="relative">
                                    <form method="GET" action="{{ route('assets.index') }}" class="relative">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari aset..."
                                            class="pl-10 pr-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
                                        <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                
                                @can('create', App\Models\Asset::class)
                                <a href="{{ route('assets.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transition-transform group-hover:rotate-180 duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <span class="font-semibold">Tambah Aset</span>
                                </a>
                                @endcan
                            </div>
                        </div>

                        <!-- Enhanced Table -->
                        <div class="overflow-hidden rounded-2xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
                                    <thead class="bg-gradient-to-r from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20">
                                        <tr>
                                            <th scope="col" class="px-8 py-6 text-left text-xs font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wider">
                                                <div class="flex items-center space-x-2">
                                                    <span>Aset</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-8 py-6 text-left text-xs font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wider">Kategori</th>
                                            <th scope="col" class="px-8 py-6 text-left text-xs font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wider">Lokasi</th>
                                            <th scope="col" class="px-8 py-6 text-left text-xs font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-8 py-6 text-center text-xs font-bold text-orange-600 dark:text-orange-300 uppercase tracking-wider">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm divide-y divide-gray-200/30 dark:divide-gray-700/30">
                                        @foreach ($assets as $asset)
                                        <tr class="hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-red-50/50 dark:hover:from-orange-900/10 dark:hover:to-red-900/10 transition-all duration-300 transform hover:scale-[1.01]">
                                            <td class="px-8 py-6 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 relative">
                                                        <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center text-white shadow-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                            </svg>
                                                        </div>
                                                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white dark:border-gray-800"></div>
                                                    </div>
                                                    <div class="ml-5">
                                                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $asset->nama }}</div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center mt-1">
                                                            <span class="inline-flex items-center px-2 py-1 rounded-lg bg-gray-100 dark:bg-gray-700 text-xs">
                                                                ID: {{ $asset->id }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-8 py-6 whitespace-nowrap">
                                                <div class="inline-flex items-center px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-700 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $asset->kategori }}
                                                </div>
                                            </td>
                                            <td class="px-8 py-6 whitespace-nowrap">
                                                <div class="flex items-center text-sm text-gray-900 dark:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $asset->lokasi }}
                                                </div>
                                            </td>
                                            <td class="px-8 py-6 whitespace-nowrap">
                                                @if($asset->status == 'aktif')
                                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-xl bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 dark:from-green-900/30 dark:to-emerald-900/30 dark:text-green-300 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Aktif
                                                    </span>
                                                @elseif($asset->status == 'perbaikan')
                                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-xl bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800 dark:from-yellow-900/30 dark:to-orange-900/30 dark:text-yellow-300 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                        Perbaikan
                                                    </span>
                                                @else
                                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-xl bg-gradient-to-r from-red-100 to-pink-100 text-red-800 dark:from-red-900/30 dark:to-pink-900/30 dark:text-red-300 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        Non-Aktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-8 py-6 whitespace-nowrap text-center">
                                                <div class="flex items-center justify-center space-x-3">
                                                    <a href="{{ route('assets.show', $asset->id) }}" class="p-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/30 dark:hover:bg-blue-900/50 rounded-xl transition-all duration-200 transform hover:scale-110 shadow-lg hover:shadow-xl" title="Lihat Detail">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                    @can('update', $asset)
                                                    <a href="{{ route('assets.edit', $asset->id) }}" class="p-2 text-orange-600 hover:text-orange-800 dark:text-orange-400 dark:hover:text-orange-300 bg-orange-50 hover:bg-orange-100 dark:bg-orange-900/30 dark:hover:bg-orange-900/50 rounded-xl transition-all duration-200 transform hover:scale-110 shadow-lg hover:shadow-xl" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    @endcan

                                                    @can('delete', $asset)
                                                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 bg-red-50 hover:bg-red-100 dark:bg-red-900/30 dark:hover:bg-red-900/50 rounded-xl transition-all duration-200 transform hover:scale-110 shadow-lg hover:shadow-xl" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus aset ini?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-8 flex items-center justify-between">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Menampilkan {{ $assets->firstItem() }}-{{ $assets->lastItem() }} dari {{ $assets->total() }} aset
                            </div>
                            <div class="pagination-wrapper">
                                {{ $assets->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .pagination-wrapper .pagination {
            @apply flex items-center space-x-2;
        }
        
        .pagination-wrapper .pagination a,
        .pagination-wrapper .pagination span {
            @apply px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200;
        }
        
        .pagination-wrapper .pagination a {
            @apply bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-orange-50 dark:hover:bg-orange-900/20 hover:text-orange-600 dark:hover:text-orange-400 hover:border-orange-300 dark:hover:border-orange-600 transform hover:scale-105 shadow-sm hover:shadow-lg;
        }
        
        .pagination-wrapper .pagination .active span {
            @apply bg-gradient-to-r from-orange-500 to-red-500 text-white border-transparent shadow-lg;
        }
        
        .pagination-wrapper .pagination .disabled span {
            @apply bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-600 border-gray-200 dark:border-gray-700 cursor-not-allowed;
        }
        
        tbody tr {
            animation: fadeInUp 0.3s ease-out;
        }
        
        tbody tr:nth-child(even) {
            animation-delay: 0.1s;
        }
        
        tbody tr:nth-child(odd) {
            animation-delay: 0.2s;
        }
    </style>
</x-app-layout>