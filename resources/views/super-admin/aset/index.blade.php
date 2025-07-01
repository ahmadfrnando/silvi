<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>Tanggal</th>
                                <th>Sumber Aset</th>
                                <th>Nama Aset</th>
                                <th>Jenis Aset</th>
                                <th>Kategori Aset</th>
                                <th>Merk Aset</th>
                                <th>Jumlah</th>
                                <th>keterangan</th>
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
                ajax: "{{ route('super-admin.aset.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'sumber_aset',
                        name: 'sumber_aset'
                    },
                    {
                        data: 'nama_aset',
                        name: 'nama_aset'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori',
                        orderable: false
                    },
                    {
                        data: 'merk',
                        name: 'merk'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah',
                        orderable: false
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        orderable: false
                    },
                ]
            });
        });
    </script>
    @endpush
</x-app-super-admin-layout>