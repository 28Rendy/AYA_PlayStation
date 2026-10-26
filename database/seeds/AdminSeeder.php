<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update atau buat akun admin AYA PlayStation
        $admin = Admin::firstOrNew(['nama' => 'admin']);
        $admin->nama = "admin";
        $admin->email = "admin@ayaplaystation.com";
        $admin->password = Hash::make("admin"); 
        $admin->save();
    }
}
