<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use App\Models\KontenFasilitas;
use App\Models\PengaturanWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengaturanWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $judul = 'Pengaturan Website & Media';
        $pengaturan = PengaturanWeb::getSettings();
        $fasilitas = KontenFasilitas::orderBy('urutan')->get();
        $galeri = GaleriFoto::orderBy('urutan')->get();
        $activeTab = request()->get('tab', 'umum');

        return view('pengaturan_web', compact('pengaturan', 'judul', 'fasilitas', 'galeri', 'activeTab'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_rental'      => 'required|string|max:255',
            'tagline'          => 'nullable|string|max:255',
            'deskripsi'        => 'nullable|string',
            'hero_title'       => 'nullable|string|max:255',
            'hero_subtitle'    => 'nullable|string',
            'telepon'          => 'nullable|string|max:50',
            'whatsapp'         => 'nullable|string|max:50',
            'email'            => 'nullable|string|max:100',
            'alamat'           => 'nullable|string',
            'jam_operasional'  => 'nullable|string|max:255',
            'logo'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hero_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        $pengaturan = PengaturanWeb::getSettings();

        $data = [
            'nama_rental'     => $request->nama_rental,
            'tagline'         => $request->tagline,
            'deskripsi'       => $request->deskripsi,
            'hero_title'      => $request->hero_title,
            'hero_subtitle'   => $request->hero_subtitle,
            'telepon'         => $request->telepon,
            'whatsapp'        => $request->whatsapp,
            'email'           => $request->email,
            'alamat'          => $request->alamat,
            'jam_operasional' => $request->jam_operasional,
        ];

        // Ensure upload directory exists
        $uploadPath = public_path('uploads/settings');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['logo'] = 'uploads/settings/' . $filename;
        }

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['hero_image'] = 'uploads/settings/' . $filename;
        }

        $pengaturan->update($data);

        return redirect()->route('pengaturan-web.index', ['tab' => 'umum'])
            ->with('pesan', 'Pengaturan website dan media berhasil disimpan & diperbarui di frontend!');
    }
}
