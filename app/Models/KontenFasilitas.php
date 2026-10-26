<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontenFasilitas extends Model
{
    protected $table = 'konten_fasilitas';

    protected $fillable = [
        'label_badge',
        'judul',
        'deskripsi',
        'foto',
        'alt_foto',
        'urutan',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true)->orderBy('urutan');
    }

    // Helper: get image src or default fallback
    public function getFotoSrc($index = 0)
    {
        // Default fallback images based on order
        $defaults = [
            'Frontend/img/facilities/vip_lounge.jpg',
            'Frontend/img/facilities/cafe_snack.jpg',
            'Frontend/img/facilities/tournament.jpg',
            'Frontend/img/facilities/rental_kit.jpg',
            'Frontend/img/Ruangan1.jpg',
            'Frontend/img/mushola.jpg',
            'Frontend/img/smooking.jpg',
        ];

        if ($this->foto && file_exists(public_path($this->foto))) {
            return asset($this->foto);
        }

        $idx = ($this->urutan - 1);
        $fallback = $defaults[$idx] ?? ($defaults[0]);
        return asset($fallback);
    }
}
