<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_admin = Admin::all();
        $judul = 'Data Admin';
        return view('DTadmin',['data_admin' => $data_admin, 'judul' => $judul]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tambah Data Admin';
        return view('TDadmin',[ 'judul' => $judul]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',  // Nama wajib diisi
            'email' => 'required|email|unique:users,email',  // Email wajib, harus valid, dan unik
            'password' => 'required|min:6',  // Password wajib diisi dengan minimal 6 karakter
        ]);

        // Menyimpan data yang sudah divalidasi ke dalam array
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);  // Meng-hash password sebelum menyimpannya ke database

        // Membuat user baru di database menggunakan model User
        Admin::create($data);
        return redirect()->route('DTadmin.index')->with('success', 'Admin berhasil ditambahkan!');
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
        $judul = 'Edit Data Admin';
        $admin = Admin::findOrFail($nama);
        return view('EDadmin', [
            'admin' => $admin,
            'judul' => $judul
        ]);
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

        $validated = $request->validate([
            'nama' => '|string|max:255',
            'email' => '|email|unique:admin,email,' . $nama . ',nama',
            'password' => 'nullable|string|min:8',
        ]);
        

        $admin = Admin::findOrFail($nama);

        $admin->update([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('DTadmin.index')->with('success', 'Admin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nama)
    {
        $admin = Admin::findOrFail($nama);
        $admin->delete();

        return redirect()->route('DTadmin.index')->with('success', 'Admin berhasil dihapus!');
    }
}
