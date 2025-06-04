<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis', 'id');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'id_kategori', 'id');
    }
}
