<?php

namespace App\Exports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsetExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Aset::select('id', 'nama_aset', 'jenis', 'merk', 'jumlah', 'keterangan')->get();
    }

    /**
     * Return the headings for the exported file.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Aset',
            'Jenis',
            'Merk',
            'Jumlah',
            'Keterangan',
        ];
    }
}
