<?php

namespace App\Http\Controllers;

use App\Models\DataPerental;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataPemasukanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Data Pemasukan Kas';

        // Total pemasukan dari tabel Penyewa
        $kasPenyewa = Penyewa::selectRaw('
            DATE(tanggal_sewa) as tanggal, 
            DAYNAME(tanggal_sewa) as hari, 
            MONTHNAME(tanggal_sewa) as bulan, 
            YEAR(tanggal_sewa) as tahun, 
            SUM(total_harga) as total_kas_masuk
        ')
        ->groupBy(DB::raw('DATE(tanggal_sewa), DAYNAME(tanggal_sewa), MONTHNAME(tanggal_sewa), YEAR(tanggal_sewa)'))
        ->get();

        // Total pemasukan dari tabel DataPerental
        $kasPerental = DataPerental::selectRaw('
            DATE(tanggal) as tanggal, 
            DAYNAME(tanggal) as hari, 
            MONTHNAME(tanggal) as bulan, 
            YEAR(tanggal) as tahun, 
            SUM(total_bayar) as total_kas_masuk
        ')
        ->groupBy('tanggal')
        ->get();

        // Gabungkan hasil dari kedua query
        $kasMasukGabungan = $kasPenyewa->concat($kasPerental)
            ->sortByDesc('tanggal')
            ->values();

        return view('pemasukan', compact('kasMasukGabungan', 'judul'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
