<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\JenisBarang;
use App\Models\Merk;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Aset::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('merk')) {
            $query->where('merk', $request->merk);
        }

        if ($request->filled('search')) {
            $query->where('nama_aset', 'like', '%' . $request->search . '%');
        }

        $aset = $query->paginate(10);
        $jenisBarang = Aset::select('jenis')->distinct()->pluck('jenis');
        $merks = Aset::select('merk')->distinct()->pluck('merk');

        return view('aset.index', compact('aset', 'jenisBarang', 'merks'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisBarang = JenisBarang::all();
        $merks = Merk::all();
        return view('aset.create', compact('jenisBarang', 'merks'));
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
            'nama_aset' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')->with('success', 'Data aset berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aset = Aset::findOrFail($id);
        return view('aset.show', compact('aset'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        return view('aset.edit', compact('aset'));
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
            'nama_aset' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $asset = Aset::findOrFail($id);
        $asset->update($request->all());

        return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Aset::findOrFail($id);
        $asset->delete();

        return redirect()->route('aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
