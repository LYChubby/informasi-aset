<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Aset') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Informasi Aset</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Aset</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->nama }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kategori</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->kategori }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lokasi</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->lokasi }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                                    <p class="mt-1 text-sm">
                                        @if($asset->status == 'aktif')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">Aktif</span>
                                        @elseif($asset->status == 'perbaikan')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Perbaikan</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">Non-Aktif</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Detail Tambahan</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Pembelian</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->tanggal_pembelian->format('d F Y') }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nilai Aset</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">Rp {{ number_format($asset->nilai, 2, ',', '.') }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->deskripsi ?? '-' }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Dibuat Pada</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->created_at->format('d F Y H:i') }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Diupdate Pada</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-gray-200">{{ $asset->updated_at->format('d F Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex items-center justify-end space-x-4">
                        <a href="{{ route('assets.edit', $asset->id) }}" class="px-4 py-2 bg-[#FF4B2B] text-white rounded-md hover:bg-[#E53935] dark:bg-[#FF8A65] dark:hover:bg-[#FF7043] transition">
                            Edit
                        </a>
                        <a href="{{ route('assets.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>