<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($berita) {
            if ($berita->media && file_exists(storage_path('app/public/media/' . $berita->media))) {
                unlink(storage_path('app/public/media/' . $berita->media));
            }
        });
    }
}
