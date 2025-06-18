<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Manajemen Aset') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cepat -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Total Semua Aset -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border-t-4 border-orange-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Aset</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($totalAllAssets, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Aset Aktif -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border-t-4 border-green-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Aktif</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($totalAktif, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Aset Perbaikan -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border-t-4 border-yellow-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Perbaikan</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($totalPerbaikan, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Aset Non-Aktif -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow border-t-4 border-red-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Non-Aktif</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($totalNonAktif, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Utama -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kelola Aset -->
                <a href="{{ route('assets.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-orange-500">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-300 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Kelola Aset</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Manajemen inventaris dan data aset perusahaan</p>
                    </div>
                </a>

                <!-- Laporan -->
                <a href="{{ route('reports.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-orange-400">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-500 dark:text-orange-300 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Laporan</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Generate laporan aset, pemeliharaan, dan depresiasi</p>
                    </div>
                </a>

                <!-- Kelola Akun -->
                <a href="{{ route('users.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-orange-300">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-400 dark:text-orange-300 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Kelola Akun</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Manajemen user dan hak akses sistem</p>
                    </div>
                </a>
            </div>

            <!-- Aset Terbaru -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-orange-500">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Aset Terbaru</h3>
                        <a href="{{ route('assets.index') }}" class="text-sm text-orange-600 hover:text-orange-500 dark:text-orange-400 dark:hover:text-orange-300 hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-orange-50 dark:bg-orange-900/20">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-600 dark:text-orange-300 uppercase tracking-wider">Nama Aset</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-600 dark:text-orange-300 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-600 dark:text-orange-300 uppercase tracking-wider">Lokasi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-600 dark:text-orange-300 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-orange-600 dark:text-orange-300 uppercase tracking-wider">Tanggal Pembelian</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($latestAssets as $asset)
                                <tr class="hover:bg-orange-50/50 dark:hover:bg-orange-900/10">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $asset->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $asset->kategori }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $asset->lokasi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($asset->status == 'aktif')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">Aktif</span>
                                        @elseif($asset->status == 'perbaikan')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">Perbaikan</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        @if($asset->tanggal_pembelian)
                                            {{ \Carbon\Carbon::parse($asset->tanggal_pembelian)->format('d M Y') }}
                                        @else
                                            -
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