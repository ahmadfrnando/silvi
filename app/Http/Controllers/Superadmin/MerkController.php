<?php

namespace App\Http\Controllers\Superadmin;

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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Merk::select('*')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }
        return view('super-admin.merk.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('merk.create');
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
        //     'nama_merk' => 'required|string|max:255',
        // ]);

        // Merk::create($request->all());

        // return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $merk = Merk::findOrFail($id);
        // return view('merk.show', compact('merk'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $merk = Merk::findOrFail($id);
        // return view('merk.edit', compact('merk'));
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
        //     'nama_merk' => 'required|string|max:255',
        // ]);

        // $merk = Merk::findOrFail($id);
        // $merk->update($request->all());

        // return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $merk = Merk::findOrFail($id);
        // $merk->delete();

        // return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus!');
    }
}
