<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPerental;
use App\Models\DataRuang;
use App\Models\Penyewa;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class DataPerentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $judul = 'Data Perental';
        $dataPerental = DataPerental::all();

        return view('DTperental', ['dataPerental' => $dataPerental, 'judul' => $judul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function create()
     {
         // Ambil data ruang (nomor ruang dan harga perjam)
        $judul = 'Tambah Data Perental';
        $nruang = DataRuang::all(['nomor_ruang', 'harga_perjam']);
        return view('TDperental', compact('nruang', 'judul'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
     
        $request->validate([
            'nomor_ruang' => 'required|string|exists:data_ruang,nomor_ruang',
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'jam_sewa' => 'required|numeric|min:1',
            'harga_perjam' => 'required|numeric|min:0',
            'total_bayar' => 'required|numeric|min:0',
        ]);

        $existingSchedule = DataPerental::where('nomor_ruang', $request->nomor_ruang)
        ->where('tanggal', $request->tanggal)
        ->where(function ($query) use ($request) {
            $query->whereBetween('jam_masuk', [$request->jam_masuk, $request->jam_keluar])
                  ->orWhereBetween('jam_keluar', [$request->jam_masuk, $request->jam_keluar])
                  ->orWhere(function ($query) use ($request) {
                      $query->where('jam_masuk', '<=', $request->jam_masuk)
                            ->where('jam_keluar', '>=', $request->jam_keluar);
                  });
        })
        ->exists();

        if ($existingSchedule) {
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Jadwal perental sudah ada.');
        }

        // Simpan data ke tabel data_perental
        DataPerental::create($request->all());

        // Redirect ke halaman data perental dengan pesan sukses
        return redirect()->route('DTperental.index')->with('success', 'Data perental berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nama)
    {
        $judul = 'Edit Data Perental';   
        $perental = DataPerental::findOrFail($nama);
        // dd($perental); // Cek data perental
        
        // Ambil semua data ruang untuk pilihan nomor ruang
        $nruang = DataRuang::all(['nomor_ruang', 'harga_perjam']);
        // dd($nruang); // Cek data ruang
        
        return view('EDperental', compact('perental', 'nruang', 'judul'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nama)
    {
        // Validasi input
        $request->validate([
            'nomor_ruang' => 'required|string|exists:data_ruang,nomor_ruang',
            'nama' => 'required|unique:data_perental,nama,' . $nama . ',nama|string|max:255',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'jam_sewa' => 'required|numeric|min:1',
            'harga_perjam' => 'required|numeric|min:0',
            'total_bayar' => 'required|numeric|min:0',
        ]);
        
    

        // dd($request->all());
    
        // Cari data berdasarkan ID
        $kas = DataPerental::findOrFail($nama);
    
        if (!$kas) {
            // Jika data tidak ditemukan
            return redirect()->route('pemasukan.index')->with('error', 'Data tidak ditemukan.');
        }

        $kas->update($request->all());
    
        // Perbarui data
        // $kas->nomor_ruang = $request->nomor_ruang;
        // $kas->nama = $request->nama;
        // $kas->tanggal = $request->tanggal;
        // $kas->jam_masuk = $request->jam_masuk;
        // $kas->jam_keluar = $request->jam_keluar;
        // $kas->jam_sewa = $request->jam_sewa;
        // $kas->harga_perjam = $request->harga_perjam;
        // $kas->total_bayar = $request->total_bayar;
    
        // Redirect ke halaman laporan dengan pesan sukses
        return redirect()->route('DTperental.index')->with('success', 'Periode berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nama)
    {
        //  Hapus data berdasarkan ID
        $perental = DataPerental::findorfail($nama);
        $perental->delete();
    
        // Redirect ke halaman laporan dengan pesan sukses
        return redirect()->route('DTperental.index')->with('success', 'Data berhasil dihapus.');
    }
    public function kasMasuk()
{
    $judul = 'Data Pemasukan';

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
        ->groupBy('tanggal') // Mengelompokkan berdasarkan tanggal
        ->get();

    // Gabungkan hasil dari kedua query
    $kasMasukGabungan = $kasPenyewa->concat($kasPerental)
        ->sortByDesc('tanggal') // Mengurutkan berdasarkan tanggal terbaru
        ->values(); // Reset indeks array

    // Kirim data ke view
    return view('pemasukan', [
        'kasMasukGabungan' => $kasMasukGabungan,
        'judul' => $judul,
    ]);
}


public function ubahPeriode(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hari' => 'required|string',
        'bulan' => 'required|string',
        'tahun' => 'required|integer',
    ]);

    // Lakukan proses pembaruan di sini, misalnya:
    // $periode = Periode::find($id);
    // $periode->tanggal = $request->tanggal;
    // $periode->hari = $request->hari;
    // $periode->bulan = $request->bulan;
    // $periode->tahun = $request->tahun;
    // $periode->save();

    return redirect()->route('pemasukan.index');
}


}
