<?php

namespace App\Http\Controllers;

use App\Models\DataPerental;
use App\Models\DataRuang;
use App\Models\Ps;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = Auth::user();
        $ruang = DataRuang::all();
        $ps = Ps::all();
        $ulasan = Ulasan::latest()->take(5)->get();
        $riwayat = DataPerental::where('nama', $user->name)->orderBy('tanggal', 'desc')->get();

        return view('pelanggan.dashboard', compact('user', 'ruang', 'ps', 'ulasan', 'riwayat'));
    }

    public function pesanRuang(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nomor_ruang' => 'required|string|exists:data_ruang,nomor_ruang',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_masuk' => 'required',
            'jam_sewa' => 'required|numeric|min:1|max:12',
        ]);

        $dataRuang = DataRuang::where('nomor_ruang', $request->nomor_ruang)->firstOrFail();

        $jamMasuk = date('H:i', strtotime($request->jam_masuk));
        $jamKeluar = date('H:i', strtotime($request->jam_masuk . " +{$request->jam_sewa} hours"));
        $hargaPerjam = $dataRuang->harga_perjam;
        $totalBayar = $hargaPerjam * $request->jam_sewa;

        // Cek konflik jadwal
        $conflict = DataPerental::where('nomor_ruang', $request->nomor_ruang)
            ->where('tanggal', $request->tanggal)
            ->where(function ($query) use ($jamMasuk, $jamKeluar) {
                $query->whereBetween('jam_masuk', [$jamMasuk, $jamKeluar])
                      ->orWhereBetween('jam_keluar', [$jamMasuk, $jamKeluar])
                      ->orWhere(function ($q) use ($jamMasuk, $jamKeluar) {
                          $q->where('jam_masuk', '<=', $jamMasuk)
                            ->where('jam_keluar', '>=', $jamKeluar);
                      });
            })
            ->exists();

        if ($conflict) {
            return back()->with('error', 'Mohon maaf, Ruang ' . $request->nomor_ruang . ' pada jam tersebut sudah terisi. Silakan pilih jam atau ruang lain.')->withInput();
        }

        DataPerental::create([
            'nomor_ruang' => $request->nomor_ruang,
            'nama' => $user->name,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $jamMasuk,
            'jam_keluar' => $jamKeluar,
            'jam_sewa' => $request->jam_sewa,
            'harga_perjam' => $hargaPerjam,
            'total_bayar' => $totalBayar,
        ]);

        return back()->with('success', 'Pemesanan Ruang ' . $request->nomor_ruang . ' berhasil dibuat! Silakan datang tepat waktu.');
    }
}
