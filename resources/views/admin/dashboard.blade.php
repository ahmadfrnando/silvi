<x-app-layout>
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
            </div>

            <!-- Chart -->
            <div class="mt-10 py-6 bg-white shadow rounded-lg p-6 max-h-96">
                <h2 class="text-xl font-bold text-gray-800">Distribusi Aset Berdasarkan Jenis Aset</h2>
                {!! $asetChart->container() !!}
            </div>
        </div>
    </div>
    <!-- Tambahkan Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Render JavaScript Chart -->
    {!! $asetChart->script() !!}
</x-app-layout>