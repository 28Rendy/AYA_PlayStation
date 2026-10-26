<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;  // Import model Admin

class DataRuang extends Model
{
    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'data_ruang';

    // Tentukan primary key
    protected $primaryKey = 'nomor_ruang';

    // Non-Auto Increment karena nomor_ruang adalah string dan bukan integer
    public $incrementing = false;

    // Tentukan tipe primary key
    protected $keyType = 'string';

    // Kolom-kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'nomor_ruang', 'kapasitas', 'perangkat_tersedia', 'harga_perjam', 
        'status_ruang', 'jam_operasional', 'kondisi_perangkat', 'admin_nama'
    ];
    

    // Relasi ke Admin (DataRuang belongs to Admin)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_nama', 'nama');
    }
    // DataPerental.php
public function dataRuang()
{
    return $this->belongsTo(DataRuang::class, 'nomor_ruang', 'nomor_ruang');
}

}

