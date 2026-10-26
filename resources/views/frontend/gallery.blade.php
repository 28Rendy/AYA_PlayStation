@extends('layout.frontend')

@section('title', 'Galeri Foto - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Galeri & Dokumentasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Gallery Section Content -->
<section id="gallery" class="gallery section py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-2">Dokumentasi</span>
            <h2 class="fw-bold">Potret Suasana & Peralatan Kami</h2>
            <p class="text-muted col-lg-8 mx-auto">Klik pada foto untuk melihat tampilan resolusi penuh melalui galeri interaktif.</p>
        </div>

        <div class="row g-4">
            @forelse($daftar_galeri as $index => $item)
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ (($index % 6) + 1) * 100 }}">
                    <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative border bg-white">
                        <a href="{{ $item->getFotoSrc() }}" class="glightbox" data-gallery="images-gallery">
                            <img src="{{ $item->getFotoSrc() }}" alt="{{ $item->alt_foto ?? $item->judul }}" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                            <div class="p-3 bg-white">
                                <h6 class="fw-bold mb-1 text-dark">{{ $item->judul }}</h6>
                                <small class="text-muted">{{ $item->keterangan ?? 'Dokumentasi AYA PlayStation' }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada foto dalam galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
