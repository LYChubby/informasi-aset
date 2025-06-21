<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
            📋 Detail Laporan Aset
        </h2>
    </x-slot>

    <div class="py-10 px-6 max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl overflow-hidden border border-orange-100 dark:border-orange-900">
            <!-- Header Card -->
            <div class="bg-gradient-to-br from-orange-400 via-orange-500 to-orange-600 dark:from-orange-600 dark:via-orange-700 dark:to-orange-800 p-8 text-white relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative z-10 flex justify-between items-start">
                    <div>
                        <div class="flex items-center mb-2">
                            <div class="w-2 h-8 bg-white rounded-full mr-3"></div>
                            <h1 class="text-3xl font-bold">{{ $report->nama_aset }}</h1>
                        </div>
                        <p class="mt-2 text-orange-100 dark:text-orange-200 text-lg">
                            <span class="font-semibold">Kategori:</span> {{ $report->kategori }}
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        @if($report->status === 'belum_ditanggapi')
                            <span class="text-red-500 flex items-center">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                Belum Ditanggapi
                            </span>
                        @elseif($report->status === 'ditanggapi')
                            <span class="text-yellow-500 flex items-center">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                Sedang Ditanggapi
                            </span>
                        @else
                            <span class="text-green-500 flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Selesai
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Body Card -->
            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Informasi Dasar -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl border border-orange-200 dark:border-orange-700">
                        <div class="flex items-center mb-4">
                            <div class="w-1 h-6 bg-orange-500 rounded-full mr-3"></div>
                            <h3 class="text-xl font-bold text-orange-800 dark:text-orange-200">Informasi Dasar</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Jenis Laporan</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">
                                    @if($report->title === 'perbaikan')
                                        🔧 Permintaan Perbaikan
                                    @elseif($report->title === 'penambahan')
                                        ➕ Permintaan Penambahan Aset
                                    @else
                                        ⚠️ Laporan Kerusakan
                                    @endif
                                </p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Lokasi Aset</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">📍 {{ $report->lokasi }}</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Pelapor</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">👤 {{ $report->user->name }}</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Tanggal Laporan</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">📅 {{ $report->created_at->translatedFormat('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Laporan -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl border border-orange-200 dark:border-orange-700">
                        <div class="flex items-center mb-4">
                            <div class="w-1 h-6 bg-orange-500 rounded-full mr-3"></div>
                            <h3 class="text-xl font-bold text-orange-800 dark:text-orange-200">Detail Laporan</h3>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg border border-orange-200 dark:border-orange-700 min-h-[200px] max-h-[400px] overflow-y-auto">
                            <div class="flex items-baseline">
                            
                                <p class="whitespace-pre-line text-gray-700 dark:text-gray-300 leading-relaxed break-words overflow-hidden">
                                    📝 {{ $report->laporan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($report->title !== 'penambahan' && $report->aset_id)
                <div class="border-t-2 border-orange-200 dark:border-orange-700 pt-8">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 dark:from-orange-600 dark:to-orange-700 p-6 rounded-xl text-white mb-6">
                        <div class="flex items-center">
                            <div class="text-3xl mr-4">🏷️</div>
                            <h3 class="text-2xl font-bold">Informasi Aset Terkait</h3>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl border border-orange-200 dark:border-orange-700">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Status Aset</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white capitalize">
                                    ✅ {{ $report->asset->status }}
                                </p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Tanggal Pembelian</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">
                                    🛒 {{ optional($report->asset->tanggal_pembelian)->translatedFormat('d F Y') ?? '-' }}
                                </p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Nilai Aset</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">
                                    💰 {{ $report->asset->nilai ? 'Rp ' . number_format($report->asset->nilai, 0, ',', '.') : '-' }}
                                </p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-orange-200 dark:border-orange-700">
                                <p class="text-sm text-orange-600 dark:text-orange-400 font-medium mb-1">Deskripsi</p>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">
                                    📄 {{ $report->asset->deskripsi ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Footer Card -->
            <div class="bg-gradient-to-r from-orange-100 to-orange-200 dark:from-orange-900/30 dark:to-orange-800/30 px-8 py-6 flex justify-between items-center border-t-2 border-orange-300 dark:border-orange-600">
                <a href="{{ route('reports.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 border border-transparent rounded-lg font-bold text-white transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <span class="mr-2">←</span>
                    Kembali
                </a>

                @can('update', $report)
                <a href="{{ route('reports.edit', $report->id) }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 border border-transparent rounded-lg font-bold text-white transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <span class="mr-2">✏️</span>
                    Edit Laporan
                </a>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>