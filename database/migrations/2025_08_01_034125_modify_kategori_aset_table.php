<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::dropIfExists('ref_kategori_aset');


        Schema::create('ref_kategori_aset', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
        });

        DB::table('ref_kategori_aset')->insert([
            ['id' => 1, 'kategori' => 'Aset Tetap'],
            ['id' => 2, 'kategori' => 'Aset Bergerak'],
            ['id' => 3, 'kategori' => 'Aset Lainnya'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ref_kategori_aset');
    }
};
