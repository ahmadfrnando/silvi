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
                    <form action="{{ route('admin.jenis-barang.store') }}" method="POST" class="space-y-6">
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
                        <div>
                            <label for="keterangan" class="block font-medium text-sm text-gray-700 mb-1">Keterangan</label>
                            <textarea
                                type="text"
                                name="keterangan"
                                id="keterangan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama jenis aset"></textarea>
                        </div>

                        <!-- Tombol Simpan dan Kembali -->
                        <div class="col-12 text-right">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan Jenis Aset</button>
                            <a href="{{ route('admin.jenis-barang.index') }}">
                                <button type="button" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>