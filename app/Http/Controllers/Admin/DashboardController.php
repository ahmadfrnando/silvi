<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Charts\AsetChart;
use App\Models\Aset;

class DashboardController extends Controller
{
    public function dashboard(AsetChart $asetChart)
    {
        $totalAset = Aset::count();
        $totalJenisBarang = Aset::select('jenis')->distinct()->count();
        $totalMerk = Aset::select('merk')->distinct()->count();
        // Kirim chart ke view
        $asetChart = new AsetChart();
        return view('admin.dashboard', ['asetChart' => $asetChart, 'totalAset' => $totalAset, 'totalJenisBarang' => $totalJenisBarang, 'totalMerk' => $totalMerk]);
    }
}
