<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanWeb extends Model
{
    protected $table = 'pengaturan_web';

    protected $fillable = [
        'nama_rental',
        'tagline',
        'deskripsi',
        'logo',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'telepon',
        'whatsapp',
        'email',
        'alamat',
        'jam_operasional',
    ];

    /**
     * Helper to get the single settings instance
     */
    public static function getSettings()
    {
        $settings = self::first();
        if (!$settings) {
            $settings = self::create([
                'nama_rental' => 'AYA PlayStation',
                'tagline' => 'Modern Gaming Lounge & Rental Console',
                'deskripsi' => 'Layanan rental PlayStation 4 & PlayStation 5 terbaik, gaming lounge ber-AC dengan ruang VIP dan sewa konsol harian terpercaya.',
                'telepon' => '+62 812-3456-7890',
                'whatsapp' => '081234567890',
                'email' => 'kontak@ayaplaystation.com',
                'alamat' => 'Jl. Utama Entertainment No. 88, Pusat Gaming',
                'jam_operasional' => 'Senin - Minggu: 09:00 - 24:00 WIB',
                'hero_title' => 'Nikmati Sensasi Bermain Di AYA PlayStation',
                'hero_subtitle' => 'Lounge Gaming Modern & Rental PlayStation Terpercaya. Konsol PS4 & PS5 dengan TV 4K, Game Terbaru, Ruang VIP Ber-AC, dan Pelayanan Ramah.',
            ]);
        }
        return $settings;
    }
}
