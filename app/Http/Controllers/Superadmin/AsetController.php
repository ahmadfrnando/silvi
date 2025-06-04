<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\JenisBarang;
use App\Models\Merk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Aset::select('*')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('jenis', function ($row) {
                    return $row->jenis->nama_jenis ?? '-';
                })
                ->addColumn('merk', function ($row) {
                    return $row->merk->nama_merk ?? '-';
                })
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->kategori ?? '-';
                })
                ->rawColumns(['jenis', 'merk', 'kategori'])
                ->make(true);
        }
        return view('super-admin.aset.index');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jenisBarang = JenisBarang::all();
        // $merks = Merk::all();
        // return view('aset.create', compact('jenisBarang', 'merks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_aset' => 'required|string|max:255',
        //     'jenis' => 'required|string|max:255',
        //     'merk' => 'required|string|max:255',
        //     'jumlah' => 'required|integer',
        //     'keterangan' => 'nullable|string',
        // ]);

        // Aset::create($request->all());

        // return redirect()->route('aset.index')->with('success', 'Data aset berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $aset = Aset::findOrFail($id);
        // return view('super-admin.aset.show', compact('aset'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $aset = Aset::findOrFail($id);
        // return view('aset.edit', compact('aset'));
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
        // $request->validate([
        //     'nama_aset' => 'required|string|max:255',
        //     'jenis' => 'required|string|max:255',
        //     'merk' => 'required|string|max:255',
        //     'jumlah' => 'required|integer',
        //     'keterangan' => 'nullable|string',
        // ]);

        // $asset = Aset::findOrFail($id);
        // $asset->update($request->all());

        // return redirect()->route('aset.index')->with('success', 'Data aset berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $asset = Aset::findOrFail($id);
        // $asset->delete();

        // return redirect()->route('aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
