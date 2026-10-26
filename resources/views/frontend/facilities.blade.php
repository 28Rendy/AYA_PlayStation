@extends('layout.frontend')

@section('title', 'Fasilitas & Layanan - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Fasilitas & Layanan Unggulan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Facilities Content Section -->
<section id="facilities" class="team section py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-2">Kenyamanan Terbaik</span>
            <h2 class="fw-bold">Fasilitas Lengkap untuk Kenyamanan Gaming Maksimal</h2>
            <p class="text-muted col-lg-8 mx-auto">Kami tidak hanya menyewakan PlayStation, tetapi menghadirkan suasana santai dan fasilitas pendukung terlengkap untuk Anda.</p>
        </div>

        <div class="row gy-4 mb-4">
            @forelse($daftar_fasilitas as $index => $item)
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="{{ (($index % 4) + 1) * 100 }}">
                    <div class="facility-card h-100 shadow-sm rounded-4 overflow-hidden border bg-white d-flex flex-column">
                        <div class="pic position-relative" style="height: 250px; overflow: hidden; background: #111;">
                            <img src="{{ $item->getFotoSrc($index) }}" alt="{{ $item->alt_foto ?? $item->judul }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;">
                            <span class="position-absolute top-0 end-0 m-3 badge bg-primary px-3 py-2 rounded-pill shadow-sm">
                                {{ $item->label_badge ?? 'Layanan' }}
                            </span>
                        </div>
                        <div class="content p-4 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="font-weight-bold fw-bold mb-2 text-dark">{{ $item->judul }}</h4>
                                <p class="text-muted small mb-0" style="line-height: 1.6;">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data fasilitas yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

        <!-- Banner Kontak & Booking Cepat -->
        <div class="mt-5 p-4 rounded-4 shadow-sm text-center text-md-start d-md-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); color: white;">
            <div class="mb-3 mb-md-0">
                <h4 class="fw-bold mb-1 text-white">Ingin Menikmati Fasilitas Kami?</h4>
                <p class="mb-0 text-white-50">Hubungi kami sekarang untuk reservasi ruangan atau sewa konsol rumahan.</p>
            </div>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengaturan->whatsapp ?? '6281234567890') }}?text={{ urlencode('Halo ' . ($pengaturan->nama_rental ?? 'AYA PlayStation') . ', saya ingin bertanya mengenai fasilitas dan reservasi ruang.') }}" target="_blank" class="btn btn-light btn-lg px-4 font-weight-bold shadow-sm" style="color: #0d6efd; font-weight: 600;">
                <i class="bi bi-whatsapp me-2"></i> Hubungi WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
