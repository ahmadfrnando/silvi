<?php

namespace App\Http\Controllers;

use App\Models\StatistikPenduduk;
use Illuminate\Http\Request;

class StatistikPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = StatistikPenduduk::first();
        if ($query) {
            $statistikPenduduk = $query;
        } else {
            $statistikPenduduk = null;
        }
        return view('statistik-penduduk.index', compact('statistikPenduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistik-penduduk.create');
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
            'nama_desa' => ['required', 'string', 'max:255'],
            'jumlah_penduduk' => ['required', 'integer'],
            'jumlah_laki_laki' => ['required', 'integer'],
            'jumlah_perempuan' => ['required', 'integer'],
            'kordinat' => ['required', 'string'],
        ]);

        StatistikPenduduk::create($request->all());

        return redirect()->route('statistik-penduduk.index')->with('success', 'Statistik Penduduk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statistikPenduduk = StatistikPenduduk::findOrFail($id);
        return view('statistik-penduduk.edit', compact('statistikPenduduk'));
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
            $validatedData = $request->validate([
                'nama_desa' => 'required|string|max:255',
                'jumlah_penduduk' => 'required|integer|min:0',
                'jumlah_laki_laki' => 'required|integer|min:0',
                'jumlah_perempuan' => 'required|integer|min:0',
                'kordinat' => 'required|string',
            ]);

            $statistikPenduduk = StatistikPenduduk::findOrFail($id);
            $statistikPenduduk->update($validatedData);

            return redirect()->route('statistik-penduduk.index')->with('success', 'Statistik Penduduk berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
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
        //
    }
}
