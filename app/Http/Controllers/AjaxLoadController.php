<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\Merk;
use Illuminate\Http\Request;

class AjaxLoadController extends Controller
{
    public function listMerk(Request $request)
    {
        $merk = Merk::where('nama_merk', 'like', '%' . $request->q . '%')->get();
        return response()->json($merk, 200);
    }
    public function listJenis(Request $request)
    {
        $jenis = JenisBarang::where('nama_jenis', 'like', '%' . $request->q . '%')->get();
        return response()->json($jenis, 200);
    }
}
