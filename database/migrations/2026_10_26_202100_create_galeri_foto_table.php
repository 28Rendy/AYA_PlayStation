<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGaleriFotoTable extends Migration
{
    public function up()
    {
        Schema::create('galeri_foto', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('Foto Galeri');
            $table->string('keterangan')->nullable(); // caption bawah gambar
            $table->string('foto')->nullable();       // path file upload
            $table->string('alt_foto')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // Seed data awal
        $items = [
            [
                'judul' => 'Ruang VIP Gaming Lounge',
                'keterangan' => 'TV 4K 65" & Sofa Recliner',
                'foto' => null,
                'alt_foto' => 'VIP Gaming Lounge',
                'urutan' => 1,
                'aktif' => 1,
            ],
            [
                'judul' => 'Chill Snack & Drink Bar',
                'keterangan' => 'Aneka Camilan & Kopi Dingin',
                'foto' => null,
                'alt_foto' => 'Snack & Coffee Bar',
                'urutan' => 2,
                'aktif' => 1,
            ],
            [
                'judul' => 'Turnamen Komunitas Gaming',
                'keterangan' => 'Kompetisi eFootball & Tekken',
                'foto' => null,
                'alt_foto' => 'Turnamen Esports',
                'urutan' => 3,
                'aktif' => 1,
            ],
            [
                'judul' => 'Paket Sewa Unit Rumahan',
                'keterangan' => 'Hardcase & 2 Stik Wireless',
                'foto' => null,
                'alt_foto' => 'Paket Rental Rumahan',
                'urutan' => 4,
                'aktif' => 1,
            ],
            [
                'judul' => 'Ruang Mabar Reguler AC',
                'keterangan' => 'Sejuk, Bersih, dan Tenang',
                'foto' => null,
                'alt_foto' => 'Ruang Reguler AC',
                'urutan' => 5,
                'aktif' => 1,
            ],
            [
                'judul' => 'Perangkat Konsol Original',
                'keterangan' => 'Responsif dan Terawat Prima',
                'foto' => null,
                'alt_foto' => 'Konsol & DualShock',
                'urutan' => 6,
                'aktif' => 1,
            ],
        ];

        foreach ($items as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('galeri_foto')->insert($item);
        }
    }

    public function down()
    {
        Schema::dropIfExists('galeri_foto');
    }
}
