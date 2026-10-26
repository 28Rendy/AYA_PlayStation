<?php

namespace App\Http\Controllers;

use App\Models\DataPerental;
use App\Models\Ulasan;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index() {
        $judul = 'Data Ulasan';
        $data_ulasan = Ulasan::all();
        
        return view('DTulasan', ['data_ulasan' => $data_ulasan, 'judul' => $judul]);
        
    }

    public function store(Request $request) {

        $request->validate([
            'nama' => 'required|string',
            'subject' => 'required',
            'message' => 'required',
        ]);


            

        
        Ulasan::create([
            'nama' => $request->nama,
            'waktu' => $request->subject,
            'keterangan' => $request->message,
        ]);

        return response()->json(['message' => 'Data has been successfully sent.'], 200);  

    }

    public function destroy($nama) {
        
        $ulasan = Ulasan::findOrFail($nama);
        $ulasan->delete();

        return redirect()->route('ulasan.index');
    }
}
