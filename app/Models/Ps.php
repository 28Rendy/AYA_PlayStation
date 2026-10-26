<?php

namespace App\Models;

use App\Models\Penyewa;
use Illuminate\Database\Eloquent\Model;

class Ps extends Model
{

    // Nama tabel (jika nama tabel di database berbeda dari konvensi Laravel)
    protected $table = 'ps';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_ps',
        'stok',
        'status_ps',
        'harga_per_hari'
    ];

    // Relasi dengan model Penyewa (satu PS bisa disewa oleh banyak penyewa)
    public function penyewa()
    {
        return $this->hasMany(Penyewa::class, 'ps_id', 'id');
    }
}
