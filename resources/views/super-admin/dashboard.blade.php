<x-app-super-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Kartu Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold">Total Aset</h2>
                    <p class="text-3xl font-semibold">{{ $totalAset }}</p>
                </div>
                <div class="bg-green-500 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold">Jenis Aset</h2>
                    <p class="text-3xl font-semibold">{{ $totalJenisBarang }}</p>
                </div>
                <div class="bg-yellow-500 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold">Merk</h2>
                    <p class="text-3xl font-semibold">{{ $totalMerk }}</p>
                </div>
                <div class="bg-red-500 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold">Total Laporan Tercetak</h2>
                    <p class="text-3xl font-semibold">{{ $totalLaporan }}</p>
                </div>
                <div class="bg-gray-500 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold">Total Akun Pengguna</h2>
                    <p class="text-3xl font-semibold">{{ $totalAkun }}</p>
                </div>
            </div>

            <!-- Chart -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                <div class="py-6 bg-white shadow rounded-lg p-6 max-h-96">
                    <h2 class="text-xl font-bold text-gray-800">Distribusi Aset Berdasarkan Jenis Aset</h2>
                    {!! $asetChart->container() !!}
                </div>
                <div class="bg-gray-100 text-white rounded-lg shadow p-6">
                    <h2 class="text-lg text-gray-800 font-bold">Daftar Akun Pegawai</h2>
                    <div class="relative overflow-x-auto rounded-lg mt-2">
                        <table class="w-full rounded-lg text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Username
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dibuat Pada
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('super-admin.user.edit', $user) }}" target="_blank">
                                            <button type="button" class="btn btn-outline-danger btn-sm" style="white-space: nowrap">
                                                Kelola Akun
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambahkan Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Render JavaScript Chart -->
    {!! $asetChart->script() !!}
</x-app-super-admin-layout>