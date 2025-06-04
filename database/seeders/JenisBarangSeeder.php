<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_jenis' => 'Tanah', 'keterangan' => 'Aset berupa tanah milik desa'],
            ['nama_jenis' => 'Bangunan', 'keterangan' => 'Bangunan milik desa seperti kantor, posyandu, dll'],
            ['nama_jenis' => 'Kendaraan', 'keterangan' => 'Kendaraan roda dua, empat milik desa'],
            ['nama_jenis' => 'Peralatan dan Mesin', 'keterangan' => 'Seperti traktor, mesin potong rumput, dll'],
            ['nama_jenis' => 'Jaringan', 'keterangan' => 'Jaringan listrik, air, dan lainnya'],
            ['nama_jenis' => 'Irigasi', 'keterangan' => 'Saluran dan fasilitas irigasi desa'],
            ['nama_jenis' => 'Perabot', 'keterangan' => 'Meja, kursi, lemari, dan perabot lainnya'],
            ['nama_jenis' => 'Komputer & Elektronik', 'keterangan' => 'Laptop, printer, proyektor, dll'],
            ['nama_jenis' => 'Dokumen & Arsip', 'keterangan' => 'Dokumen penting dan arsip desa'],
            ['nama_jenis' => 'Aset Tak Berwujud', 'keterangan' => 'Seperti hak paten, software, lisensi'],
        ];

        foreach ($data as $item) {
            DB::table('jenis_barang')->insert([
                'nama_jenis' => $item['nama_jenis'],
                'keterangan' => $item['keterangan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
