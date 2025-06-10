<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPerdusun extends Model
{
    use HasFactory;

    protected $table = 'statistik_perdusun';

    protected $guarded = ['id'];
}
