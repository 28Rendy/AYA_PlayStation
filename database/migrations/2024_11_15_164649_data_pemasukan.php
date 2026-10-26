<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPemasukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemasukan', function (Blueprint $table) {
            // Kolom 'nama' sebagai Primary Key di tabel data_pemasukan
            $table->string('nama')->primary();

            // Menambahkan kolom 'admin_nama' untuk foreign key
            $table->string('admin_nama');  // Tambahkan kolom ini terlebih dahulu

            // Menambahkan foreign key yang mengacu pada kolom 'nama' di tabel admin
            $table->foreign('admin_nama')->references('nama')->on('admin');

            // Kolom lainnya
            $table->string('hari');
            $table->date('tanggal');
            $table->string('bulan');
            $table->integer('tahun');
            $table->decimal('kas_masuk', 15, 2);

            // Timestamps untuk created_at dan updated_at
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
        // Batalkan pembuatan tabel
        Schema::dropIfExists('data_pemasukan');
    }
}
