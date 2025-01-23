<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('berita.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama Aset -->
                        <div>
                            <label for="judul" class="block font-medium text-sm text-gray-700 mb-1">Judul</label>
                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan judul"
                                required>
                        </div>
                        <div>
                            <label for="tanggal" class="block font-medium text-sm text-gray-700 mb-1">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                value="{{ date('Y-m-d') }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>

                        <div>
                            <label for="isi" class="block font-medium text-sm text-gray-700 mb-1">isi</label>
                            <textarea
                                type="text"
                                name="isi"
                                id="isi"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan isi"
                                required></textarea>
                        </div>

                        <div>
                            <label for="media" class="block font-medium text-sm text-gray-700 mb-1">Media</label>
                            <input
                                type="file"
                                name="media"
                                id="media"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>