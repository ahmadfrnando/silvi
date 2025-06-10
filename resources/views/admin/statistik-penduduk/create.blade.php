<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Statistik Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('statistik-penduduk.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nama_desa" class="block font-medium text-sm text-gray-700 mb-1">Namas Desa</label>
                            <input
                                type="text"
                                name="nama_desa"
                                id="nama_desa"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama desa"
                                required>
                        </div>
                        <fieldset class="border border-gray-300 rounded-lg p-4">
                            <legend class="text-gray-700 font-semibold text-sm">Dusun I</legend>
                            <div>
                                <label for="dusun_satu_laki_laki" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                <input
                                    type="number"
                                    name="dusun_satu_laki_laki"
                                    id="dusun_satu_laki_laki"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk laki-laki dusun I"
                                    required>
                            </div>
                            <div>
                                <label for="dusun_satu_perempuan" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                <input
                                    type="number"
                                    name="dusun_satu_perempuan"
                                    id="dusun_satu_perempuan"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk perempuan dusun I"
                                    required>
                            </div>
                        </fieldset>
                        <fieldset class="border border-gray-300 rounded-lg p-4">
                            <legend class="text-gray-700 font-semibold text-sm">Dusun I</legend>
                            <div>
                                <label for="dusun_satu_laki_laki" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                <input
                                    type="number"
                                    name="dusun_satu_laki_laki"
                                    id="dusun_satu_laki_laki"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk laki-laki dusun I"
                                    required>
                            </div>
                            <div>
                                <label for="dusun_satu_perempuan" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                <input
                                    type="number"
                                    name="dusun_satu_perempuan"
                                    id="dusun_satu_perempuan"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk perempuan dusun I"
                                    required>
                            </div>
                        </fieldset>
                        <fieldset class="border border-gray-300 rounded-lg p-4">
                            <legend class="text-gray-700 font-semibold text-sm">Dusun I</legend>
                            <div>
                                <label for="dusun_satu_laki_laki" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                <input
                                    type="number"
                                    name="dusun_satu_laki_laki"
                                    id="dusun_satu_laki_laki"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk laki-laki dusun I"
                                    required>
                            </div>
                            <div>
                                <label for="dusun_satu_perempuan" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                <input
                                    type="number"
                                    name="dusun_satu_perempuan"
                                    id="dusun_satu_perempuan"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    placeholder="Masukkan jumlah penduduk perempuan dusun I"
                                    required>
                            </div>
                        </fieldset>
                        

                        <!-- Tombol Simpan dan Kembali -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Simpan
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