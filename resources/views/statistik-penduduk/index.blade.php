<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistik Penduduk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-2xl font-bold mb-6 text-center">Detail Statistik Penduduk</h3>
                    @if($statistikPenduduk !== null)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Kelurahan -->
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-map-marker-alt text-green-500 text-2xl"></i>
                            <p><strong>Nama Kelurahan:</strong> {{ $statistikPenduduk->nama_desa ?? '-' }}</p>
                        </div>

                        <!-- Jumlah Penduduk -->
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-users text-green-500 text-2xl"></i>
                            <p><strong>Jumlah Penduduk:</strong> {{ $statistikPenduduk->jumlah_penduduk ?? '-' }}</p>
                        </div>

                        <!-- Jumlah Laki-laki -->
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-male text-blue-500 text-2xl"></i>
                            <p><strong>Laki-laki:</strong> {{ $statistikPenduduk->jumlah_laki_laki ?? '-' }}</p>
                        </div>

                        <!-- Jumlah Perempuan -->
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-female text-pink-500 text-2xl"></i>
                            <p><strong>Perempuan:</strong> {{ $statistikPenduduk->jumlah_perempuan ?? '-' }}</p>
                        </div>

                        <!-- Data Koordinat -->
                        <div class="flex items-center col-span-2 md:col-span-2">
                            <iframe src="{{ $statistikPenduduk->kordinat }}" class="w-full md:w-3/4 h-96 rounded-lg shadow" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-8 text-center">
                        <a href="{{ route('statistik-penduduk.edit', $statistikPenduduk->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                    </div>
                    @else
                    <div class="text-center">
                        <p class="text-lg text-gray-700 mb-6">Belum ada data statistik penduduk.</p>
                        <a href="{{ route('statistik-penduduk.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow">
                            <i class="fas fa-plus mr-2"></i>Buat
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>