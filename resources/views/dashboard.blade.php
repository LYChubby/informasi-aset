<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Manajemen Aset') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cepat -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Total Aset -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-[#FF4B2B]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-[#FFEEEA] dark:bg-[#331710] text-[#FF4B2B]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
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
                </div>

                <!-- Laporan Bulan Ini -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-[#FF7043]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-[#FFF0EB] dark:bg-[#331B10] text-[#FF7043]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Laporan Bulan Ini</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">24</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pengguna -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-[#FF8A65]">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-[#FFF2EE] dark:bg-[#332018] text-[#FF8A65]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pengguna</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Utama -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kelola Aset -->
                <a href="{{ route('assets.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-[#FF4B2B]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-[#FFEEEA] dark:bg-[#331710] text-[#FF4B2B] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Kelola Aset</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Manajemen inventaris dan data aset perusahaan</p>
                    </div>
                </a>

                <!-- Laporan -->
                <a href="{{ route('reports.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-[#FF7043]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-[#FFF0EB] dark:bg-[#331B10] text-[#FF7043] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Laporan</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Generate laporan aset, pemeliharaan, dan depresiasi</p>
                    </div>
                </a>

                <!-- Kelola Akun -->
                <a href="{{ route('users.index') }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-300 border border-transparent hover:border-[#FF8A65]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="p-4 rounded-full bg-[#FFF2EE] dark:bg-[#332018] text-[#FF8A65] mb-4">
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
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-[#FF4B2B]">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Aset Terbaru</h3>
            <a href="{{ route('assets.index') }}" class="text-sm text-[#FF4B2B] hover:text-[#E53935] dark:text-[#FF8A65] dark:hover:text-[#FF7043] hover:underline">Lihat Semua</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-[#FFEEEA] dark:bg-[#331710]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#D32F2F] dark:text-[#FF8A65] uppercase tracking-wider">Nama Aset</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#D32F2F] dark:text-[#FF8A65] uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#D32F2F] dark:text-[#FF8A65] uppercase tracking-wider">Lokasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#D32F2F] dark:text-[#FF8A65] uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#D32F2F] dark:text-[#FF8A65] uppercase tracking-wider">Tanggal Pembelian</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($latestAssets as $asset)
                    <tr class="hover:bg-[#FFF5F5] dark:hover:bg-[#332121]">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $asset->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $asset->kategori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $asset->lokasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($asset->status == 'aktif')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#E8F5E9] text-[#2E7D32] dark:bg-[#1B311B] dark:text-[#81C784]">Aktif</span>
                            @elseif($asset->status == 'perbaikan')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#FFF8E1] text-[#FF8F00] dark:bg-[#332900] dark:text-[#FFD54F]">Perbaikan</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#FFEBEE] text-[#C62828] dark:bg-[#331313] dark:text-[#EF5350]">Non-Aktif</span>
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