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
        $data = Aset::select('jenis', DB::raw('count(*) as total'))
            ->groupBy('jenis')
            ->pluck('total', 'jenis');

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
