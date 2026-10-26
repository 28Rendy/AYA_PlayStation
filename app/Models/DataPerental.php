<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DataRuang;
use App\Models\Ulasan;
class DataPerental extends Model

{

      // Nama tabel di database
    protected $table = 'data_perental';

      // Primary key menggunakan nomor_ruang
    protected $primaryKey = 'nama';

      // Menonaktifkan auto-increment karena nomor_ruang bukan integer
    public $incrementing = false;

      // Jenis primary key sebagai string
    protected $keyType = 'string';

      // Kolom yang dapat diisi
      protected $fillable = [
        'nomor_ruang',
        'nama',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'jam_sewa',
        'harga_perjam',
        'total_bayar',
    ];
    // Relasi ke DataRuang
    public function dataRuang()
    {
        return $this->belongsTo(DataRuang::class, 'nomor_ruang', 'nomor_ruang');
    }

    // Relasi ke Ulasan
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'data_perental_nama', 'nama');
    }
}

