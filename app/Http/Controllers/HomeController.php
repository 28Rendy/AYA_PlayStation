<?php

namespace App\Http\Controllers;

use App\Models\DataPerental;
use App\Models\DataRuang;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin,web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $data_ruang = DataRuang::all();
    //     $data_perental = DataPerental::all();
    //     $judul = 'Dashboard';
    //     $currentTime = Carbon::now(); // Waktu saat ini
    //     $currentDate = $currentTime->format('Y-m-d'); // Ambil hanya tanggal saat ini (tanpa waktu)

    //     foreach ($data_ruang as $ruang) {
    //         // Default status tersedia
    //         $ruang->status_ruang = 'Tersedia';

    //         foreach ($data_perental as $rental) {
    //             if ($rental->nomor_ruang == $ruang->nomor_ruang) { // Cocokkan ruang dengan penyewaan
    //                 $jamMasuk = Carbon::parse($rental->jam_masuk);
    //                 $jamKeluar = Carbon::parse($rental->jam_keluar);

    //                 // Cek apakah tanggal pemesanan berbeda dengan hari ini
    //                 // Jika pemesanan terjadi di hari kemarin, pastikan ruang tersedia hari ini di jam yang sama
    //                 if ($currentDate == $rental->tanggal) {
    //                     // Cek jika waktu sekarang berada di antara jam masuk dan jam keluar
    //                     if ($currentTime->between($jamMasuk, $jamKeluar)) {
    //                         $ruang->status_ruang = 'Tidak Tersedia';
    //                         break; // Tidak perlu cek penyewaan lain untuk ruang ini
    //                     }
    //                 } else {
    //                     // Jika pemesanan di hari sebelumnya, ruang harus tersedia pada waktu yang sama hari ini
    //                     if ($currentTime->format('H:i') == $jamMasuk->format('H:i')) {
    //                         $ruang->status_ruang = 'Tersedia';
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //         // Hitung total perental bulanan dan mingguan
    //     $startOfMonth = Carbon::now()->startOfMonth();
    //     $endOfMonth = Carbon::now()->endOfMonth();
    //     $startOfWeek = Carbon::now()->startOfWeek();
    //     $endOfWeek = Carbon::now()->endOfWeek();

    //     $totalPerentalMonthly = DataPerental::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->count();
    //     $totalPerentalWeekly = DataPerental::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->count();

    //     $pemasukanBulanan =  DataPerental::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->sum('total_bayar');


    //     return view('dashboard', compact('data_ruang', 'totalPerentalMonthly', 'totalPerentalWeekly', 'pemasukanBulanan', 'judul'));
    // }

    public function index()
    {
        $data_ruang = DataRuang::all(); // Ambil data ruang
        $data_perental = DataPerental::all();
        $data_penyewa = Penyewa::all();  // Ambil data penyewa
        $judul = 'Dashboard';
        $currentTime = Carbon::now(); // Waktu saat ini
        $currentDate = $currentTime->format('Y-m-d'); // Ambil hanya tanggal saat ini (tanpa waktu)
    
        // Hanya ambil status ruang dari DataRuang tanpa cek perental atau penyewa
        foreach ($data_ruang as $ruang) {
            // Status ruang diambil langsung dari DataRuang
            $ruang->status_ruang = $ruang->status_ruang ?? 'Tersedia'; // Jika tidak ada status, default 'Tersedia'
        }
    
        // Hitung total perental bulanan dan mingguan dari DataPerental
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        $totalPerentalMonthly = DataPerental::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->count();
        $totalPerentalWeekly = DataPerental::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->count();
        $pemasukanBulanan = DataPerental::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->sum('total_bayar');
    
        // Hitung total pemasukan dari Penyewa
        $pemasukanPenyewaBulanan = Penyewa::whereBetween('tanggal_sewa', [$startOfMonth, $endOfMonth])->sum('total_harga');
        $pemasukanPenyewaMingguan = Penyewa::whereBetween('tanggal_sewa', [$startOfWeek, $endOfWeek])->sum('total_harga');
    
        // Gabungkan total pemasukan dari DataPerental dan Penyewa
        $pemasukanTotalBulanan = $pemasukanBulanan + $pemasukanPenyewaBulanan;
        $pemasukanTotalMingguan = $pemasukanPenyewaMingguan + $pemasukanBulanan;
    
        // Kirim data ke view
        return view('dashboard', compact('data_ruang', 'totalPerentalMonthly', 'totalPerentalWeekly', 'pemasukanTotalBulanan', 'pemasukanTotalMingguan', 'judul'));
    }
    

}
