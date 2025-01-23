<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JenisBarang;
use App\Models\Merk;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aset>
 */
class AsetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_aset' => $this->faker->word, // Nama aset acak
            'jenis' => JenisBarang::inRandomOrder()->first()->nama_jenis, // Jenis diambil dari tabel JenisBarang
            'merk' => Merk::inRandomOrder()->first()->nama_merk, // Merk diambil dari tabel Merk
            'jumlah' => $this->faker->numberBetween(1, 100), // Jumlah acak antara 1-100
            'keterangan' => $this->faker->sentence, // Keterangan acak
        ];
    }
}
