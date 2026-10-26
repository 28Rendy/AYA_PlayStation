<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pengeluaran', function (Blueprint $table) {
            $table->string('nama')->primary(); 

            // Menambahkan kolom 'admin_nama' yang akan menjadi foreign key
            $table->string('admin_nama'); 

            // Foreign key untuk admin_nama yang mengarah ke kolom 'nama' di tabel 'admin'
            $table->foreign('admin_nama')->references('nama')->on('admin')->onDelete('cascade'); // Jika admin dihapus, data_pengeluaran terkait juga dihapus.

            // Kolom lainnya
            $table->string('hari');
            $table->integer('tanggal');
            $table->text('bulan');
            $table->integer('tahun');
            $table->decimal('kas_keluar', 15, 2);
            $table->text('keterangan');

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
        Schema::dropIfExists('data_pengeluaran');
    }
}
