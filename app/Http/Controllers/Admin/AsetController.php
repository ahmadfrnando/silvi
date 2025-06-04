<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\JenisBarang;
use App\Models\KategoriAset;
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
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.aset.edit', $row->id); // pastikan route butuh parameter id
                    $deleteUrl = route('admin.aset.destroy', $row->id); // pastikan route butuh parameter id
                    return '
                    <div class="flex space-x-4">
                        <a href="' . $editUrl . '" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                    ';
                })
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->kategori ?? '';
                })
                // ->addColumn('keterangan', function ($row) {
                //     return '<span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . $row->keterangan . '</span>';
                // })
                ->addColumn('jenis', function ($row) {
                    return $row->jenis->nama_jenis ?? '';
                })
                ->addColumn('merk', function ($row) {
                    return $row->merk->nama_merk ?? '-';
                })
                ->rawColumns(['action', 'kategori', 'jenis', 'merk'])
                ->make(true);
        }
        return view('admin.aset.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriAset::all();
        return view('admin.aset.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'nama_aset' => 'required|string|max:255',
                'id_jenis' => 'required|integer|exists:jenis_barang,id',
                'id_merk' => 'nullable|integer|exists:merk,id',
                'jumlah' => 'required|integer',
                'keterangan' => 'nullable|string',
                'id_kategori' => 'required|integer|exists:ref_kategori_aset,id',
                'tanggal' => 'required|date',
                'is_tidak_ada_merk' => 'nullable|boolean',
            ]);

            if ($request->boolean('is_tidak_ada_merk')) {
                $request->merge(['id_merk' => null]);
            }

            $input = $request->only([
                'nama_aset',
                'id_jenis',
                'id_merk',
                'jumlah',
                'keterangan',
                'id_kategori',
                'tanggal',
            ]);


            Aset::create($input);

            return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil ditambahkan!');
        } catch (\Throwable $th) {
            // var_dump($th);exit;
            return redirect()->back()->with('error', 'Gagal menambahkan data aset. Mohon coba lagi.' . $th->getMessage())->withInput();
        }
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
        return view('admin.aset.show', compact('aset'));
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
        $kategori = KategoriAset::all();

        return view('admin.aset.edit', compact('aset', 'kategori'));
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
        try {
            $request->validate([
                'nama_aset' => 'required|string|max:255',
                'id_jenis' => 'required|integer|exists:jenis_barang,id',
                'id_merk' => 'nullable|integer|exists:merk,id',
                'jumlah' => 'required|integer',
                'keterangan' => 'nullable|string',
                'id_kategori' => 'required|integer|exists:ref_kategori_aset,id',
                'tanggal' => 'required|date',
                'is_tidak_ada_merk' => 'nullable|boolean',
            ]);

            if ($request->boolean('is_tidak_ada_merk')) {
                $request->merge(['id_merk' => null]);
            }

            $input = $request->only([
                'nama_aset',
                'id_jenis',
                'id_merk',
                'jumlah',
                'keterangan',
                'id_kategori',
                'tanggal',
            ]);

            $asset = Aset::findOrFail($id);
            $asset->update($input);

            return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->validator->errors()->first())->withInput();
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal memperbarui data aset. Mohon coba lagi.');
        }
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

        return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
