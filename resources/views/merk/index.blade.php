<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Merk') }}
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
                    <!-- Tombol Tambah Merk -->
                    <a href="{{ route('merk.create') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah Merk
                    </a>
                    <div class="flex items-center my-6 justify-between">
                        <!-- Form Search -->
                        <form method="GET" action="{{ route('merk.index') }}" class="flex items-center space-x-4">
                            <div>
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Cari Merk..."
                                    class="border border-gray-300 rounded p-2" />
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Cari
                                </button>
                            </div>
                        </form>

                        <!-- Tombol Reset Search -->
                        <a href="{{ route('merk.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Reset
                        </a>
                    </div>

                    <!-- Tabel Data Merk -->
                    <table class="min-w-full mt-6 border rounded-lg overflow-hidden">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">No</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Nama Merk</th>
                                <th class="px-4 py-2 text-left font-semibold text-sm text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($merks as $merk)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $merk->nama_merk }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 flex space-x-4">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('merk.show', $merk->id) }}" class="inline-flex items-center text-green-500 hover:text-green-700">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('merk.edit', $merk->id) }}" class="inline-flex items-center text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('merk.destroy', $merk->id) }}" method="POST" class="inline">
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
                        {{ $merks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>