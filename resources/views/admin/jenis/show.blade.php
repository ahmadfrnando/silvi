<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Jenis Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-4">Detail Jenis Aset</h3>
                    <ul>
                        <li><strong>Nama Jenis Aset:</strong> {{ $jenisBarang->nama_jenis }}</li>
                        <li><strong>Keterangan:</strong> {{ $jenisBarang->keterangan }}</li>
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('admin.jenis-barang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                        <a href="{{ route('admin.jenis-barang.edit', $jenisBarang->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('admin.jenis-barang.destroy', $jenisBarang->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
