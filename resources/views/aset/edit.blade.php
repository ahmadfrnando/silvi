<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('aset.update', $aset->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Aset -->
                        <div>
                            <label for="nama_aset" class="block font-medium text-sm text-gray-700 mb-1">Nama Aset</label>
                            <input 
                                type="text" 
                                name="nama_aset" 
                                id="nama_aset" 
                                value="{{ $aset->nama_aset }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan nama aset" 
                                required>
                        </div>

                        <!-- Jenis -->
                        <div>
                            <label for="jenis" class="block font-medium text-sm text-gray-700 mb-1">Jenis</label>
                            <input 
                                type="text" 
                                name="jenis" 
                                id="jenis" 
                                value="{{ $aset->jenis }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan jenis aset" 
                                required>
                        </div>

                        <!-- Merk -->
                        <div>
                            <label for="merk" class="block font-medium text-sm text-gray-700 mb-1">Merk</label>
                            <input 
                                type="text" 
                                name="merk" 
                                id="merk" 
                                value="{{ $aset->merk }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan merk aset" 
                                required>
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <label for="tanggal" class="block font-medium text-sm text-gray-700 mb-1">Tanggal</label>
                            <input 
                                type="date" 
                                name="tanggal" 
                                id="tanggal" 
                                value="{{ $aset->tanggal }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan tanggal aset" 
                                required>
                        </div>
                        <!-- Jumlah -->
                        <div>
                            <label for="jumlah" class="block font-medium text-sm text-gray-700 mb-1">Jumlah</label>
                            <input 
                                type="number" 
                                name="jumlah" 
                                id="jumlah" 
                                value="{{ $aset->jumlah }}" 
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
                                placeholder="Masukkan keterangan aset">{{ $aset->keterangan }}</textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
