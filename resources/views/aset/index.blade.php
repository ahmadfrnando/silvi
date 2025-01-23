<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Aset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"><i class="fas fa-check-circle"></i> Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold"><i class="fas fa-exclamation-circle"></i> Terjadi kesalahan!</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <a href="{{ route('aset.create') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Aset
                    </a>
                    <div class="flex my-5 items-center justify-between">
                        <form method="GET" action="{{ route('aset.index') }}" class="flex items-center space-x-4">
                            <!-- Filter Jenis Barang -->
                            <div>
                                <select name="jenis" class="border border-gray-300 min-w-[200px] rounded p-2" onchange="this.form.submit()">
                                    <option value="">Pilih Jenis Aset</option>
                                    @foreach($jenisBarang as $jenis)
                                    <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>
                                        {{ $jenis }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Filter Merk -->
                            <div>
                                <select name="merk" class="border border-gray-300 min-w-[200px] rounded p-2" onchange="this.form.submit()">
                                    <option value="">Pilih Merk</option>
                                    @foreach($merks as $merk)
                                    <option value="{{ $merk }}" {{ request('merk') == $merk ? 'selected' : '' }}>
                                        {{ $merk }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Input Pencarian -->
                            <div>
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Cari Aset..."
                                    class="border border-gray-300 rounded p-2" />
                            </div>

                            <!-- Tombol Cari -->
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Cari
                                </button>
                            </div>
                        </form>

                        <!-- Tombol Reset Filter -->
                        <a href="{{ route('aset.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Reset
                        </a>
                    </div>

                    <table class="min-w-full mt-6 border rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">No.</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Nama Aset</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Jenis</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Merk</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Tanggal</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Jumlah</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($aset as $asset)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->nama_aset }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->jenis }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->merk }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ \Carbon\Carbon::parse($asset->tanggal)->formatLocalized('%d %B %Y') }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $asset->jumlah }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 flex space-x-4">
                                    <a href="{{ route('aset.show', $asset->id) }}" class="inline-flex items-center text-green-500 hover:text-green-700">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    <a href="{{ route('aset.edit', $asset->id) }}" class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('aset.destroy', $asset->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $aset->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
