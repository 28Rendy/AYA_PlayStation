<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePengaturanWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan_web', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rental')->default('AYA PlayStation');
            $table->string('tagline')->default('Modern Gaming Lounge & Rental Console');
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->string('hero_title')->default('Nikmati Sensasi Bermain Di AYA PlayStation');
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('telepon')->default('+62 812-3456-7890');
            $table->string('whatsapp')->default('081234567890');
            $table->string('email')->default('kontak@ayaplaystation.com');
            $table->string('alamat')->default('Jl. Utama Entertainment No. 88, Pusat Gaming');
            $table->string('jam_operasional')->default('Senin - Minggu: 09:00 - 24:00 WIB');
            $table->timestamps();
        });

        // Insert default initial row
        DB::table('pengaturan_web')->insert([
            'nama_rental' => 'AYA PlayStation',
            'tagline' => 'Modern Gaming Lounge & Rental Console',
            'deskripsi' => 'Layanan rental PlayStation 4 & PlayStation 5 terbaik, gaming lounge ber-AC dengan ruang VIP dan sewa konsol harian terpercaya.',
            'logo' => null,
            'hero_title' => 'Nikmati Sensasi Bermain Di AYA PlayStation',
            'hero_subtitle' => 'Lounge Gaming Modern & Rental PlayStation Terpercaya. Konsol PS4 & PS5 dengan TV 4K, Game Terbaru, Ruang VIP Ber-AC, dan Pelayanan Ramah.',
            'hero_image' => null,
            'telepon' => '+62 812-3456-7890',
            'whatsapp' => '081234567890',
            'email' => 'kontak@ayaplaystation.com',
            'alamat' => 'Jl. Utama Entertainment No. 88, Pusat Gaming',
            'jam_operasional' => 'Senin - Minggu: 09:00 - 24:00 WIB',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturan_web');
    }
}
