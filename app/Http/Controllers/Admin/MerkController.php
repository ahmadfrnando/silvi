<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Merk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     // Ambil data merk dengan pencarian
    //     $query = Merk::query();

    //     if ($request->filled('search')) {
    //         $query->where('nama_merk', 'like', '%' . $request->search . '%');
    //     }

    //     $merks = $query->paginate(10);

    //     return view('merk.index', compact('merks'));
    // }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Merk::select('*')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.merk.edit', $row->id); // pastikan route butuh parameter id
                    $deleteUrl = route('admin.merk.destroy', $row->id); // pastikan route butuh parameter id
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
        return view('admin.merk.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merk.create');
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
                'nama_merk' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            Merk::create($request->all());
            return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil ditambahkan!');
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
        $merk = Merk::findOrFail($id);
        return view('admin.merk.show', compact('merk'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
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
                'nama_merk' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            $merk = Merk::findOrFail($id);
            $merk->update($request->all());

            return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil diperbarui!');
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
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil dihapus!');
    }
}
