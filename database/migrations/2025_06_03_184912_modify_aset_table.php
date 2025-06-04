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
        Schema::table('aset', function (Blueprint $table) {
            $table->dropColumn('merk');
            $table->dropColumn('jenis');
            $table->integer('id_merk')->nullable();
            $table->integer('id_jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aset', function (Blueprint $table) {
            $table->string('merk');
            $table->string('jenis');
            $table->dropColumn('id_merk');
            $table->dropColumn('id_jenis');
        });
    }
};
