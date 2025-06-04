<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <!-- Tombol Tambah Merk -->
                    <a href="{{ route('admin.aset.create') }}" class="btn btn-primary mb-4">
                        <i class="bi bi-plus-circle"></i> Tambah Aset
                    </a>
                    <!-- Tabel Data Merk -->
                    <table id="asetTable" class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Tanggal</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Jenis Aset</th>
                                <th>Merk</th>
                                <th>Jumlah</th>
                                <th width="200px">Keterangan</th>
                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: route('admin.aset.index'),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        searchable: false
                    },
                    {
                        data: 'nama_aset',
                        name: 'nama_aset'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'merk',
                        name: 'merk'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>