<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaPerHariToPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('ps', function (Blueprint $table) {
            $table->float('harga_per_hari')->after('stok')->default(0); // Harga sewa per hari
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('ps', function (Blueprint $table) {
            $table->dropColumn('harga_per_hari');
        });
    }
}
