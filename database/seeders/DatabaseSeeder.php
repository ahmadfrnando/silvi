<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aset;
use App\Models\JenisBarang;
use App\Models\Merk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@example.com',
        //     'role' => 'admin',
        //     'password' => bcrypt('123'),
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'superadmin',
        //     'username' => 'superadmin',
        //     'email' => 'superadmin@example.com',
        //     'role' => 'super admin',
        //     'password' => bcrypt('123'),
        // ]);
        $this->call([
            // JenisBarangSeeder::class,
            // MerkSeeder::class,
            // AsetSeeder::class
        ]);
    }
}
