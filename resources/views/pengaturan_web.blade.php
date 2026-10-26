@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
        <i class="fas fa-sliders-h text-primary mr-2"></i>Pengaturan Website & Media Frontend
    </h1>
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
                        Perubahan data dan media akan langsung otomatis terhubung dan tampil di halaman depan (frontend).
                    </p>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-sm">
                        <i class="fas fa-save mr-2"></i> Simpan Semua Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
