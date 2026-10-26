@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800 font-weight-bold">
            <i class="fas fa-sliders-h text-primary mr-2"></i>Pengaturan Website & Media Frontend
        </h1>
        <p class="text-muted small mb-0">Kelola semua teks, kontak, hero banner, fasilitas, dan foto galeri yang tampil di halaman depan (frontend).</p>
    </div>
    <a href="{{ route('welcome') }}" target="_blank" class="btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-external-link-alt fa-sm text-white-50 mr-1"></i> Buka Tampilan Frontend
    </a>
</div>

@if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session('pesan') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <strong><i class="fas fa-exclamation-triangle mr-2"></i>Perhatian:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Nav Tabs -->
<ul class="nav nav-pills nav-fill mb-4 bg-white p-2 rounded shadow-sm border" id="settingTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link font-weight-bold py-2 {{ $activeTab == 'umum' ? 'active' : '' }}" id="tab-umum-link" data-toggle="pill" href="#tab-umum" role="tab">
            <i class="fas fa-cogs mr-1"></i> 1. Informasi, Hero & Kontak
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link font-weight-bold py-2 {{ $activeTab == 'fasilitas' ? 'active' : '' }}" id="tab-fasilitas-link" data-toggle="pill" href="#tab-fasilitas" role="tab">
            <i class="fas fa-couch mr-1"></i> 2. Kelola Halaman Fasilitas 
            <span class="badge badge-light border text-primary ml-1">{{ $fasilitas->count() }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link font-weight-bold py-2 {{ $activeTab == 'galeri' ? 'active' : '' }}" id="tab-galeri-link" data-toggle="pill" href="#tab-galeri" role="tab">
            <i class="fas fa-images mr-1"></i> 3. Kelola Halaman Galeri Foto
            <span class="badge badge-light border text-info ml-1">{{ $galeri->count() }}</span>
        </a>
    </li>
</ul>

<div class="tab-content" id="settingTabsContent">
    <!-- ================= TAB 1: UMUM & KONTAK ================= -->
    <div class="tab-pane fade {{ $activeTab == 'umum' ? 'show active' : '' }}" id="tab-umum" role="tabpanel">
        <form action="{{ route('pengaturan-web.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Kolom Kiri: Branding & Hero -->
                <div class="col-lg-7">
                    <!-- Card 1: Branding & Identitas -->
                    <div class="card shadow-sm mb-4 border-left-primary">
                        <div class="card-header py-3 bg-white">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-store mr-1"></i> Identitas & Branding Rental
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Rental / Usaha <span class="text-danger">*</span></label>
                                <input type="text" name="nama_rental" class="form-control" 
                                       value="{{ old('nama_rental', $pengaturan->nama_rental) }}" required>
                                <small class="form-text text-muted">Ditampilkan di header navbar, judul web, dan footer.</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tagline / Slogan</label>
                                <input type="text" name="tagline" class="form-control" 
                                       value="{{ old('tagline', $pengaturan->tagline) }}">
                                <small class="form-text text-muted">Contoh: Modern Gaming Lounge & Rental Console</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Singkat Usaha</label>
                                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $pengaturan->deskripsi) }}</textarea>
                                <small class="form-text text-muted">Ditampilkan di meta deskripsi & bagian Tentang Kami / Footer.</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Logo Usaha</label>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="p-2 border rounded mr-3 bg-light text-center" style="min-width: 100px;">
                                        @if($pengaturan->logo && file_exists(public_path($pengaturan->logo)))
                                            <img src="{{ asset($pengaturan->logo) }}" alt="Logo" style="max-height: 50px; max-width: 120px;" class="rounded">
                                        @else
                                            <img src="{{ asset('Backend/img/logo/aya_logo.png') }}" alt="Default Logo" style="max-height: 50px; max-width: 120px;" class="rounded">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" name="logo" class="form-control-file" accept="image/*">
                                        <small class="form-text text-muted">Format: PNG, JPG, WEBP, SVG (Maks. 2MB). Kosongkan jika tidak ingin mengubah.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Hero Banner Utama -->
                    <div class="card shadow-sm mb-4 border-left-info">
                        <div class="card-header py-3 bg-white">
                            <h6 class="m-0 font-weight-bold text-info">
                                <i class="fas fa-image mr-1"></i> Banner & Tampilan Utama Depan (Hero Section)
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Utama (Hero Title)</label>
                                <input type="text" name="hero_title" class="form-control" 
                                       value="{{ old('hero_title', $pengaturan->hero_title) }}">
                                <small class="form-text text-muted">Judul besar yang pertama kali dibaca pengunjung di halaman depan.</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Sub-judul / Penjelasan Promo (Hero Subtitle)</label>
                                <textarea name="hero_subtitle" rows="3" class="form-control">{{ old('hero_subtitle', $pengaturan->hero_subtitle) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Gambar Banner Hero</label>
                                <div class="mb-2">
                                    @if($pengaturan->hero_image && file_exists(public_path($pengaturan->hero_image)))
                                        <img src="{{ asset($pengaturan->hero_image) }}" alt="Hero Banner" class="img-fluid rounded border mb-2" style="max-height: 180px; object-fit: cover; width: 100%;">
                                    @else
                                        <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" alt="Default Banner" class="img-fluid rounded border mb-2" style="max-height: 180px; object-fit: cover; width: 100%;">
                                    @endif
                                </div>
                                <input type="file" name="hero_image" class="form-control-file" accept="image/*">
                                <small class="form-text text-muted">Format: JPG, PNG, WEBP (Maks. 4MB). Kosongkan jika tidak ingin mengubah gambar banner.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Kontak & Jam Operasional -->
                <div class="col-lg-5">
                    <div class="card shadow-sm mb-4 border-left-success">
                        <div class="card-header py-3 bg-white">
                            <h6 class="m-0 font-weight-bold text-success">
                                <i class="fas fa-headset mr-1"></i> Kontak & Jam Operasional
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">
                                    <i class="fab fa-whatsapp text-success mr-1"></i> Nomor WhatsApp (Untuk Chat / Booking)
                                </label>
                                <input type="text" name="whatsapp" class="form-control" 
                                       placeholder="Contoh: 081234567890"
                                       value="{{ old('whatsapp', $pengaturan->whatsapp) }}">
                                <small class="form-text text-muted">Pelanggan di frontend akan otomatis terhubung ke WhatsApp ini saat klik reservasi.</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    <i class="fas fa-phone mr-1"></i> Nomor Telepon Kantor / Kasir
                                </label>
                                <input type="text" name="telepon" class="form-control" 
                                       placeholder="Contoh: +62 812-3456-7890"
                                       value="{{ old('telepon', $pengaturan->telepon) }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    <i class="fas fa-envelope mr-1"></i> Alamat Email Resmi
                                </label>
                                <input type="email" name="email" class="form-control" 
                                       placeholder="Contoh: info@ayaplaystation.com"
                                       value="{{ old('email', $pengaturan->email) }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    <i class="fas fa-clock mr-1"></i> Jam Operasional Rental
                                </label>
                                <input type="text" name="jam_operasional" class="form-control" 
                                       placeholder="Contoh: Senin - Minggu: 09:00 - 24:00 WIB"
                                       value="{{ old('jam_operasional', $pengaturan->jam_operasional) }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    <i class="fas fa-map-marker-alt mr-1"></i> Alamat Fisik / Lokasi Rental
                                </label>
                                <textarea name="alamat" rows="3" class="form-control" placeholder="Tuliskan alamat lengkap...">{{ old('alamat', $pengaturan->alamat) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Card Aksi Simpan -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <p class="text-muted small mb-3">
                                Perubahan data identitas & kontak akan langsung otomatis terhubung dan tampil di halaman depan (frontend).
                            </p>
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-sm font-weight-bold">
                                <i class="fas fa-save mr-2"></i> Simpan Pengaturan Umum
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- ================= TAB 2: KELOLA FASILITAS ================= -->
    <div class="tab-pane fade {{ $activeTab == 'fasilitas' ? 'show active' : '' }}" id="tab-fasilitas" role="tabpanel">
        <div class="card shadow-sm mb-4 border-left-primary">
            <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-couch mr-1"></i> Daftar Fasilitas & Layanan Frontend
                    </h6>
                    <small class="text-muted">Semua fasilitas di bawah ini otomatis tampil di menu <strong>Fasilitas</strong> frontend. Anda bisa menambah, mengedit foto/teks, atau menghapusnya.</small>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-sm shadow-sm font-weight-bold" data-toggle="modal" data-target="#modalTambahFasilitas">
                        <i class="fas fa-plus mr-1"></i> Tambah Fasilitas Baru
                    </button>
                    <a href="{{ route('frontend.facilities') }}" target="_blank" class="btn btn-outline-info btn-sm shadow-sm ml-1">
                        <i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman Fasilitas
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 12%;">Foto</th>
                                <th style="width: 15%;">Kategori / Badge</th>
                                <th style="width: 20%;">Judul Fasilitas</th>
                                <th style="width: 33%;">Deskripsi</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 10%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fasilitas as $index => $item)
                                <tr>
                                    <td class="align-middle font-weight-bold text-muted">{{ $item->urutan ?? ($index + 1) }}</td>
                                    <td class="align-middle">
                                        <div class="rounded border overflow-hidden bg-light text-center" style="width: 90px; height: 60px;">
                                            @if($item->foto && file_exists(public_path($item->foto)))
                                                <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                <img src="{{ $item->getFotoSrc($index) }}" alt="{{ $item->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge badge-primary py-1 px-2 font-weight-normal">{{ $item->label_badge ?? 'Layanan' }}</span>
                                    </td>
                                    <td class="align-middle font-weight-bold text-dark">
                                        {{ $item->judul }}
                                    </td>
                                    <td class="align-middle text-muted small">
                                        {{ Str::limit($item->deskripsi, 120) }}
                                    </td>
                                    <td class="align-middle">
                                        @if($item->aktif)
                                            <span class="badge badge-success px-2 py-1">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary px-2 py-1">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#modalEditFasilitas{{ $item->id }}" title="Edit Fasilitas">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('konten-fasilitas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas: {{ $item->judul }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm shadow-sm ml-1" title="Hapus Fasilitas">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- MODAL EDIT FASILITAS -->
                                <div class="modal fade" id="modalEditFasilitas{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('konten-fasilitas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header bg-warning text-dark font-weight-bold">
                                                    <h5 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit Fasilitas: {{ $item->judul }}</h5>
                                                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Judul Fasilitas <span class="text-danger">*</span></label>
                                                                <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Label / Kategori Badge</label>
                                                                <input type="text" name="label_badge" class="form-control" value="{{ $item->label_badge }}" placeholder="Contoh: Exclusive Room, Food & Beverage">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Deskripsi Fasilitas</label>
                                                                <textarea name="deskripsi" rows="4" class="form-control">{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Foto Saat Ini</label>
                                                                <div class="rounded border p-1 bg-light text-center mb-2">
                                                                    <img src="{{ $item->getFotoSrc($index) }}" alt="Preview" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">
                                                                </div>
                                                                <label class="font-weight-bold">Ganti Foto Baru</label>
                                                                <input type="file" name="foto" class="form-control-file" accept="image/*">
                                                                <small class="text-muted">Biarkan kosong jika tetap menggunakan foto lama.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Urutan Tampil</label>
                                                                <input type="number" name="urutan" class="form-control" value="{{ $item->urutan }}">
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input class="form-check-input" type="checkbox" name="aktif" id="aktifFasilitas{{ $item->id }}" value="1" {{ $item->aktif ? 'checked' : '' }}>
                                                                <label class="form-check-label font-weight-bold" for="aktifFasilitas{{ $item->id }}">
                                                                    Tampilkan di Halaman Frontend
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning font-weight-bold">
                                                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <i class="fas fa-info-circle fa-2x mb-2 text-gray-400"></i><br>
                                        Belum ada fasilitas yang ditambahkan. Klik "Tambah Fasilitas Baru" untuk menambahkan fasilitas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= TAB 3: KELOLA GALERI FOTO ================= -->
    <div class="tab-pane fade {{ $activeTab == 'galeri' ? 'show active' : '' }}" id="tab-galeri" role="tabpanel">
        <div class="card shadow-sm mb-4 border-left-info">
            <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-images mr-1"></i> Daftar Galeri & Dokumentasi Foto
                    </h6>
                    <small class="text-muted">Semua foto di bawah ini otomatis tampil di menu <strong>Galeri</strong> frontend. Anda bisa menambah foto dokumentasi baru, mengubah caption, atau menghapusnya.</small>
                </div>
                <div>
                    <button type="button" class="btn btn-info btn-sm shadow-sm font-weight-bold" data-toggle="modal" data-target="#modalTambahGaleri">
                        <i class="fas fa-plus mr-1"></i> Tambah Foto Galeri
                    </button>
                    <a href="{{ route('frontend.gallery') }}" target="_blank" class="btn btn-outline-primary btn-sm shadow-sm ml-1">
                        <i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman Galeri
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 15%;">Preview Foto</th>
                                <th style="width: 25%;">Judul Foto / Dokumentasi</th>
                                <th style="width: 35%;">Keterangan / Caption Bawah</th>
                                <th style="width: 8%;">Status</th>
                                <th style="width: 12%; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($galeri as $index => $item)
                                <tr>
                                    <td class="align-middle font-weight-bold text-muted">{{ $item->urutan ?? ($index + 1) }}</td>
                                    <td class="align-middle">
                                        <div class="rounded border overflow-hidden bg-light text-center" style="width: 110px; height: 70px;">
                                            <img src="{{ $item->getFotoSrc() }}" alt="{{ $item->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td class="align-middle font-weight-bold text-dark">
                                        {{ $item->judul }}
                                    </td>
                                    <td class="align-middle text-muted">
                                        {{ $item->keterangan ?? '-' }}
                                    </td>
                                    <td class="align-middle">
                                        @if($item->aktif)
                                            <span class="badge badge-success px-2 py-1">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary px-2 py-1">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-warning btn-sm shadow-sm" data-toggle="modal" data-target="#modalEditGaleri{{ $item->id }}" title="Edit Galeri">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('galeri-foto.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto galeri: {{ $item->judul }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm shadow-sm ml-1" title="Hapus Foto">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- MODAL EDIT GALERI -->
                                <div class="modal fade" id="modalEditGaleri{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('galeri-foto.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header bg-warning text-dark font-weight-bold">
                                                    <h5 class="modal-title"><i class="fas fa-edit mr-2"></i>Edit Foto Galeri</h5>
                                                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Judul Foto / Ruangan <span class="text-danger">*</span></label>
                                                        <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Keterangan / Caption Bawah</label>
                                                        <input type="text" name="keterangan" class="form-control" value="{{ $item->keterangan }}" placeholder="Contoh: TV 4K 65 inci & Sofa Recliner">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Foto Saat Ini</label>
                                                        <div class="rounded border p-1 bg-light text-center mb-2">
                                                            <img src="{{ $item->getFotoSrc() }}" alt="Preview" class="img-fluid rounded" style="max-height: 140px; object-fit: cover;">
                                                        </div>
                                                        <label class="font-weight-bold">Ganti Foto Baru</label>
                                                        <input type="file" name="foto" class="form-control-file" accept="image/*">
                                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Urutan Tampil</label>
                                                        <input type="number" name="urutan" class="form-control" value="{{ $item->urutan }}">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input class="form-check-input" type="checkbox" name="aktif" id="aktifGaleri{{ $item->id }}" value="1" {{ $item->aktif ? 'checked' : '' }}>
                                                        <label class="form-check-label font-weight-bold" for="aktifGaleri{{ $item->id }}">
                                                            Tampilkan di Halaman Galeri Frontend
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning font-weight-bold">
                                                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fas fa-image fa-2x mb-2 text-gray-400"></i><br>
                                        Belum ada foto galeri yang ditambahkan. Klik "Tambah Foto Galeri" untuk mengunggah foto baru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH FASILITAS ================= -->
<div class="modal fade" id="modalTambahFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('konten-fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white font-weight-bold">
                    <h5 class="modal-title"><i class="fas fa-plus-circle mr-2"></i>Tambah Fasilitas Baru Frontend</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Fasilitas <span class="text-danger">*</span></label>
                                <input type="text" name="judul" class="form-control" placeholder="Contoh: Ruang VIP Gaming Sanctuary" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Label / Kategori Badge</label>
                                <input type="text" name="label_badge" class="form-control" placeholder="Contoh: Exclusive Room, Food & Beverage, Kenyamanan">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Fasilitas</label>
                                <textarea name="deskripsi" rows="4" class="form-control" placeholder="Jelaskan detail fasilitas yang ditawarkan..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Upload Foto Fasilitas</label>
                                <input type="file" name="foto" class="form-control-file" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 4MB).</small>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Urutan Tampil</label>
                                <input type="number" name="urutan" class="form-control" value="{{ $fasilitas->count() + 1 }}">
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="aktif" id="aktifTambahFasilitas" value="1" checked>
                                <label class="form-check-label font-weight-bold" for="aktifTambahFasilitas">
                                    Langsung Tampilkan di Frontend
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-check mr-1"></i> Tambahkan Fasilitas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL TAMBAH GALERI ================= -->
<div class="modal fade" id="modalTambahGaleri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('galeri-foto.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-info text-white font-weight-bold">
                    <h5 class="modal-title"><i class="fas fa-plus-circle mr-2"></i>Tambah Foto Galeri Baru</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Foto / Ruangan <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Ruang VIP Gaming Lounge" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Keterangan / Caption Bawah</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Contoh: TV 4K 65 inci & Sofa Recliner">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Upload File Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 4MB).</small>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Urutan Tampil</label>
                        <input type="number" name="urutan" class="form-control" value="{{ $galeri->count() + 1 }}">
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="aktif" id="aktifTambahGaleri" value="1" checked>
                        <label class="form-check-label font-weight-bold" for="aktifTambahGaleri">
                            Langsung Tampilkan di Halaman Galeri
                        </label>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info font-weight-bold">
                        <i class="fas fa-upload mr-1"></i> Unggah Foto Galeri
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
