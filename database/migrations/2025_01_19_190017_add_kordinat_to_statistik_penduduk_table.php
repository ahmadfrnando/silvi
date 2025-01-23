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
        Schema::table('statistik_penduduk', function (Blueprint $table) {
            $table->text('kordinat')->nullable()->after('jumlah_perempuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistik_penduduk', function (Blueprint $table) {
            $table->dropColumn('kordinat');
        });
    }
};
