<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jenis Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('jenis-barang.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama Jenis Barang -->
                        <div>
                            <label for="nama_jenis" class="block font-medium text-sm text-gray-700 mb-1">Nama Jenis Aset</label>
                            <input
                                type="text"
                                name="nama_jenis"
                                id="nama_jenis"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama jenis aset"
                                required>
                        </div>

                        <!-- Tombol Simpan dan Kembali -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Simpan
                            </button>
                            <a href="{{ route('jenis-barang.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 shadow-lg">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>