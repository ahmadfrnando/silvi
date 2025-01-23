<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistik_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_laki_laki');
            $table->integer('jumlah_perempuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistik_penduduks');
    }
};
