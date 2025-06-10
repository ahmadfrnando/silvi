<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\StatistikPenduduk;
use App\Models\StatistikPerdusun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $dusun = StatistikPerdusun::orderBy('nomor_dusun', 'asc')
            ->whereIn('nomor_dusun', [1, 2, 3, 4])
            ->get();
        return view('admin.statistik-penduduk.index', compact('statistikPenduduk', 'dusun'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik-penduduk.create');
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
                'nama_desa' => ['required', 'string', 'max:255'],
                'jumlah_penduduk' => ['required', 'integer'],
                'jumlah_laki_laki' => ['required', 'integer'],
                'jumlah_perempuan' => ['required', 'integer'],
                // 'kordinat' => ['required', 'string'],
            ]);
            StatistikPenduduk::create($request->all());
    
            return redirect()->route('admin.statistik-penduduk.index')->with('success', 'Statistik Penduduk berhasil ditambahkan!');
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
        $dusun = StatistikPerdusun::orderBy('nomor_dusun', 'asc')
            ->whereIn('nomor_dusun', [1, 2, 3, 4])
            ->get();
        $statistikDusun = [
            'nama_dusun_1' => $dusun[0]->nama_dusun,
            'nama_dusun_2' => $dusun[1]->nama_dusun,
            'nama_dusun_3' => $dusun[2]->nama_dusun,
            'nama_dusun_4' => $dusun[3]->nama_dusun,
            'dusun_1_pria' => $dusun[0]->pria,
            'dusun_1_wanita' => $dusun[0]->wanita,
            'dusun_2_pria' => $dusun[1]->pria,
            'dusun_2_wanita' => $dusun[1]->wanita,
            'dusun_3_pria' => $dusun[2]->pria,
            'dusun_3_wanita' => $dusun[2]->wanita,
            'dusun_4_pria' => $dusun[3]->pria,
            'dusun_4_wanita' => $dusun[3]->wanita,
        ];
        return view('admin.statistik-penduduk.edit', compact('statistikPenduduk', 'statistikDusun'));
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
                'nama_dusun_1' => 'required|string|max:255',
                'nama_dusun_2' => 'required|string|max:255',
                'nama_dusun_3' => 'required|string|max:255',
                'nama_dusun_4' => 'required|string|max:255',
                'dusun_1_pria' => 'required|integer',
                'dusun_1_wanita' => 'required|integer',
                'dusun_2_pria' => 'required|integer',
                'dusun_2_wanita' => 'required|integer',
                'dusun_3_pria' => 'required|integer',
                'dusun_3_wanita' => 'required|integer',
                'dusun_4_pria' => 'required|integer',
                'dusun_4_wanita' => 'required|integer',
                // 'kordinat' => 'required|string',
            ]);

            $statistikPenduduk = StatistikPenduduk::findOrFail($id);
            $statistikPenduduk->update([
                'nama_desa' => $validatedData['nama_desa']
            ]);
            for ($i = 1; $i <= 4; $i++) {
                $dusun = StatistikPerdusun::where('nomor_dusun', $i)->first();
                $dusun->update([
                    'nama_dusun' => $validatedData['nama_dusun_' . $i],
                    'total' => $validatedData['dusun_' . $i . '_pria'] + $validatedData['dusun_' . $i . '_wanita'],
                    'pria' => $validatedData['dusun_' . $i . '_pria'],
                    'wanita' => $validatedData['dusun_' . $i . '_wanita'],
                ]);
            }

            return redirect()->route('admin.statistik-penduduk.index')->with('success', 'Statistik Penduduk berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.'. $e->getMessage())->withInput();
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
