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
                    <form action="{{ route('admin.aset.store') }}" method="POST" class="row g-3">
                        @csrf

                        <!-- Nama Aset -->
                        <div class="col-md-6">
                            <label for="nama_aset" class="block font-medium text-sm text-gray-700 mb-1">Nama Aset</label>
                            <input
                                type="text"
                                name="nama_aset"
                                id="nama_aset"
                                value="{{ old('nama_aset') }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan nama aset"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="id_kategori" class="block font-medium text-sm text-gray-700 mb-1">Kategori</label>
                            <select
                                id="id_kategori"
                                name="id_kategori"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="id_jenis" class="block font-medium text-sm text-gray-700 mb-1">Jenis Aset</label>
                            <select
                                id="id_jenis"
                                name="id_jenis"
                                class="w-full form-select2 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                style="width: 100%; height: 38px;"
                                required>
                            </select>
                        </div>

                        <!-- Merk -->
                        <div class="col-md-6">
                            <label for="id_merk" class="block font-medium text-sm text-gray-700 mb-1">Merk Aset <span class="text-xs">(opsional)</span></label>
                            <select
                                id="id_merk"
                                name="id_merk"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                style="width: 100%; height: 38px;">
                            </select>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value="1"
                                    id="is_tidak_ada_merk"
                                    name="is_tidak_ada_merk">
                                <label class="form-check-label" for="is_tidak_ada_merk">
                                    Tidak ada merk
                                </label>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-md-6">
                            <label for="tanggal" class="block font-medium text-sm text-gray-700 mb-1">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan tanggal"
                                required>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-6">
                            <label for="jumlah" class="block font-medium text-sm text-gray-700 mb-1">Jumlah Aset</label>
                            <input
                                type="number"
                                name="jumlah"
                                id="jumlah"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan jumlah aset"
                                required>
                        </div>

                        <!-- Keterangan -->
                        <div class="col-12">
                            <label for="keterangan" class="block font-medium text-sm text-gray-700 mb-1">Keterangan</label>
                            <textarea
                                name="keterangan"
                                id="keterangan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                rows="4"
                                placeholder="Masukkan keterangan aset">{{ old('keterangan') ?? '' }}</textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-12 text-right">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan Data Aset</button>
                            <a href="{{ route('admin.aset.index') }}">
                                <button type="button" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
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
</x-app-layout>