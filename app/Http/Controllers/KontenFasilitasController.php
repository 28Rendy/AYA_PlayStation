<?php

namespace App\Http\Controllers;

use App\Models\KontenFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KontenFasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'label_badge' => 'nullable|string|max:100',
            'deskripsi'   => 'nullable|string',
            'urutan'      => 'nullable|integer',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        $data = [
            'judul'       => $request->judul,
            'label_badge' => $request->label_badge ?: 'Layanan Kami',
            'deskripsi'   => $request->deskripsi,
            'urutan'      => $request->urutan ?: (KontenFasilitas::max('urutan') + 1),
            'aktif'       => $request->has('aktif') ? 1 : 1,
            'alt_foto'    => $request->judul,
        ];

        if ($request->hasFile('foto')) {
            $uploadPath = public_path('uploads/facilities');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('foto');
            $filename = 'facility_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['foto'] = 'uploads/facilities/' . $filename;
        }

        KontenFasilitas::create($data);

        return redirect()->route('pengaturan-web.index', ['tab' => 'fasilitas'])
            ->with('pesan', 'Fasilitas baru berhasil ditambahkan dan langsung aktif di frontend!');
    }

    public function update(Request $request, $id)
    {
        $fasilitas = KontenFasilitas::findOrFail($id);

        $request->validate([
            'judul'       => 'required|string|max:255',
            'label_badge' => 'nullable|string|max:100',
            'deskripsi'   => 'nullable|string',
            'urutan'      => 'nullable|integer',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
        ]);

        $data = [
            'judul'       => $request->judul,
            'label_badge' => $request->label_badge ?: $fasilitas->label_badge,
            'deskripsi'   => $request->deskripsi,
            'urutan'      => $request->urutan ?: $fasilitas->urutan,
            'aktif'       => $request->has('aktif') ? 1 : 0,
            'alt_foto'    => $request->judul,
        ];

        if ($request->hasFile('foto')) {
            $uploadPath = public_path('uploads/facilities');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            $file = $request->file('foto');
            $filename = 'facility_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $data['foto'] = 'uploads/facilities/' . $filename;
        }

        $fasilitas->update($data);

        return redirect()->route('pengaturan-web.index', ['tab' => 'fasilitas'])
            ->with('pesan', 'Data fasilitas "' . $fasilitas->judul . '" berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $fasilitas = KontenFasilitas::findOrFail($id);
        $judul = $fasilitas->judul;
        $fasilitas->delete();

        return redirect()->route('pengaturan-web.index', ['tab' => 'fasilitas'])
            ->with('pesan', 'Fasilitas "' . $judul . '" berhasil dihapus dari sistem frontend!');
    }
}
