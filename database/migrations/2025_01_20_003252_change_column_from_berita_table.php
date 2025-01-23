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
        Schema::table('berita', function (Blueprint $table) {
            if (Schema::hasColumn('berita', 'gambar')) {
                $table->renameColumn('gambar', 'media');
            }
            $table->date('tanggal')->after('isi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            if (Schema::hasColumn('berita', 'media')) {
                $table->renameColumn('media', 'gambar');
            }
            $table->dropColumn('tanggal');
        });
    }
};
