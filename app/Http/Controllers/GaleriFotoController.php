<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriFotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'urutan'     => 'nullable|integer',
            'foto'       => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        $data = [
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'urutan'     => $request->urutan ?: (GaleriFoto::max('urutan') + 1),
            'aktif'      => $request->has('aktif') ? 1 : 1,
            'alt_foto'   => $request->judul,
        ];

        if ($request->hasFile('foto')) {
            $uploadPath = public_path('uploads/gallery');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('foto');
            $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['foto'] = 'uploads/gallery/' . $filename;
        }

        GaleriFoto::create($data);

        return redirect()->route('pengaturan-web.index', ['tab' => 'galeri'])
            ->with('pesan', 'Foto galeri baru berhasil ditambahkan dan langsung tampil di frontend!');
    }

    public function update(Request $request, $id)
    {
        $galeri = GaleriFoto::findOrFail($id);

        $request->validate([
            'judul'      => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'urutan'     => 'nullable|integer',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        $data = [
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'urutan'     => $request->urutan ?: $galeri->urutan,
            'aktif'      => $request->has('aktif') ? 1 : 0,
            'alt_foto'   => $request->judul,
        ];

        if ($request->hasFile('foto')) {
            $uploadPath = public_path('uploads/gallery');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('foto');
            $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['foto'] = 'uploads/gallery/' . $filename;
        }

        $galeri->update($data);

        return redirect()->route('pengaturan-web.index', ['tab' => 'galeri'])
            ->with('pesan', 'Item galeri "' . $galeri->judul . '" berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = GaleriFoto::findOrFail($id);
        $judul = $galeri->judul;
        $galeri->delete();

        return redirect()->route('pengaturan-web.index', ['tab' => 'galeri'])
            ->with('pesan', 'Foto galeri "' . $judul . '" berhasil dihapus dari sistem!');
    }
}
