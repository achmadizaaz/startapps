<?php

namespace Database\Seeders;

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

       $this->call([
        PermissionsSeeder::class
       ]);

       \App\Models\Administrasi\Unit::create([
        'kode_unit' => "UMP",
        'nama_unit' => "UNIVERSITAS MERDEKA PASURUAN",
        'slug' => "ump-universitas-merdeka-pasuruan",
        'primary' => 1,
       ]);
       \App\Models\Administrasi\Unit::create([
        'kode_unit' => "FP",
        'nama_unit' => "FAKULTAS PERTANIAN",
        'slug' => "fp-fakultas-pertanian",
        'primary' => 0,
       ]);

    }
}
