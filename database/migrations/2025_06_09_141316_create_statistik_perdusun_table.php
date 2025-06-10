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
        Schema::create('statistik_perdusun', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_dusun')->nullable();
            $table->string('nama_dusun')->nullable();
            $table->integer('total')->default(0);
            $table->integer('pria')->default(0);
            $table->integer('wanita')->default(0);
            $table->timestamps();
        });

        DB::table('statistik_perdusun')->insert([
            ['id' => 1, 'nomor_dusun' => 1],
            ['id' => 2, 'nomor_dusun' => 2],
            ['id' => 3, 'nomor_dusun' => 3],
            ['id' => 4, 'nomor_dusun' => 4],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistik_perdusun');
    }
};
