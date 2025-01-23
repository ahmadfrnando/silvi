<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil data dengan pencarian
        $query = JenisBarang::query();

        if ($request->filled('search')) {
            $query->where('nama_jenis', 'like', '%' . $request->search . '%');
        }

        $jenisBarangs = $query->paginate(10);

        return view('jenis-barang.index', compact('jenisBarangs'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-barang.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        JenisBarang::create($request->all());

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('jenis-barang.show', compact('jenisBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('jenis-barang.edit', compact('jenisBarang'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->update($request->all());

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->delete();

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang berhasil dihapus!');
    }
}
