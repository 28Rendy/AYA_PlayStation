<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    // Menentukan bahwa kolom 'nama' adalah primary key
    protected $primaryKey = 'nama';

    // Menonaktifkan auto-increment karena 'nama' bukan kolom auto-increment
    public $incrementing = false;

    // Tentukan jenis kolom 'nama' jika bukan integer
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'data_perental_nama',
        'waktu',
        'keterangan',
    ];

    // Relasi ke DataPerental
    public function dataPerental()
    {
        return $this->belongsTo(DataPerental::class, 'data_perental_nama', 'nama');
    }
}
