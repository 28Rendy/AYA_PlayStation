<?php

use Illuminate\Database\Seeder;
use App\Models\Ps;

class PsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ps::create([
            'nama_ps' => 'PlayStation 4 Slim',
            'stok' => 5,
            'status_ps' => 'Tersedia',
            'harga_per_hari' => 50000,
        ]);

        Ps::create([
            'nama_ps' => 'PlayStation 4 Pro',
            'stok' => 3,
            'status_ps' => 'Tersedia',
            'harga_per_hari' => 70000,
        ]);

        Ps::create([
            'nama_ps' => 'PlayStation 5',
            'stok' => 2,
            'status_ps' => 'Tersedia',
            'harga_per_hari' => 120000,
        ]);

        $this->command->info("Data PS berhasil diinsert.");
    }
}
