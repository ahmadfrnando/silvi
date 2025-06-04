<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $query = Berita::query();
    //     if ($request->filled('tanggal')) {
    //         $query->whereDate('tanggal', $request->tanggal);
    //     }
    //     if ($request->filled('search')) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('judul', 'like', '%' . $request->search . '%')
    //                 ->orWhere('isi', 'like', '%' . $request->search . '%');
    //         });
    //     }

    //     $berita = $query->paginate(10);

    //     return view('berita.index', compact('berita'));
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Berita::select('*')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.berita.edit', $row->id); // pastikan route butuh parameter id
                    $showUrl = route('admin.berita.show', $row->id); // pastikan route butuh parameter id
                    $deleteUrl = route('admin.berita.destroy', $row->id); // pastikan route butuh parameter id
                    return '
                    <div class="flex space-x-4">
                        <a href="' . $showUrl . '" class="btn btn-outline-primary pointer btn-sm"><i class="bi bi-eye-fill"></i></a>
                        <a href="' . $editUrl . '" class="btn btn-outline-warning pointer btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-danger pointer btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                    ';
                })
                ->addColumn('media', function ($row) {
                    return '<img src="' . asset('storage/media/' . $row->media) . '" alt="' . $row->judul . '" width="100" height="100">';
                })
                ->rawColumns(['action', 'media', 'isi'])
                ->make(true);
        }
        return view('admin.berita.index');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
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
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'tanggal' => 'required|date',
                'media' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('media')) {
                $file = $request->file('media');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('media', $filename, 'public');

                $validatedData['media'] = $filename;
            }

            Berita::create($validatedData);

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan berita: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambah data.')->withInput();
        }
    }

    // $request->validate([
    //     'judul' => 'required|string|max:255',
    //     'isi' => 'required|string|max:255',
    //     'tanggal' => 'required|date',
    // ]);

    // if($request->hasFile('media')) {
    //     $request->validate([
    //         'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $file = $request->file('media');
    //     $filename = time() . '.' . $file->getClientOriginalExtension();
    //     $dir = public_path('media');
    //     if(!File::exists($dir)) {
    //         File::makeDirectory($dir, 0777, true, true);
    //     }
    //     $file->move($dir, $filename);
    //     $request->merge(['media' => $filename]);
    // }

    // Berita::create($request->all());

    // return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
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
                'judul' => 'required|string|max:255',
                'isi' => 'required|string|max:255',
                'tanggal' => 'required|date',
            ]);

            if ($request->hasFile('media')) {
                $request->validate([
                    'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $file = $request->file('media');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $dir = public_path('media');
                if (!File::exists($dir)) {
                    File::makeDirectory($dir, 0777, true, true);
                }
                $file->move($dir, $filename);
                $request->merge(['media' => $filename]);
            }

            $berita = Berita::findOrFail($id);
            $berita->update($request->all());

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.')->withInput();
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
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
