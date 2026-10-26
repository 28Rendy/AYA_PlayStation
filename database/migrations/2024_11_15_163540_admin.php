<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('nama')->primary(); // Nama sebagai Primary Key
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }


// primary key nama

// use Illuminate\Database\Eloquent\Model;

// class Admin extends Model
// {
//     protected $primaryKey = 'nama'; // Mengatur nama sebagai Primary Key
//     public $incrementing = false; // Karena nama bukan integer
//     protected $keyType = 'string'; // Primary Key berupa string
// }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Batalkan pembuatan tabel 
        Schema::dropIfExists('admin'); // Menggunakan 'admin' sebagai nama tabel
    }
}