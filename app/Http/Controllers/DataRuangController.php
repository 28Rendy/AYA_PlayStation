<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\DataPerental;
use App\Models\DataRuang;
use Illuminate\Support\Carbon;

class DataRuangController extends Controller
{
    public function index()
    {
        $data_ruang = DataRuang::all();
        $judul = 'Data Ruang';
    
        return view('DTruang', compact('data_ruang', 'judul'));
    }
    

    public function create()
    {
        $admins = Admin::all(); // Ambil semua admin dari database
        $judul = 'Tambah Data Ruang';
        return view('TDruang', compact('admins', 'judul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_ruang' => 'required|string|unique:data_ruang,nomor_ruang',
            'kapasitas' => 'required',
            'perangkat_tersedia' => 'required|string',
            'harga_perjam' => 'required|numeric',
            'jam_operasional' => 'required',
            'status_ruang' => 'required|string',
            'kondisi_perangkat' => 'required|string',
            'admin_nama' => 'required|string|exists:admin,nama',
        ]);

        $save_DTruang = new DataRuang();
        $save_DTruang->nomor_ruang = $request->nomor_ruang;
        $save_DTruang->kapasitas = $request->kapasitas;
        $save_DTruang->perangkat_tersedia = $request->perangkat_tersedia;
        $save_DTruang->harga_perjam = $request->harga_perjam;
        $save_DTruang->jam_operasional = $request->jam_operasional;
        $save_DTruang->status_ruang = $request->status_ruang;
        $save_DTruang->kondisi_perangkat = $request->kondisi_perangkat;
        $save_DTruang->admin_nama = $request->admin_nama;
        $save_DTruang->save();

        return redirect()->route('DTruang.index')->with('success', 'Data ruang berhasil disimpan.');
    }

    public function edit($nomor_ruang)
    {
        $judul = 'Edit Data Ruang';
        $dataRuang = DataRuang::findOrFail($nomor_ruang);
        $admins = Admin::all();
        return view('EDruang', ['dataRuang' => $dataRuang , 'admins' => $admins, 'judul' => $judul]);
    }

    public function update(Request $request, $nomor_ruang)
    {
        $request->validate([
            'nomor_ruang' => 'required|string',
            'kapasitas' => 'required',
            'perangkat_tersedia' => 'required|string',
            'harga_perjam' => 'required|numeric',
            'jam_operasional' => 'required',
            'status_ruang' => 'required|string',
        ]);

        $data_ruang = DataRuang::findOrFail($nomor_ruang);

        // Update the status_ruang and other fields
        $data_ruang->update([
            'kapasitas' => $request->kapasitas,
            'perangkat_tersedia' => $request->perangkat_tersedia,
            'harga_perjam' => $request->harga_perjam,
            'jam_operasional' => $request->jam_operasional,
            'status_ruang' => $request->status_ruang,
            'kondisi_perangkat' => $request->kondisi_perangkat, // Ensure this is being updated
        ]);
        

        return redirect()->route('DTruang.index')->with('success', 'Data ruang berhasil diperbarui.');
    }

    public function destroy($nomor_ruang)
    {
        $data_ruang = DataRuang::where('nomor_ruang', $nomor_ruang)->firstOrFail();
        $data_ruang->delete();

        return redirect()->route('DTruang.index')->with('success', 'Data ruang berhasil dihapus.');
    }
}
