<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($laporan) {
            if ($laporan->file_laporan_pdf && file_exists(storage_path('app/public/laporan-pdf/' . $laporan->file_laporan_pdf))) {
                unlink(storage_path('app/public/laporan-pdf/' . $laporan->file_laporan_pdf));
            }
        });
    }

}
