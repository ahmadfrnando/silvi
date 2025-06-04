<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    // public function index()
    // {
    //     $assets = \App\Models\Aset::paginate(10);
    //     return view('super-admin.laporan.index', compact('assets'));
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Laporan::orderBy('id', 'asc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('laporan', function ($row) {
                    $url = asset("storage/laporan-pdf/" . $row->file_laporan_pdf);
                    return '
                    <a href="' . $url . '" target="_blank">
                        <button type="button" class="btn btn-outline-danger btn-sm" style="white-space: nowrap">
                           <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                        </button>
                    </a>
                    ';
                })
                ->addColumn('tanggal', function ($row) {
                    $tanggal_mulai = date('d-m-Y', strtotime($row->tanggal_mulai));
                    $tanggal_selesai = date('d-m-Y', strtotime($row->tanggal_selesai));
                    return $tanggal_mulai . ' s/d ' . $tanggal_selesai;
                })
                ->addColumn('created_at', function ($row) {
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    $deleteUrl = route('super-admin.laporan.destroy', $row->id); // pastikan route butuh parameter id
                    return '
                    <div class="flex space-x-4">
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm" style="white-space: nowrap" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="bi bi-trash-fill"></i> Hapus Laporan</button>
                        </form>
                    </div>
                    ';
                })
                ->rawColumns(['tanggal', 'laporan', 'created_at', 'action'])
                ->make(true);
        }
        return view('super-admin.laporan.index');
    }

    public function create()
    {
        return view('super-admin.laporan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_laporan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan' => 'nullable|string',
        ]);

        try {
            $file = $this->exportPdf($request->input('nama_laporan'), $request->input('tanggal_mulai'), $request->input('tanggal_selesai'));
            if ($file['status'] == 'success') {
                $file = $file['file'];
                Laporan::create([
                    'nama_laporan' => $request->input('nama_laporan'),
                    'tanggal_mulai' => $request->input('tanggal_mulai'),
                    'tanggal_selesai' => $request->input('tanggal_selesai'),
                    'keterangan' => $request->input('keterangan'),
                    'file_laporan_pdf' => $file
                ]);
                return redirect()->route('super-admin.laporan.index')->with('success', 'Laporan berhasil digenerate!');
            } else {
                return redirect()->back()->with('error', 'Gagal membuat laporan.' . $file['status'])->withInput();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan data aset. Mohon coba lagi.' . $th->getMessage())->withInput();
        }
    }

    private function exportPdf($nama_laporan, $tanggal_mulai, $tanggal_selesai)
    {
        // $assets = \App\Models\Aset::where('tanggal', '>=', $tanggal_mulai)->where('tanggal', '<=', $tanggal_selesai)->get();
        // dd($assets);
        // $assets = Aset::with(['kategori', 'jenis', 'merk'])->where('tanggal', '>=', $tanggal_mulai)->where('tanggal', '<=', $tanggal_selesai)->get();
        // $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('super-admin.laporan.pdf', compact('assets', 'tanggal_mulai', 'tanggal_selesai'));
        // $filename = $nama_laporan . '-' . uniqid() . '.pdf';

        // Storage::put('public/laporan-pdf/' . $filename, $pdf->output());
        // $pdf->download($filename);
        // $pesan = [];
        // $pesan = [
        //     'file' => $filename,
        //     'status' => 'success'
        // ]

        // return $filename;
        $pesan = [];
        try {
            $assets = Aset::where('tanggal', '>=', $tanggal_mulai)->where('tanggal', '<=', $tanggal_selesai)->get();
            foreach ($assets as $aset) {
                $aset->nama_aset = ucwords($aset->nama_aset);
                $aset->kategori = ucwords($aset->kategori->kategori ?? '-');
                $aset->jenis = ucwords($aset->jenis->nama_jenis ?? '-');
                $aset->merk = ucwords($aset->merk->nama_merk ?? '-');
                $aset->keterangan = ucwords($aset->keterangan);
                $aset->tanggal = date('d-m-Y', strtotime($aset->tanggal));
                $aset->created_at = date('d-m-Y', strtotime($aset->created_at));
            }
            $tanggal_mulai = date('d-m-Y', strtotime($tanggal_mulai));
            $tanggal_selesai = date('d-m-Y', strtotime($tanggal_selesai));
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('super-admin.laporan.pdf', compact('assets', 'tanggal_mulai', 'tanggal_selesai', 'nama_laporan'));
            $filename = $nama_laporan . '-' . uniqid() . '.pdf';
            Storage::put('public/laporan-pdf/' . $filename, $pdf->output());
            $pesan = [
                'file' => $filename,
                'status' => 'success'
            ];
            return $pesan;
        } catch (\Exception $e) {
            // Tangani error, misalnya log error atau tampilkan pesan
            $pesan = [
                'file' => '',
                'status' => 'error' . $e
            ];
            return $pesan;
        }
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('super-admin.laporan.index')->with('success', 'Laporan Data aset berhasil dihapus!');
    }
}
