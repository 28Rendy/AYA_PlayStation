<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Ps;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DataPenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Data Penyewa Playstation';
        $data_penyewa = Penyewa::all();
        return view('DTpenyewa',['data_penyewa' => $data_penyewa, 'judul' => $judul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tambah Data Penyewa';
        $data_ps = Ps::all();
        return view('TDpenyewa', ['data_ps' => $data_ps, 'judul' => 'Tambah Data Penyewa', 'judul' => $judul]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'ps_id' => 'required|exists:ps,id', // Pastikan PS yang dipilih ada di tabel PS
            'nama_penyewa' => 'required|string|max:100', // Nama penyewa tidak boleh kosong, maksimal 100 karakter
            'alamat' => 'required|string|max:255', // Alamat tidak boleh kosong, maksimal 255 karakter
            'telepon' => 'required|string|max:20', // Nomor telepon tidak boleh kosong, maksimal 20 karakter
            'tanggal_sewa' => 'required|date', // Tanggal pinjam harus berupa tanggal valid
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_sewa', // Tanggal kembali harus setelah atau sama dengan tanggal sewa
            'harga_ps' => 'required|numeric', // Total harga harus berupa angka
            'status_sewa' => 'required|in:dipinjam,dikembalikan,hilang',

        ]);
    
        // Cek stok PS yang dipilih
        $ps = Ps::find($request->ps_id);
        if ($ps->stok < 1) {
            return redirect()->back()->withErrors(['ps_id' => 'Stok PS tidak mencukupi.'])->withInput();
        }
    
        // Hitung total biaya sewa
        $tanggalPinjam = Carbon::parse($request->tanggal_sewa);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);
        $lamaSewa = $tanggalKembali->diffInDays($tanggalPinjam) + 1;
        $totalHarga = $lamaSewa * $request->harga_ps;

    
        // Simpan data penyewa ke database
        Penyewa::create([
            'ps_id' => $request->ps_id,
            'nama_penyewa' => $request->nama_penyewa,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_harga' => $totalHarga,
            'status_sewa' => $request->status_sewa
        ]);
    
        // Kurangi stok PS
        $ps->decrement('stok');
    
        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('DTpenyewa.index')->with('success', 'Data penyewa berhasil ditambahkan!');
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
    public function edit($id)
    {
        $judul = 'Edit Data Penyewa';
        $data_penyewa = Penyewa::findOrFail($id);
        $data_ps = Ps::all();
        return view('EDpenyewa', compact('data_penyewa', 'data_ps', 'judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'ps_id' => 'required|exists:ps,id', // Pastikan PS yang dipilih ada di tabel PS
            'nama_penyewa' => 'required|string|max:100', // Nama penyewa tidak boleh kosong, maksimal 100 karakter
            'alamat' => 'required|string|max:255', // Alamat tidak boleh kosong, maksimal 255 karakter
            'telepon' => 'required|string|max:20', // Nomor telepon tidak boleh kosong, maksimal 20 karakter
            'tanggal_sewa' => 'required|date', // Tanggal pinjam harus berupa tanggal valid
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam', // Tanggal kembali harus setelah tanggal pinjam
            'harga_ps' => 'required|numeric', // Total harga harus berupa angka
            'status_sewa' => 'required|in:dipinjam,dikembalikan,hilang',

        ]);
    
        // Cek stok PS yang dipilih
        $ps = Ps::find($request->ps_id);
        if ($ps->stok < 1) {
            return redirect()->back()->withErrors(['ps_id' => 'Stok PS tidak mencukupi.'])->withInput();
        }
    
        // Hitung total biaya sewa
        $tanggalPinjam = Carbon::parse($request->tanggal_pinjam);
        $tanggalKembali = Carbon::parse($request->tanggal_kembali);
        $lamaSewa = $tanggalKembali->diffInDays($tanggalPinjam) + 1;
        $totalHarga = $lamaSewa * $request->harga_ps;
    
        // Update data penyewa di database
        $penyewa = Penyewa::findOrFail($id);
        $penyewa->ps_id = $request->ps_id;
        $penyewa->nama_penyewa = $request->nama_penyewa;
        $penyewa->alamat = $request->alamat;
        $penyewa->telepon = $request->telepon;
        $penyewa->tanggal_sewa = $request->tanggal_sewa;
        $penyewa->tanggal_kembali = $request->tanggal_kembali;
        $penyewa->total_harga = $totalHarga;
        $penyewa->status_sewa = $request->status_sewa;
        $penyewa->save();
    
        // Kurangi stok PS
        $ps->decrement('stok');
    
        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('DTpenyewa.index')->with('success', 'Data penyewa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyewa = Penyewa::findOrFail($id);
        $ps = Ps::find($penyewa->ps_id);
        $ps->increment('stok');
        $penyewa->delete();

        return redirect()->route('DTpenyewa.index')->with('success', 'Data penyewa berhasil dihapus!');
    }
}
