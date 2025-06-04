<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Charts\AsetChart;
use App\Models\Aset;

class DashboardController extends Controller
{
    public function index(AsetChart $asetChart)
    {
        $totalAset = Aset::count();
        $totalJenisBarang = Aset::select('jenis')->distinct()->count();
        $totalMerk = Aset::select('merk')->distinct()->count();
        // Kirim chart ke view
        $asetChart = new AsetChart();
        return view('super-admin.dashboard', ['asetChart' => $asetChart, 'totalAset' => $totalAset, 'totalJenisBarang' => $totalJenisBarang, 'totalMerk' => $totalMerk]);
    }
}
