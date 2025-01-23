<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('aset.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama Aset -->
                        <div>
                            <label for="nama_aset" class="block font-medium text-sm text-gray-700 mb-1">Nama Aset</label>
                            <input
                                type="text"
                                name="nama_aset"
                                id="nama_aset"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama aset"
                                required>
                        </div>

                        <!-- Jenis -->
                        <div>
                            <label for="jenis" class="block font-medium text-sm text-gray-700 mb-1">Jenis</label>
                            <select
                                name="jenis"
                                id="jenis"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="" selected disabled>Pilih jenis aset</option>
                                @foreach($jenisBarang as $jenis)
                                <option value="{{ $jenis->nama_jenis }}">{{ $jenis->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Merk -->
                        <div>
                            <label for="merk" class="block font-medium text-sm text-gray-700 mb-1">Merk</label>
                            <select
                                name="merk"
                                id="merk"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="" selected disabled>Pilih merk aset</option>
                                @foreach($merks as $merk)
                                <option value="{{ $merk->nama_merk }}">{{ $merk->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Tannggal -->
                        <div>
                            <label for="merk" class="block font-medium text-sm text-gray-700 mb-1">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan tanggal"
                                required>
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <label for="jumlah" class="block font-medium text-sm text-gray-700 mb-1">Jumlah</label>
                            <input
                                type="number"
                                name="jumlah"
                                id="jumlah"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan jumlah aset"
                                required>
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <label for="keterangan" class="block font-medium text-sm text-gray-700 mb-1">Keterangan</label>
                            <textarea
                                name="keterangan"
                                id="keterangan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                rows="4"
                                placeholder="Masukkan keterangan aset"></textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>