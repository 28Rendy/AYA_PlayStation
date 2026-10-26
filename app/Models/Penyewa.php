<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{

    // Nama tabel (jika nama tabel di database berbeda dari konvensi Laravel)
    protected $table = 'penyewa';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_penyewa',
        'alamat',
        'telepon',
        'ps_id',
        'tanggal_sewa',
        'tanggal_kembali',
        'total_harga',
        'status_sewa',
    ];

    // Relasi dengan model Ps (penyewa hanya bisa menyewa satu PS)
    public function ps()
    {
        return $this->belongsTo(Ps::class, 'ps_id', 'id');
    }
}
