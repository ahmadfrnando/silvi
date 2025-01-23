<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Berita::query();
        if($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
            });
        }

        $berita = $query->paginate(10);

        return view('berita.index', compact('berita'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'tanggal' => 'required|date',
            ]);
    
            if($request->hasFile('media')) {
                $request->validate([
                    'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            
                $file = $request->file('media');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $dir = public_path('media');
                if(!File::exists($dir)) {
                    File::makeDirectory($dir, 0777, true, true);
                }
                $file->move($dir, $filename);
            
                // Tambahkan media ke $validatedData
                $validatedData['media'] = $filename;
            }

            dd($validatedData);
            Berita::create($validatedData);

            return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambah data.');
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
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
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
        return view('berita.edit', compact('berita'));
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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        if($request->hasFile('media')) {
            $request->validate([
                'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('media');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $dir = public_path('media');
            if(!File::exists($dir)) {
                File::makeDirectory($dir, 0777, true, true);
            }
            $file->move($dir, $filename);
            $request->merge(['media' => $filename]);
        }

        $berita = Berita::findOrFail($id);
        $berita->update($request->all());

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
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

        return redirect()->route('berita.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
