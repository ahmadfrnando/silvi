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
        $data = [
            [
                'nama_aset' => 'Motor Dinas RW',
                'jenis' => 'Kendaraan',
                'merk' => 'Honda',
                'jumlah' => 2,
                'keterangan' => 'Digunakan untuk operasional kepala RW',
                'tanggal' => '2023-03-15',
                'id_kategori' => 2
            ],
            [
                'nama_aset' => 'Tanah Lapangan Desa',
                'jenis' => 'Tanah',
                'merk' => '-',
                'jumlah' => 1,
                'keterangan' => 'Lapangan serbaguna milik desa',
                'tanggal' => '2010-05-10',
                'id_kategori' => 1
            ],
            [
                'nama_aset' => 'Laptop Sekretariat',
                'jenis' => 'Komputer & Elektronik',
                'merk' => 'Asus',
                'jumlah' => 1,
                'keterangan' => 'Laptop digunakan untuk pengetikan surat menyurat',
                'tanggal' => '2021-08-20',
                'id_kategori' => 2
            ],
            [
                'nama_aset' => 'Printer Kantor Desa',
                'jenis' => 'Komputer & Elektronik',
                'merk' => 'Epson',
                'jumlah' => 1,
                'keterangan' => 'Untuk mencetak dokumen administrasi',
                'tanggal' => '2022-01-10',
                'id_kategori' => 2
            ],
            [
                'nama_aset' => 'Traktor Mini Pertanian',
                'jenis' => 'Peralatan dan Mesin',
                'merk' => 'Kubota',
                'jumlah' => 1,
                'keterangan' => 'Digunakan untuk menunjang pertanian warga',
                'tanggal' => '2019-11-04',
                'id_kategori' => 2
            ],
            [
                'nama_aset' => 'Bangunan Posyandu',
                'jenis' => 'Bangunan',
                'merk' => '-',
                'jumlah' => 1,
                'keterangan' => 'Gedung posyandu Balita dan lansia',
                'tanggal' => '2015-07-01',
                'id_kategori' => 1
            ],
            [
                'nama_aset' => 'Software Administrasi',
                'jenis' => 'Aset Tak Berwujud',
                'merk' => '-',
                'jumlah' => 1,
                'keterangan' => 'Lisensi aplikasi keuangan desa',
                'tanggal' => '2020-12-12',
                'id_kategori' => 3
            ],
            [
                'nama_aset' => 'Mesin Pompa Irigasi',
                'jenis' => 'Irigasi',
                'merk' => 'Yanmar',
                'jumlah' => 1,
                'keterangan' => 'Untuk kebutuhan pengairan sawah',
                'tanggal' => '2018-09-10',
                'id_kategori' => 1
            ],
            [
                'nama_aset' => 'Meja dan Kursi Kantor',
                'jenis' => 'Perabot',
                'merk' => '-',
                'jumlah' => 10,
                'keterangan' => 'Meja kursi kayu untuk staf dan perangkat',
                'tanggal' => '2017-04-17',
                'id_kategori' => 1
            ],
            [
                'nama_aset' => 'Mobil Operasional Desa',
                'jenis' => 'Kendaraan',
                'merk' => 'Toyota',
                'jumlah' => 1,
                'keterangan' => 'Mobil untuk kegiatan operasional pemerintah desa',
                'tanggal' => '2023-02-01',
                'id_kategori' => 2
            ],
        ];

        foreach ($data as $item) {
            // Validasi id_jenis, jika tidak ditemukan, throw error agar tahu datanya salah
            if (!isset($jenisMap[$item['jenis']])) {
                throw new \Exception("Jenis '{$item['jenis']}' tidak ditemukan di tabel jenis.");
            }
            $id_jenis = $jenisMap[$item['jenis']];

            // Ambil id_merk jika ada dan merk bukan '-'
            $id_merk = null;
            if ($item['merk'] !== '-' && isset($merkMap[$item['merk']])) {
                $id_merk = $merkMap[$item['merk']];
            }

            DB::table('aset')->insert([
                'nama_aset' => $item['nama_aset'],
                'id_jenis' => $id_jenis,
                'id_merk' => $id_merk,
                'jumlah' => $item['jumlah'],
                'keterangan' => $item['keterangan'],
                'tanggal' => $item['tanggal'],
                'id_kategori' => $item['id_kategori'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
