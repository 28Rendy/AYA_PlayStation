<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_penyewa', 100); // Nama penyewa
            $table->text('alamat'); // Alamat penyewa
            $table->string('telepon', 15); // Nomor telepon penyewa
            $table->foreignId('ps_id')->constrained('ps')->onDelete('cascade'); // Foreign key ke tabel PS
            $table->dateTime('tanggal_sewa'); // Tanggal penyewaan
            $table->dateTime('tanggal_kembali'); // Tanggal pengembalian
            $table->enum('status_sewa', ['dipinjam', 'dikembalikan', 'hilang'])->default('dipinjam'); // Status penyewaan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewa');
    }
}
