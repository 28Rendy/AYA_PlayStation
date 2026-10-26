<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DataPengeluaran;
use Illuminate\Http\Request;

class DataPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Data Pengeluaran';
        $data_pengeluaran = DataPengeluaran::all();
        return view('pengeluaran', [
            'data_pengeluaran' => $data_pengeluaran,'judul' => $judul
        ]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tambah Data Pengeluaran';
        $admins = \App\Models\Admin::all(); 
        return view('TDPengeluaran', compact('admins', 'judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi inputan

    $request->validate([
        'admin_nama' => 'required|string|exists:admin,nama',
        'nama' => 'required|string|max:50|unique:data_pengeluaran,nama', 
        'tanggal' => 'required|date',
        'kas_keluar' => 'required|numeric',
        'keterangan' => 'nullable|string|max:255',
    ]);

    // Ambil nilai tanggal yang dikirimkan (format YYYY-MM-DD)
    $tanggalInput = $request->tanggal;

    // Pecah tanggal menjadi hari, bulan, tahun
    $tanggal = \Carbon\Carbon::parse($tanggalInput);  // Menggunakan Carbon untuk memparse tanggal

    $hari = $tanggal->format('l'); // Format hari (e.g., Monday)
    $tanggalDay = $tanggal->day;  // Tanggal (e.g., 10)
    $bulan = $tanggal->format('F');  // Bulan (e.g., January)
    $tahun = $tanggal->year;  // Tahun (e.g., 2024)
    // dd( $hari, $tanggalDay, $bulan, $tahun);

    // Simpan data ke database
    DataPengeluaran::create([
        'admin_nama' => $request->admin_nama,
        'nama' => $request->nama,
        'hari' => $hari,
        'tanggal' => $tanggalDay,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'kas_keluar' => $request->kas_keluar,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil disimpan.');
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
        // Cari data berdasarkan id
        $judul = 'Edit Data Pengeluaran';
        $pengeluaran = DataPengeluaran::findOrFail($nama);
        $admins = Admin::all(); // Ambil data admin untuk dropdown
        
        return view('EDpengeluaran', compact('pengeluaran', 'admins', 'judul'));
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
         $request->validate([
             'admin_nama' => 'required|string|exists:admin,nama',
             'nama' => 'required|string|max:50|unique:data_pengeluaran,nama,' . $nama . ',nama',
             'tanggal' => 'required|date',
             'kas_keluar' => 'required|numeric',
             'keterangan' => 'nullable|string|max:255',
         ]);
     
         $data = DataPengeluaran::where('nama', $nama)->first();
     
         if (!$data) {
             return redirect()->route('pengeluaran.index')->with('error', 'Data tidak ditemukan');
         }
     
         $tanggalInput = $request->tanggal;
         $tanggal = \Carbon\Carbon::parse($tanggalInput);
     
         $hari = $tanggal->format('l');
         $tanggalDay = $tanggal->day;
         $bulan = $tanggal->format('F');
         $tahun = $tanggal->year;
     
         $data->update([
             'admin_nama' => $request->admin_nama,
             'nama' => $request->nama,
             'hari' => $hari,
             'tanggal' => $tanggalDay,
             'bulan' => $bulan,
             'tahun' => $tahun,
             'kas_keluar' => $request->kas_keluar, // Pastikan nilai ini di-update
             'keterangan' => $request->keterangan,
         ]);
     
         return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil diperbarui');
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
        $perental = DataPengeluaran::findorfail($nama);
        $perental->delete();
    
        // Redirect ke halaman laporan dengan pesan sukses
        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil dihapus.');
    }
}
