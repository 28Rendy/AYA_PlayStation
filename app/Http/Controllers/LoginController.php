<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Form untuk membuat admin baru (jika dibutuhkan)
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {}

    public function login_proses(Request $request)
    {
        // Melakukan validasi pada input yang diterima
        $request->validate([
            'email' => 'required',  // Email wajib diisi
            'password' => 'required',  // Password wajib diisi
        ]);
    
        // Mencari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();
    
        // Mengecek apakah admin ditemukan dan password cocok
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Jika login berhasil, login menggunakan Auth
            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        } else {
            // Jika login gagal, redirect kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('failed', 'Email atau password salah');
        }
    }
    
    public function register()
    {
        return view('auth.register');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */

    public function register_proses(request $request)
    {
        // Melakukan validasi pada input yang diterima
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

        // Setelah registrasi, otomatis login menggunakan kredensial yang baru saja didaftarkan
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Mengecek kredensial pengguna baru menggunakan Auth::attempt()
        if (auth::attempt($login)) {
            // Jika login berhasil, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika login gagal, redirect kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('failed', 'email atau password salah');
        }
    }


    public function show($nama)
    {
        $admin = Admin::findOrFail($nama);
        return view('admin.show', compact('admin'));
    }

    public function logout()
    {
        Auth::logout(); // Log out the user
        request()->session()->invalidate(); // Invalidate the session
        request()->session()->regenerateToken(); // Regenerate CSRF token
        return redirect('/login'); // Redirect to login page
    }
    
    




    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */
    public function edit($nama)
    {
        $admin = Admin::findOrFail($nama);
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nama)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:admin,email,' . $nama . ',nama',
            'password' => 'nullable|string|min:8',
        ]);

        $admin = Admin::findOrFail($nama);

        $admin->update([
            'email' => $validated['email'],
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */
    public function destroy($nama)
    {
        $admin = Admin::findOrFail($nama);
        $admin->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil dihapus!');
    }
}
