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
                    <form action="{{ route('admin.statistik-penduduk.update', $statistikPenduduk->id) }}" method="POST" class="space-y-6 row">
                        @csrf
                        @method('PUT')

                        <!-- Nama Desa -->
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="jumlah_penduduk" class="block font-medium text-sm text-gray-700 mb-1">Jumlah Penduduk</label>
                            <input
                                type="number"
                                name="jumlah_penduduk"
                                id="jumlah_penduduk"
                                value="{{ $statistikPenduduk->jumlah_penduduk }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan Jumlah Penduduk"
                                readonly
                                required>
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
    @push('scripts')
    <script>
        $(function() {
            $('#jumlah_laki_laki, #jumlah_perempuan').on('input', function() {
                var jumlah_laki_laki = parseInt($('#jumlah_laki_laki').val()) || 0;
                var jumlah_perempuan = parseInt($('#jumlah_perempuan').val()) || 0;
                var jumlah_penduduk = jumlah_laki_laki + jumlah_perempuan;
                $('#jumlah_penduduk').val(jumlah_penduduk);
            });
        });
    </script>
    @endpush
</x-app-layout>