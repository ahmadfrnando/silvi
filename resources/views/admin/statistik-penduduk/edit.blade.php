<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Statistik Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.statistik-penduduk.update', $statistikPenduduk->id) }}" method="POST" class="space-y-6 row px-4">
                        @csrf
                        @method('PUT')

                        <!-- Nama Desa -->
                        <div class="col-12">
                            <label for="nama_desa" class="block font-medium text-sm text-gray-700 mb-1">Nama Desa</label>
                            <input
                                type="text"
                                name="nama_desa"
                                id="nama_desa"
                                value="{{ $statistikPenduduk->nama_desa }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama desa"
                                required>
                            <span class="text-xs text-gray-500 block italic mt-1">Nama ini akan muncul di laporan dan landing page pada website</span>
                        </div>
                        <div class="col-12 d-flex flex-row justify-content-between gap-4">
                            <fieldset class="border border-gray-300 rounded-lg p-4 w-1/2">
                                <legend class="text-gray-700 font-semibold text-sm">Dusun I</legend>
                                <div class="mb-1">
                                    <label for="nama_dusun_1" class="block font-medium text-sm text-gray-700 mb-1">Nama Dusun I</label>
                                    <input
                                        type="text"
                                        name="nama_dusun_1"
                                        id="nama_dusun_1"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['nama_dusun_1'] }}"
                                        placeholder="Masukkan nama dusun I"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_1_pria" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                    <input
                                        type="number"
                                        name="dusun_1_pria"
                                        id="dusun_1_pria"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['dusun_1_pria'] }}"
                                        placeholder="Masukkan jumlah penduduk laki-laki dusun I"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_1_wanita" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                    <input
                                        type="number"
                                        name="dusun_1_wanita"
                                        id="dusun_1_wanita"
                                        value="{{ $statistikDusun['dusun_1_wanita'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk perempuan dusun I"
                                        required>
                                </div>
                            </fieldset>
                            <fieldset class="border border-gray-300 rounded-lg p-4 w-1/2">
                                <legend class="text-gray-700 font-semibold text-sm">Dusun II</legend>
                                <div class="mb-1">
                                    <label for="nama_dusun_2" class="block font-medium text-sm text-gray-700 mb-1">Nama Dusun II</label>
                                    <input
                                        type="text"
                                        name="nama_dusun_2"
                                        id="nama_dusun_2"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['nama_dusun_2'] }}"
                                        placeholder="Masukkan nama dusun II"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_2_pria" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                    <input
                                        type="number"
                                        name="dusun_2_pria"
                                        id="dusun_2_pria"
                                        value="{{ $statistikDusun['dusun_2_pria'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk laki-laki dusun II"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_2_wanita" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                    <input
                                        type="number"
                                        name="dusun_2_wanita"
                                        id="dusun_2_wanita"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['dusun_2_wanita'] }}"
                                        placeholder="Masukkan jumlah penduduk perempuan dusun II"
                                        required>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12 d-flex flex-row justify-content-between gap-4">
                            <fieldset class="border border-gray-300 rounded-lg p-4 w-1/2">
                                <legend class="text-gray-700 font-semibold text-sm">Dusun III</legend>
                                <div class="mb-1">
                                    <label for="nama_dusun_3" class="block font-medium text-sm text-gray-700 mb-1">Nama Dusun III</label>
                                    <input
                                        type="text"
                                        name="nama_dusun_3"
                                        id="nama_dusun_3"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['nama_dusun_3'] }}"
                                        placeholder="Masukkan nama dusun III"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_3_pria" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                    <input
                                        type="number"
                                        name="dusun_3_pria"
                                        id="dusun_3_pria"
                                        value="{{ $statistikDusun['dusun_3_pria'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk laki-laki dusun III"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_3_wanita" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                    <input
                                        type="number"
                                        name="dusun_3_wanita"
                                        id="dusun_3_wanita"
                                        value="{{ $statistikDusun['dusun_3_wanita'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk perempuan dusun III"
                                        required>
                                </div>
                            </fieldset>
                            <fieldset class="border border-gray-300 rounded-lg p-4 w-1/2">
                                <legend class="text-gray-700 font-semibold text-sm">Dusun IV</legend>
                                <div class="mb-1">
                                    <label for="nama_dusun_4" class="block font-medium text-sm text-gray-700 mb-1">Nama Dusun IV</label>
                                    <input
                                        type="text"
                                        name="nama_dusun_4"
                                        id="nama_dusun_4"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        value="{{ $statistikDusun['nama_dusun_4'] }}"
                                        placeholder="Masukkan nama dusun IV"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_4_pria" class="block font-medium text-sm text-gray-700 mb-1">Laki-laki</label>
                                    <input
                                        type="number"
                                        name="dusun_4_pria"
                                        id="dusun_4_pria"
                                        value="{{ $statistikDusun['dusun_4_pria'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk laki-laki dusun IV"
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label for="dusun_4_wanita" class="block font-medium text-sm text-gray-700 mb-1">Perempuan</label>
                                    <input
                                        type="number"
                                        name="dusun_4_wanita"
                                        id="dusun_4_wanita"
                                        value="{{ $statistikDusun['dusun_4_wanita'] }}"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Masukkan jumlah penduduk perempuan dusun IV"
                                        required>
                                </div>
                            </fieldset>
                        </div>
                        <!-- Tombol Update dan Kembali -->
                        <div class="col-12 text-right">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan Perubahan Data</button>
                            <a href="{{ route('admin.statistik-penduduk.index') }}">
                                <button type="button" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>