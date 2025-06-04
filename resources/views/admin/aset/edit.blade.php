<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="w-full p-6 text-gray-900">
                    <form action="{{ route('admin.aset.update', $aset->id) }}" method="POST" class="space-y-6 row">
                        @csrf
                        @method('PUT')

                        <!-- Nama Aset -->
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                            <label for="id_kategori" class="block font-medium text-sm text-gray-700 mb-1">Kategori</label>
                            <select
                                id="id_kategori"
                                name="id_kategori"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $aset->id_kategori ? 'selected' : '' }}>{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Jenis -->
                        <div class="col-md-6">
                            <label for="id_jenis" class="form-label">Jenis</label>
                            <select
                                id="id_jenis"
                                name="id_jenis"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                style="width: 100%; height: 38px;"
                                required>
                            </select>
                        </div>

                        <!-- Merk -->
                        <div class="col-md-6">
                            <label for="id_merk" class="form-label">Merk</label>
                            <select
                                id="id_merk"
                                name="id_merk"
                                class="form-select form-select2"
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

                        <!-- Jumlah -->
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                        <div class="col-md-12">
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
    @push('scripts')
    <script type="text/javascript">
        $(function() {
            $('#is_tidak_ada_merk').click(function() {
                if ($(this).prop("checked")) {
                    $('#id_merk').prop('disabled', true);
                    $('#id_merk').val('').trigger('change');

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
            var jenisId = '{{ $aset->id_jenis }}';
            var jenisNama = '{{ $aset->jenis->nama_jenis }}';

            if (jenisId) {
                // Buat option baru dan trigger select2 untuk preselect
                var option = new Option(jenisNama, jenisId, true, true);
                $('#id_jenis').append(option).trigger('change');
            }

            var merkId = '{{ $aset->id_merk }}';
            var merkNama = '{{ $aset->merk->nama_merk }}';

            if (merkId) {
                // Buat option baru dan trigger select2 untuk preselect
                var option = new Option(merkNama, merkId, true, true);
                $('#id_merk').append(option).trigger('change');
            }
        });
    </script>
    @endpush
</x-app-layout>