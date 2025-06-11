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
                    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 row">
                        @csrf

                        <!-- Judul Berita -->
                        <div class="col-md-6">
                            <label for="judul" class="block font-medium text-sm text-gray-700 mb-1">Judul</label>
                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan judul berita"
                                value="{{ old('judul') }}"
                                required>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-md-6">
                            <label for="tanggal" class="block font-medium text-sm text-gray-700 mb-1">Tanggal</label>
                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                value="{{ old('tanggal', date('Y-m-d')) }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="link_sumber" class="block font-medium text-sm text-gray-700 mb-1">Link Sumber</label>
                            <input
                                type="text"
                                name="link_sumber"
                                id="link_sumber"
                                value="{{ old('link_sumber') }}"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan link sumber berita"
                                required>
                        </div>

                        <!-- Isi Berita -->
                        <div class="col-12">
                            <label for="isi" class="block font-medium text-sm text-gray-700 mb-1">Isi</label>
                            <textarea
                                name="isi"
                                id="isi"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Masukkan isi berita"
                                required>{{ old('isi') }}</textarea>
                        </div>

                        <!-- Media -->
                        <div class="col-12">
                            <label for="media" class="block font-medium text-sm text-gray-700 mb-1">Media</label>
                            <input
                                type="file"
                                name="media"
                                id="media"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                accept="image/*,video/*"
                                required>
                            <small class="text-gray-500 block mt-1">File yang diizinkan: gambar (jpg, png, jpeg). Maksimal ukuran 2 MB.</small>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="col-12 text-right">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan Berita Baru</button>
                            <a href="{{ route('admin.berita.index') }}">
                                <button type="button" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>