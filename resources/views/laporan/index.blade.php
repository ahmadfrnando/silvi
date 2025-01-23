<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"><i class="fas fa-check-circle"></i> Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"><i class="fas fa-exclamation-circle"></i> Terjadi kesalahan!</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <!-- Tombol Export PDF dan Excel -->
                    <div class="flex space-x-4 mb-6">
                        <a href="{{ route('laporan.exportPdf') }}" class="inline-flex items-center bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            <i class="fas fa-file-pdf mr-2"></i> Export PDF
                        </a>
                        <a href="{{ route('laporan.exportExcel') }}" class="inline-flex items-center bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            <i class="fas fa-file-excel mr-2"></i> Export Excel
                        </a>
                    </div>

                    <!-- Tabel Data Aset -->
                    <table class="min-w-full border rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">No</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Nama Aset</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Jenis</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Merk</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($assets as $asset)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->nama_aset }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->jenis }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->merk }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->jumlah }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $assets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>