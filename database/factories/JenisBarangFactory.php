<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisBarang>
 */
class JenisBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_jenis' => $this->faker->randomElement(['Elektronik', 'Infrastruktur', 'Bangunan', 'Kendaraan', 'Tanah', 'Gedung', 'Mesin', 'Peralatan', 'Bahan']),
        ];
    }
}
