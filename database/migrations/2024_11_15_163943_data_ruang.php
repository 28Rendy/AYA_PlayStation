<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataRuang extends Migration
{
    public function up()
    {
        Schema::create('data_ruang', function (Blueprint $table) {
            // Menetapkan nomor_ruang sebagai primary key
            $table->string('nomor_ruang')->primary(); // Primary Key
            $table->string('kapasitas');
            $table->string('perangkat_tersedia');
            $table->double('harga_perjam');
            $table->string('jam_operasional');
            $table->enum('status_ruang', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia');
            $table->string('kondisi_perangkat');
            $table->string('admin_nama');  // Foreign Key akan diset di bawah
            $table->timestamps();

            // Foreign key untuk admin_nama yang mengarah ke kolom 'nama' di tabel 'admins'
            $table->foreign('admin_nama')->references('nama')->on('admin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_ruang');
    }
}
