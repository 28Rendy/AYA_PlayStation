<?php

use Illuminate\Database\Seeder;
use App\Models\DataRuang;

class DataRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data ruang pertama
        $dataRuang = new DataRuang;
        $dataRuang->nomor_ruang = "001";
        $dataRuang->kapasitas = "2 pemain";
        $dataRuang->perangkat_tersedia = "PS4 Pro, 2x Joystick, Monitor 24\"";
        $dataRuang->harga_perjam = 8000;
        $dataRuang->jam_operasional = "09:00 - 23:00";
        $dataRuang->status_ruang = "Tersedia";
        $dataRuang->kondisi_perangkat = "Normal";
        $dataRuang->admin_nama = "admin";
        $dataRuang->save();

        // Data ruang kedua
        $dataRuang = new DataRuang;
        $dataRuang->nomor_ruang = "002";
        $dataRuang->kapasitas = "2 pemain";
        $dataRuang->perangkat_tersedia = "PS4, 2x Joystick, Televisi 24\"";
        $dataRuang->harga_perjam = 8000;
        $dataRuang->jam_operasional = "09:00 - 23:00";
        $dataRuang->status_ruang = "Tersedia";
        $dataRuang->kondisi_perangkat = "Normal";
        $dataRuang->admin_nama = "admin";
        $dataRuang->save();

        // Data ruang ketiga
        $dataRuang = new DataRuang;
        $dataRuang->nomor_ruang = "003";
        $dataRuang->kapasitas = "3 pemain";
        $dataRuang->perangkat_tersedia = "PS4, 2x Joystick, Televisi 24\"";
        $dataRuang->harga_perjam = 8000;
        $dataRuang->jam_operasional = "09:00 - 23:00";
        $dataRuang->status_ruang = "Tersedia";
        $dataRuang->kondisi_perangkat = "Normal";
        $dataRuang->admin_nama = "admin";
        $dataRuang->save();

        // Data ruang keempat
        $dataRuang = new DataRuang;
        $dataRuang->nomor_ruang = "004";
        $dataRuang->kapasitas = "1 pemain";
        $dataRuang->perangkat_tersedia = "PS4, 1x Joystick, Televisi 24\"";
        $dataRuang->harga_perjam = 6000;
        $dataRuang->jam_operasional = "09:00 - 23:00";
        $dataRuang->status_ruang = "Tidak Tersedia";
        $dataRuang->kondisi_perangkat = "Normal";
        $dataRuang->admin_nama = "admin";
        $dataRuang->save();

        // Informasi bahwa seeder berhasil dijalankan
        $this->command->info("Data ruang berhasil diinsert.");
    }
}
