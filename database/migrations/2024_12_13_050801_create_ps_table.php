<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('ps', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_ps', 50); // Nama PS, seperti PS4 atau PS5
            $table->integer('stok'); // Jumlah stok PS
            $table->enum('status_ps', ['Tersedia', 'Stok Habis', 'rusak'])->default('tersedia'); // Status PS
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
        Schema::dropIfExists('ps');
    }
}
