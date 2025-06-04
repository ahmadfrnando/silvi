<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisBarang::select('*')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.jenis-barang.edit', $row->id); // pastikan route butuh parameter id
                    $deleteUrl = route('admin.jenis-barang.destroy', $row->id); // pastikan route butuh parameter id
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
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.jenis.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_jenis' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            JenisBarang::create($request->all());

            return redirect()->route('admin.jenis-barang.index')->with('success', 'Jenis Barang berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
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
        $jenisBarang = JenisBarang::findOrFail($id);
        return view('admin.jenis.show', compact('jenisBarang'));
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
        return view('admin.jenis.edit', compact('jenisBarang'));
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
                'nama_jenis' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            $jenisBarang = JenisBarang::findOrFail($id);
            $jenisBarang->update($request->all());

            return redirect()->route('admin.jenis-barang.index')->with('success', 'Jenis Barang berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
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
        $jenisBarang = JenisBarang::findOrFail($id);
        $jenisBarang->delete();

        return redirect()->route('admin.jenis-barang.index')->with('success', 'Jenis Barang berhasil dihapus!');
    }
}
