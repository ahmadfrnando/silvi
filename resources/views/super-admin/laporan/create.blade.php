<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Laporan Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('super-admin.laporan.store') }}" method="POST" class="row g-3">
                        @csrf

                        <!-- Nama Aset -->
                        <div class="col-md-12">
                            <label for="nama_laporan" class="block font-medium text-sm text-gray-700 mb-1">Nama Laporan</label>
                            <input
                                type="text"
                                name="nama_laporan"
                                id="nama_laporan"
                                value="{{ old('nama_laporan') }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama Laporan"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_mulai" class="block font-medium text-sm text-gray-700 mb-1">Tanggal Mulai</label>
                            <input
                                type="date"
                                name="tanggal_mulai"
                                id="tanggal_mulai"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_selesai" class="block font-medium text-sm text-gray-700 mb-1">Tanggal Selesai</label>
                            <input
                                type="date"
                                name="tanggal_selesai"
                                id="tanggal_selesai"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="keterangan" class="block font-medium text-sm text-gray-700 mb-1">Keterangan</label>
                            <textarea
                                name="keterangan"
                                id="keterangan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                rows="4"
                                placeholder="Masukkan keterangan laporan">{{ old('keterangan') ?? '' }}</textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-12 text-right">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Generate Sekarang</button>
                            <a href="{{ route('super-admin.laporan.index') }}">
                                <button class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(function() {
            $('#is_tidak_ada_merk').click(function() {
                if ($(this).prop("checked")) {
                    $('#id_merk').prop('disabled', true);
                } else {
                    $('#id_merk').prop('disabled', false);
                }
            });

            $('#id_merk').select2({
                minimumInputLength: 2,
                placeholder: 'Pilih Merk',
                allowClear: true,
                width: 'resolve',
                language: "id",
                ajax: {
                    url: route('ajax-load.merk'),
                    dataType: 'json',
                    processResults: data => {
                        return {
                            results: data.map(res => {
                                return {
                                    text: res.nama_merk,
                                    id: res.id
                                }
                            })
                        }
                    }
                }
            });
            $('#id_jenis').select2({
                minimumInputLength: 2,
                placeholder: 'Pilih Jenis',
                allowClear: true,
                width: 'resolve',
                language: "id",
                ajax: {
                    url: route('ajax-load.jenis'),
                    dataType: 'json',
                    processResults: data => {
                        return {
                            results: data.map(res => {
                                return {
                                    text: res.nama_jenis,
                                    id: res.id
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-super-admin-layout>