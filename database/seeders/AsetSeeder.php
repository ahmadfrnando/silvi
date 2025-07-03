<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisMap = DB::table('jenis_barang')->pluck('id', 'nama_jenis')->toArray();
        $merkMap = DB::table('merk')->pluck('id', 'nama_merk')->toArray();

        $aset_desa = [
            ['nama_aset' => 'Laptop', 'jumlah' => 5, 'keterangan' => 'Digunakan untuk administrasi desa', 'id_kategori' => 2, 'id_merk' => 22, 'id_jenis' => 21],
            ['nama_aset' => 'Printer', 'jumlah' => 2, 'keterangan' => 'Printer untuk mencetak dokumen warga', 'id_kategori' => 2, 'id_merk' => 24, 'id_jenis' => 21],
            ['nama_aset' => 'Proyektor', 'jumlah' => 1, 'keterangan' => 'Untuk kegiatan penyuluhan masyarakat', 'id_kategori' => 2, 'id_merk' => 24, 'id_jenis' => 21],
            ['nama_aset' => 'Sound System', 'jumlah' => 3, 'keterangan' => 'Digunakan saat rapat warga', 'id_kategori' => 2, 'id_merk' => null, 'id_jenis' => 17],
            ['nama_aset' => 'Meja Kantor', 'jumlah' => 10, 'keterangan' => 'Untuk keperluan pegawai kantor desa', 'id_kategori' => 1, 'id_merk' => null, 'id_jenis' => 15],
            ['nama_aset' => 'Kursi Kantor', 'jumlah' => 15, 'keterangan' => 'Ditempatkan di ruang kerja desa', 'id_kategori' => 1, 'id_merk' => null, 'id_jenis' => 15],
            ['nama_aset' => 'Lemari Arsip', 'jumlah' => 4, 'keterangan' => 'Untuk menyimpan dokumen penting', 'id_kategori' => 1, 'id_merk' => null, 'id_jenis' => 15],
            ['nama_aset' => 'AC', 'jumlah' => 2, 'keterangan' => 'Dipakai di ruang kepala desa', 'id_kategori' => 1, 'id_merk' => null, 'id_jenis' => 17],
            ['nama_aset' => 'Motor Dinas', 'jumlah' => 2, 'keterangan' => 'Untuk operasional lapangan', 'id_kategori' => 2, 'id_merk' => 18, 'id_jenis' => 16],
            ['nama_aset' => 'Genset', 'jumlah' => 1, 'keterangan' => 'Cadangan listrik saat mati lampu', 'id_kategori' => 4, 'id_merk' => 26, 'id_jenis' => 17],
            ['nama_aset' => 'TV LED', 'jumlah' => 1, 'keterangan' => 'Digunakan saat sosialisasi digital', 'id_kategori' => 2, 'id_merk' => 23, 'id_jenis' => 21],
            ['nama_aset' => 'Alat Fogging', 'jumlah' => 1, 'keterangan' => 'Untuk pemberantasan nyamuk', 'id_kategori' => 4, 'id_merk' => null, 'id_jenis' => 17],
            ['nama_aset' => 'Pompa Air', 'jumlah' => 1, 'keterangan' => 'Untuk pengairan taman desa', 'id_kategori' => 4, 'id_merk' => null, 'id_jenis' => 17],
            ['nama_aset' => 'Tenda Lipat', 'jumlah' => 5, 'keterangan' => 'Dipakai saat kegiatan desa', 'id_kategori' => 2, 'id_merk' => null, 'id_jenis' => 17],
            ['nama_aset' => 'Tong Sampah', 'jumlah' => 30, 'keterangan' => 'Untuk kebersihan lingkungan desa', 'id_kategori' => 1, 'id_merk' => null, 'id_jenis' => 15],
            ['nama_aset' => 'Sepeda Dinas', 'jumlah' => 2, 'keterangan' => 'Dinas lapangan dan pemeriksaan', 'id_kategori' => 2, 'id_merk' => 19, 'id_jenis' => 16],
            ['nama_aset' => 'Pohon Pelindung', 'jumlah' => 100, 'keterangan' => 'Pohon untuk penghijauan', 'id_kategori' => 3, 'id_merk' => null, 'id_jenis' => 14],
            ['nama_aset' => 'Perahu', 'jumlah' => 1, 'keterangan' => 'Untuk transportasi warga di sungai desa', 'id_kategori' => 2, 'id_merk' => null, 'id_jenis' => 16],
            ['nama_aset' => 'Alat Musik Tradisional', 'jumlah' => 3, 'keterangan' => 'Untuk acara budaya desa', 'id_kategori' => 3, 'id_merk' => null, 'id_jenis' => 23],
        ];

        foreach ($aset_desa as $aset) {
            // Menghasilkan tanggal acak antara 2024 dan 2025
            $randomDate = Carbon::createFromFormat('Y-m-d', rand(2024, 2025) . '-' . rand(1, 12) . '-' . rand(1, 28));

            DB::table('aset')->insert([
                'nama_aset' => $aset['nama_aset'],
                'jumlah' => $aset['jumlah'],
                'keterangan' => $aset['keterangan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'tanggal' => $randomDate->format('Y-m-d'),
                'id_kategori' => $aset['id_kategori'],
                'id_merk' => $aset['id_merk'],
                'id_jenis' => $aset['id_jenis'],
                'sumber_aset' => 'APBD Desa',
            ]);
        }
    }
}
