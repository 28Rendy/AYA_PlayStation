<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPerental extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_perental', function (Blueprint $table) {
            // Kolom 'nama' sebagai primary key
            $table->string('nama')->primary();
            // Kolom 'nomor_ruang' sebagai foreign key yang mengarah ke kolom 'nomor_ruang' di tabel 'data_ruang'
            $table->string('nomor_ruang');  // Pastikan menggunakan 'string' jika 'nomor_ruang' adalah string
            $table->foreign('nomor_ruang')->references('nomor_ruang')->on('data_ruang'); // Foreign key yang benar

            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('jam_sewa');
            $table->decimal('harga_perjam', 15, 2);
            $table->decimal('total_bayar', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_perental');
    }
}
