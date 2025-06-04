<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <!-- Tombol Tambah Merk -->
                    <a href="{{ route('super-admin.laporan.create') }}" class="btn btn-primary mb-4">
                        <i class="bi bi-file-earmark-code"></i> Generate Laporan Aset
                    </a>
                    <!-- Tabel Data Merk -->
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Nama Laporan</th>
                                <th>Periode Laporan</th>
                                <th>Tanggal Generate Laporan</th>
                                <th>File</th>
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
                ajax: "{{ route('super-admin.laporan.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_laporan',
                        name: 'nama_laporan'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'laporan',
                        name: 'laporan'
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
</x-app-super-admin-layout>