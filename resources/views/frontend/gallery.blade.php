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
            <!-- Item 1 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" alt="VIP Gaming Lounge" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Ruang VIP Gaming Lounge</h6>
                            <small class="text-muted">TV 4K 65" & Sofa Recliner</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/facilities/cafe_snack.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/facilities/cafe_snack.jpg') }}" alt="Snack & Coffee Bar" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Chill Snack & Drink Bar</h6>
                            <small class="text-muted">Aneka Camilan & Kopi Dingin</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/facilities/tournament.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/facilities/tournament.jpg') }}" alt="Turnamen Esports" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Turnamen Komunitas Gaming</h6>
                            <small class="text-muted">Kompetisi eFootball & Tekken</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/facilities/rental_kit.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/facilities/rental_kit.jpg') }}" alt="Paket Rental Rumahan" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Paket Sewa Unit Rumahan</h6>
                            <small class="text-muted">Hardcase & 2 Stik Wireless</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/Ruangan1.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/Ruangan1.jpg') }}" alt="Ruang Reguler AC" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Ruang Mabar Reguler AC</h6>
                            <small class="text-muted">Sejuk, Bersih, dan Tenang</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-item rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                    <a href="{{ asset('Frontend/img/ps4.jpg') }}" class="glightbox" data-gallery="images-gallery">
                        <img src="{{ asset('Frontend/img/ps4.jpg') }}" alt="Konsol & DualShock" class="img-fluid w-100" style="height: 260px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold mb-1 text-dark">Perangkat Konsol Original</h6>
                            <small class="text-muted">Responsif dan Terawat Prima</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
