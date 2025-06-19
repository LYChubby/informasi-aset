<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ __('Dashboard Manajemen Aset') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Kelola dan pantau semua aset perusahaan Anda
                </p>
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

    <div class="py-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cepat dengan animasi hover -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Semua Aset -->
                <div class="group bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-orange-500 hover:scale-105 hover:border-l-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Aset</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white group-hover:text-orange-600 transition-colors">
                                {{ number_format($totalAllAssets, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">Semua kategori</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg group-hover:shadow-orange-200 group-hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Aset Aktif -->
                <div class="group bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-green-500 hover:scale-105 hover:border-l-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Aset Aktif</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white group-hover:text-green-600 transition-colors">
                                {{ number_format($totalAktif, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-green-500 mt-1">Siap digunakan</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg group-hover:shadow-green-200 group-hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Aset Perbaikan -->
                <div class="group bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-yellow-500 hover:scale-105 hover:border-l-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Dalam Perbaikan</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white group-hover:text-yellow-600 transition-colors">
                                {{ number_format($totalPerbaikan, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-yellow-500 mt-1">Perlu perhatian</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 text-white shadow-lg group-hover:shadow-yellow-200 group-hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Aset Non-Aktif -->
                <div class="group bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-l-4 border-red-500 hover:scale-105 hover:border-l-8">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Non-Aktif</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white group-hover:text-red-600 transition-colors">
                                {{ number_format($totalNonAktif, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-red-500 mt-1">Tidak digunakan</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 text-white shadow-lg group-hover:shadow-red-200 group-hover:scale-110 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Utama dengan design card yang lebih menarik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Kelola Aset -->
                <a href="{{ route('assets.index') }}" class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden hover:scale-105 border border-gray-100 dark:border-gray-700 hover:border-orange-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-8 text-center">
                        <div class="inline-flex p-6 rounded-3xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-2xl group-hover:shadow-orange-300 group-hover:scale-110 transition-all duration-300 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-orange-600 transition-colors">Kelola Aset</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Manajemen inventaris dan data aset perusahaan dengan sistem terintegrasi</p>
                        <div class="mt-4 inline-flex items-center text-orange-600 dark:text-orange-400 font-medium group-hover:translate-x-2 transition-transform duration-300">
                            <span class="mr-2">Mulai Kelola</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Laporan -->
                <a href="{{ route('reports.index') }}" class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden hover:scale-105 border border-gray-100 dark:border-gray-700 hover:border-blue-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-8 text-center">
                        <div class="inline-flex p-6 rounded-3xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-2xl group-hover:shadow-blue-300 group-hover:scale-110 transition-all duration-300 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 transition-colors">Laporan</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Generate laporan aset, pemeliharaan, dan depresiasi dengan visualisasi data</p>
                        <div class="mt-4 inline-flex items-center text-blue-600 dark:text-blue-400 font-medium group-hover:translate-x-2 transition-transform duration-300">
                            <span class="mr-2">Lihat Laporan</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Kelola Akun -->
                <a href="{{ route('admin.users.index') }}" class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden hover:scale-105 border border-gray-100 dark:border-gray-700 hover:border-purple-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative p-8 text-center">
                        <div class="inline-flex p-6 rounded-3xl bg-gradient-to-br from-purple-500 to-purple-600 text-white shadow-2xl group-hover:shadow-purple-300 group-hover:scale-110 transition-all duration-300 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-purple-600 transition-colors">Kelola Akun</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Manajemen user dan hak akses sistem dengan kontrol keamanan</p>
                        <div class="mt-4 inline-flex items-center text-purple-600 dark:text-purple-400 font-medium group-hover:translate-x-2 transition-transform duration-300">
                            <span class="mr-2">Kelola User</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Aset Terbaru dengan design yang lebih modern -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-8 py-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-white">Aset Terbaru</h3>
                            <p class="text-orange-100 mt-1">Daftar aset yang baru ditambahkan ke sistem</p>
                        </div>
                        <a href="{{ route('assets.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-xl transition-all duration-300 font-medium backdrop-blur-sm">
                            <span class="mr-2">Lihat Semua</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="p-0">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50 dark:bg-gray-900/50">
                                <tr>
                                    <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nama Aset</th>
                                    <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Lokasi</th>
                                    <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tanggal Pembelian</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach($latestAssets as $asset)
                                <tr class="hover:bg-gradient-to-r hover:from-orange-50 hover:to-transparent dark:hover:from-orange-900/10 dark:hover:to-transparent transition-all duration-300 group">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-orange-400 rounded-full mr-4 group-hover:scale-150 transition-transform duration-300"></div>
                                            <div class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-orange-600 transition-colors">{{ $asset->nama }}</div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                            {{ $asset->kategori }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $asset->lokasi }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @if($asset->status == 'aktif')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300 shadow-sm">
                                                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                                                Aktif
                                            </span>
                                        @elseif($asset->status == 'perbaikan')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300 shadow-sm">
                                                <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2 animate-pulse"></span>
                                                Perbaikan
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300 shadow-sm">
                                                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                                                Non-Aktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                                        @if($asset->tanggal_pembelian)
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($asset->tanggal_pembelian)->format('d M Y') }}
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic">Tidak tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>