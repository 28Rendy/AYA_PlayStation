<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $table = 'galeri_foto';

    protected $fillable = [
        'judul',
        'keterangan',
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

    // Default fallback images
    private static $defaults = [
        'Frontend/img/facilities/vip_lounge.jpg',
        'Frontend/img/facilities/cafe_snack.jpg',
        'Frontend/img/facilities/tournament.jpg',
        'Frontend/img/facilities/rental_kit.jpg',
        'Frontend/img/Ruangan1.jpg',
        'Frontend/img/ps4.jpg',
    ];

    public function getFotoSrc()
    {
        if ($this->foto && file_exists(public_path($this->foto))) {
            return asset($this->foto);
        }
        $idx = ($this->urutan - 1);
        $fallback = self::$defaults[$idx] ?? self::$defaults[0];
        return asset($fallback);
    }
}
