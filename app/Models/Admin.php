<?php

namespace App\Models;

use Illuminate\Foundation\Auth\user as Authenticatable; 
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPemasukan;
use App\models\DataPengeluaran;

use App\Models\DataRuang;
use Illuminate\Notifications\Notifiable;

class Admin extends  Authenticatable
{
    use Notifiable;
    // Menentukan bahwa kolom 'nama' adalah primary key
    protected $table = "admin";
    protected $primaryKey = 'nama';

    // Menonaktifkan auto-increment karena 'nama' bukan kolom auto-increment
    public $incrementing = false;

    // Tentukan jenis kolom 'nama' jika bukan integer
    protected $keyType = 'string';

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Relasi ke DataRuang
    public function dataRuang()
    {
        return $this->hasMany(DataRuang::class, 'admin_nama', 'nama');
    }

    // Relasi ke DataPemasukan
    public function dataPemasukan()
    {
        return $this->hasMany(DataPemasukan::class, 'admin_nama', 'nama');
    }

    // Relasi ke DataPengeluaran
    public function dataPengeluaran()
    {
        return $this->hasMany(DataPengeluaran::class, 'admin_nama', 'nama');
    }
}
