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
        Schema::dropIfExists('statistik_penduduk');

        Schema::create('statistik_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_laki_laki');
            $table->integer('jumlah_perempuan');
            $table->text('kordinat');
            $table->timestamps();
        });

        DB::table('statistik_penduduk')->insert([
            'id' => 1,
            'nama_desa' => 'Desa Perkebunan Tambunan',
            'jumlah_penduduk' => 0,
            'jumlah_laki_laki' => 0,
            'jumlah_perempuan' => 0,
            'kordinat' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31861.649145201867!2d98.31502599999999!3d3.4215815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030dd299b2e0669%3A0x51b0ab509a4a4b0b!2sPerkebunan%20Tambunan%2C%20Kec.%20Salapian%2C%20Kabupaten%20Langkat%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1745594622477!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::unprepared('
            CREATE TRIGGER after_statistik_perdusun_update
            AFTER UPDATE ON statistik_perdusun
            FOR EACH ROW
            BEGIN
                UPDATE statistik_penduduk
                SET jumlah_penduduk = (
                    SELECT SUM(total)
                    FROM statistik_perdusun
                ),
                jumlah_laki_laki = (
                    SELECT SUM(pria)
                    FROM statistik_perdusun
                ),
                jumlah_perempuan = (
                    SELECT SUM(wanita)
                    FROM statistik_perdusun
                )
                WHERE id = 1;
            END
        ');
    }

    /**
     * Rollback migration.
     *
     * @return void
     */
    public function down()
    {
        // Drop Trigger
        DB::unprepared('DROP TRIGGER IF EXISTS after_statistik_perdusun_update');
    }
};
