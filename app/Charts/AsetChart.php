<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;
use App\Models\Aset;

class AsetChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        // Ambil data dari database
        $data = Aset::selectRaw('jenis.nama_jenis, count(*) as total')
            ->join('jenis_barang as jenis', 'jenis.id', '=', 'aset.id_jenis')
            ->groupBy('jenis.nama_jenis')
            ->get()
            ->pluck('total', 'nama_jenis');

        // Konfigurasi chart dengan data dari database
        $this->title('Distribusi Aset Berdasarkan Jenis Barang')
            ->labels($data->keys()->toArray()) // Ambil jenis aset sebagai label
            ->dataset('Jumlah Aset', 'bar', $data->values()->toArray()) // Jumlah aset sebagai dataset
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]);
    }
}
