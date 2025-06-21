<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-white tracking-tight">
            📋 Detail Laporan Aset
        </h2>
    </x-slot>

    <div class="py-10 px-6 max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-700 dark:to-blue-800 p-6 text-white">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $report->nama_aset }}</h1>
                        <p class="mt-1 text-blue-100 dark:text-blue-200">
                            <span class="font-medium">Kategori:</span> {{ $report->kategori }}
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white px-3 py-1 rounded-full text-sm font-semibold">
                        @if($report->status === 'belum_ditanggapi')
                            <span class="text-red-500">Belum Ditanggapi</span>
                        @elseif($report->status === 'ditanggapi')
                            <span class="text-yellow-500">Sedang Ditanggapi</span>
                        @else
                            <span class="text-green-500">Selesai</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Body Card -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Informasi Dasar</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Jenis Laporan</p>
                                <p class="font-medium capitalize">
                                    @if($report->title === 'perbaikan')
                                        Permintaan Perbaikan
                                    @elseif($report->title === 'penambahan')
                                        Permintaan Penambahan Aset
                                    @else
                                        Laporan Kerusakan
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Lokasi Aset</p>
                                <p class="font-medium">{{ $report->lokasi }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pelapor</p>
                                <p class="font-medium">{{ $report->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Laporan</p>
                                <p class="font-medium">{{ $report->created_at->translatedFormat('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Detail Laporan</h3>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <p class="whitespace-pre-line">{{ $report->laporan }}</p>
                        </div>
                    </div>
                </div>

                @if($report->title !== 'penambahan' && $report->aset_id)
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Informasi Aset Terkait</h3>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Status Aset</p>
                                <p class="font-medium capitalize">{{ $report->asset->status }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Pembelian</p>
                                <p class="font-medium">
                                    {{ optional($report->asset->tanggal_pembelian)->translatedFormat('d F Y') ?? '-' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nilai Aset</p>
                                <p class="font-medium">
                                    {{ $report->asset->nilai ? 'Rp ' . number_format($report->asset->nilai, 0, ',', '.') : '-' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Deskripsi</p>
                                <p class="font-medium">
                                    {{ $report->asset->deskripsi ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 flex justify-between items-center border-t border-gray-200 dark:border-gray-600">
                <a href="{{ route('reports.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-gray-800 dark:text-white hover:bg-gray-400 dark:hover:bg-gray-500 transition">
                    Kembali
                </a>

                @can('update', $report)
                <a href="{{ route('reports.edit', $report->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition">
                    Edit Laporan
                </a>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>