<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Statistik Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('statistik-penduduk.update', $statistikPenduduk->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Jenis Barang -->
                        <div>
                            <label for="nama_desa" class="block font-medium text-sm text-gray-700 mb-1">Nama Desa</label>
                            <input
                                type="text"
                                name="nama_desa"
                                id="nama_desa"
                                value="{{ $statistikPenduduk->nama_desa }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama desa"
                                required>
                        </div>
                        <div>
                            <label for="jumlah_peduduk" class="block font-medium text-sm text-gray-700 mb-1">Jumlah Penduduk</label>
                            <input
                                type="number"
                                name="jumlah_penduduk"
                                id="jumlah_peduduk"
                                value="{{ $statistikPenduduk->jumlah_penduduk }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan Jumlah Penduduk"
                                required>
                        </div>
                        <div>
                            <label for="jumlah_laki_laki" class="block font-medium text-sm text-gray-700 mb-1">Jumlah Laki-laki</label>
                            <input
                                type="number"
                                name="jumlah_laki_laki"
                                id="jumlah_laki_laki"
                                value="{{ $statistikPenduduk->jumlah_laki_laki }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan Jumlah Laki - Laki"
                                required>
                        </div>
                        <div>
                            <label for="jumlah_perempuan" class="block font-medium text-sm text-gray-700 mb-1">Jumlah Perempuan</label>
                            <input
                                type="number"
                                name="jumlah_perempuan"
                                id="jumlah_perempuan"
                                value="{{ $statistikPenduduk->jumlah_perempuan }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan Jumlah Perempuan"
                                required>
                        </div>

                        <!-- Tombol Update dan Kembali -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Update
                            </button>
                            <a href="{{ route('statistik-penduduk.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 shadow-lg">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>