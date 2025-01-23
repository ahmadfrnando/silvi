<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $assets = \App\Models\Aset::paginate(10);
        return view('laporan.index', compact('assets'));
    }

    public function exportPdf()
    {
        $assets = \App\Models\Aset::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('laporan.pdf', compact('assets'));
        return $pdf->download('laporan-aset.pdf');
    }

    public function exportExcel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\AsetExport, 'laporan-aset.xlsx');
    }
}
