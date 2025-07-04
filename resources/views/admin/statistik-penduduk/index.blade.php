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
                    <div class="mb-6 border-b border-gray-200">
                        <h3 class="text-2xl font-bold mb-6 text-center">Detail Statistik Penduduk</h3>
                    </div>
                    @if($statistikPenduduk !== null)
                    <div class="row w-full">
                        <!-- Data Koordinat -->
                        <div class="col-md-6">
                            <div class="flex items-center col-span-2 md:col-span-2">
                                <iframe src="{{ $statistikPenduduk->kordinat }}" class="w-full h-96 rounded-lg shadow" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Nama Kelurahan -->
                            <div class="p-4 bg-white mb-4 shadow rounded-lg flex items-center space-x-4">
                                <i class="fas fa-map-marker-alt text-green-500 text-2xl"></i>
                                <p><strong>Nama Kelurahan:</strong> {{ $statistikPenduduk->nama_desa ?? '-' }}</p>
                            </div>

                            <!-- Jumlah Penduduk -->
                            <div class="p-4 bg-white mb-4 shadow rounded-lg flex items-center space-x-4">
                                <i class="fas fa-users text-green-500 text-2xl"></i>
                                <p><strong>Jumlah Penduduk:</strong> {{ $statistikPenduduk->jumlah_penduduk ?? '-' }} Jiwa</p>
                            </div>

                            <!-- Jumlah Laki-laki -->
                            <div class="p-4 bg-white mb-4 shadow rounded-lg flex items-center space-x-4">
                                <i class="fas fa-male text-blue-500 text-2xl"></i>
                                <p><strong>Laki-laki:</strong> {{ $statistikPenduduk->jumlah_laki_laki ?? '-' }} Jiwa</p>
                            </div>

                            <!-- Jumlah Perempuan -->
                            <div class="p-4 bg-white mb-4 shadow rounded-lg flex items-center space-x-4">
                                <i class="fas fa-female text-pink-500 text-2xl"></i>
                                <p><strong>Perempuan:</strong> {{ $statistikPenduduk->jumlah_perempuan ?? '-' }} Jiwa</p>
                            </div>
                        </div>
                        <div class="col-12 mt-6">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-green-100">
                                        <th class="border px-4 py-2">No</th>
                                        <th class="border px-4 py-2">Dusun</th>
                                        <th class="border px-4 py-2">Jumlah Penduduk Pria</th>
                                        <th class="border px-4 py-2">Jumlah Penduduk Wanita</th>
                                        <th class="border px-4 py-2">Jumlah Seluruh Penduduk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dusun as $key => $i)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                        <td class="border px-4 py-2">{{$i->nama_dusun}}</td>
                                        <td class="border px-4 py-2">{{ $i->pria }} Jiwa</td>
                                        <td class="border px-4 py-2">{{ $i->wanita }} Jiwa</td>
                                        <td class="border px-4 py-2">{{ $i->total }} Jiwa</td>
                                    </tr>
                                    @endforeach
                                    <tr class="font-extrabold bg-gray-100">
                                        <td colspan="2" class="border px-4 py-2">Total</td>
                                        <td class="border px-4 py-2">{{ $dusun->sum('pria') }} Jiwa</td>
                                        <td class="border px-4 py-2">{{ $dusun->sum('wanita') }} Jiwa</td>
                                        <td class="border px-4 py-2">{{ $dusun->sum('total') }} Jiwa</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-8 text-right mb-4 border-t border-gray-200">
                        <a href="{{ route('admin.statistik-penduduk.edit', $statistikPenduduk->id) }}">
                            <button type="submit" class="mt-8 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Sesuaikan Data Desa</button>
                        </a>
                    </div>
                    @else
                    <div class="text-center">
                        <p class="text-lg text-gray-700 mb-6">Belum ada data statistik penduduk.</p>
                        <a href="{{ route('admin.statistik-penduduk.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow">
                            <i class="fas fa-plus mr-2"></i>Buat
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>