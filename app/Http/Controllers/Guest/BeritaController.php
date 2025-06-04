<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function show($id)
    {   
        $berita = Berita::findOrFail($id);
        $beritas = Berita::latest()->take(3)->get();
        return view('guest.detail-berita', compact('berita','beritas'));
    }
}
