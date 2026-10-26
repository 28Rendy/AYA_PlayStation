<?php

namespace App\Http\Controllers;

use App\Models\Ps;
use Illuminate\Http\Request;

class DataPsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Data Playstation';
        $data_ps = Ps::all();

        foreach ($data_ps as $ps) {
            if ($ps->stok == 0 && $ps->status_ps != 'Stok Habis') {
                $ps->status_ps = 'Stok Habis';
                $ps->save();
            }
        }

        return view('DTps', compact('data_ps', 'judul'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tambah Data Playstation';
        $data_ps = Ps::all();
        return view('TDps', ['data_ps' => $data_ps, 'judul' => $judul]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_ps' => 'required|string|max:50',
                'stok' => 'required|integer',
                'status_ps' => 'required|in:tersedia,stok habis,rusak',
                'harga_per_hari' => 'required'
            ]);

            $data_stok = $request->stok > 0 && $request->status_ps == 'stok habis';

            if ($data_stok) {
                return redirect()->back()->withErrors(['errors' => 'status tidak boleh "stok habis" jika stoknya ada']);
            }
    
            Ps::create($validatedData);
    
            return redirect()->route('DTps.index')->with('success', 'Data PS berhasil ditambahkan!');
        } catch (\Throwable $e) {
            return  redirect()->back()->withErrors($e->validator->errors());
        }
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
        $judul = 'Edit Data Playstation';
        $data_ps = Ps::find($id);
        return view('EDps', ['data_ps' => $data_ps, 'judul' => $judul]);
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
        try {
            $validatedData = $request->validate([
                'nama_ps' => 'required|string|max:50',
                'stok' => 'required|integer',
                'status_ps' => 'required|in:tersedia,stok habis,rusak',
                'harga_per_hari' => 'required'
            ]);
    
            $data_ps = Ps::find($id);
            $data_ps->update($validatedData);
    
            return redirect()->route('DTps.index')->with('success', 'Data PS berhasil diperbarui!');
        } catch (\Throwable $e) {
            return  redirect()->back()->withErrors($e->validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_ps = Ps::find($id);
        $data_ps->delete();
        return redirect()->route('DTps.index')->with('success', 'Data PS berhasil dihapus!');
    }
}
