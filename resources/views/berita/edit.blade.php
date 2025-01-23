<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Nama Aset -->
                        <div>
                            <label for="judul" class="block font-medium text-sm text-gray-700 mb-1">Judul</label>
                            <input 
                                type="text" 
                                name="judul" 
                                id="judul" 
                                value="{{ $berita->judul }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan nama aset" 
                                required>
                        </div>

                        <!-- Jenis -->
                        <div>
                            <label for="tanggal" class="block font-medium text-sm text-gray-700 mb-1">tanggal</label>
                            <input 
                                type="date" 
                                name="tanggal" 
                                id="tanggal" 
                                value="{{ $berita->tanggal }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                required>
                        </div>

                        <!-- Merk -->
                        <div>
                            <label for="isi" class="block font-medium text-sm text-gray-700 mb-1">isi</label>
                            <textarea 
                                type="text" 
                                name="isi" 
                                id="isi" 
                                value="{{ $berita->isi }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                placeholder="Masukkan isi" 
                                required></textarea>
                        </div>

                        <!-- Jumlah -->
                        <img src="{{ asset('storage/' . $berita->media) }}" alt="{{ $berita->judul }}">
                        <div>
                            <label for="media" class="block font-medium text-sm text-gray-700 mb-1">Media</label>
                            <input 
                                type="file" 
                                name="media" 
                                id="media" 
                                value="{{ $berita->media }}" 
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                required>
                        </div>
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
</x-app-layout>
