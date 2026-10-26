<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class DataPemasukan extends Model
{
    protected $table = 'data_pemasukan';

    // Menentukan bahwa kolom 'nama' adalah primary key
    protected $primaryKey = 'nama';

    // Menonaktifkan auto-increment karena 'nama' bukan kolom auto-increment
    public $incrementing = false;

    // Tentukan jenis kolom 'nama' jika bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'admin_nama',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
        'kas_masuk',
    ];

    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_nama', 'nama');
    }
}
