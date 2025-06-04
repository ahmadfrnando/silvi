<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_merk' => 'Honda', 'keterangan' => 'Merek kendaraan bermotor'],
            ['nama_merk' => 'Yamaha', 'keterangan' => 'Merek sepeda motor dan alat musik'],
            ['nama_merk' => 'Toyota', 'keterangan' => 'Merek kendaraan roda empat'],
            ['nama_merk' => 'Mitsubishi', 'keterangan' => 'Mobil niaga dan kendaraan proyek'],
            ['nama_merk' => 'Asus', 'keterangan' => 'Laptop dan perangkat elektronik'],
            ['nama_merk' => 'HP', 'keterangan' => 'Laptop, printer, dan komputer desktop'],
            ['nama_merk' => 'Canon', 'keterangan' => 'Printer dan kamera'],
            ['nama_merk' => 'Epson', 'keterangan' => 'Printer dan proyektor'],
            ['nama_merk' => 'Kubota', 'keterangan' => 'Alat dan mesin pertanian'],
            ['nama_merk' => 'Yanmar', 'keterangan' => 'Mesin diesel dan traktor'],
        ];

        foreach ($data as $item) {
            DB::table('merk')->insert([
                'nama_merk' => $item['nama_merk'],
                'keterangan' => $item['keterangan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
