<?php

namespace App\Models;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class DataPengeluaran extends Model
{
    protected $table = 'data_pengeluaran'; // Tetapkan tabel eksplisit
    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'hari',
        'tanggal',
        'bulan',
        'tahun',
        'kas_keluar',
        'keterangan',
        'admin_nama'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_nama', 'nama');
    }
}
