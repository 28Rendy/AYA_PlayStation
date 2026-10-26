<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ulasan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->string('nama')->primary(); // Primary key

            // Kolom yang menjadi foreign key
            $table->string('data_perental_nama'); // Kolom ini harus ada

            // Menambahkan foreign key yang merujuk ke kolom 'nama' di tabel 'data_perental'
            $table->foreign('data_perental_nama')
                  ->references('nama')->on('data_perental')
                  ->onDelete('cascade'); // Aturan saat data dihapus

            $table->timestamp('waktu');
            $table->text('keterangan');
            $table->timestamps(); // Created_at dan Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulasan');
    }
}
