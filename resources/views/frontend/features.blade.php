@extends('layout.frontend')

@section('title', 'Keunggulan Kami - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Keunggulan Kami</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keunggulan</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Features Section Content -->
<section id="keunggulan" class="features section py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-2">Kenapa Memilih Kami</span>
            <h2 class="fw-bold">Standar Kualitas Tertinggi untuk Pengalaman Mabar Terbaik</h2>
            <p class="text-muted col-lg-8 mx-auto">Kami memahami kebutuhan para gamer akan peralatan yang responsif, visual tajam, dan suasana ruangan yang mendukung fokus permainan.</p>
        </div>

        <div class="row gy-4">
            <!-- 1. Stik Original -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-controller text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Konsol & Stik Original</h5>
                    <p class="text-muted small">Unit PS4 & PS5 terawat dengan DualSense responsif, bebas masalah drift, dan minim delay input.</p>
                </div>
            </div>

            <!-- 2. TV 4K -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-tv text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Smart TV 4K Jernih</h5>
                    <p class="text-muted small">Layar resolusi tinggi dengan refresh rate mulus dan warna hidup — setiap detail game terlihat sempurna.</p>
                </div>
            </div>

            <!-- 3. Full AC -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-snow text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Ruangan Dingin & Nyaman</h5>
                    <p class="text-muted small">AC penuh, sofa empuk, bebas asap rokok di ruang reguler — mabar berjam-jam tetap segar tanpa gerah.</p>
                </div>
            </div>

            <!-- 4. Rental Rumahan -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-box-seam text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Rental Unit Rumahan</h5>
                    <p class="text-muted small">Sewa unit konsol harian lengkap dengan hardcase pelindung, kabel HDMI, power, dan 2 stik wireless.</p>
                </div>
            </div>

            <!-- 5. Internet Cepat -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-wifi text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Koneksi Internet Cepat</h5>
                    <p class="text-muted small">WiFi stabil untuk update live skuad eFootball, FC 24/25, dan online multiplayer tanpa lag.</p>
                </div>
            </div>

            <!-- 6. Game Terupdate -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-disc text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Katalog Game Lengkap</h5>
                    <p class="text-muted small">Koleksi game genre sports, action-adventure, fighting, hingga racing selalu diperbarui.</p>
                </div>
            </div>

            <!-- 7. Makanan & Minuman -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="700">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-cup-hot text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Snack & Coffee Bar</h5>
                    <p class="text-muted small">Layanan antar minuman dingin, kopi, dan mie instan langsung ke meja saat bermain.</p>
                </div>
            </div>

            <!-- 8. Mushola & Parkir -->
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="800">
                <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100 border-top border-4 border-primary" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                    <div class="mb-3">
                        <i class="bi bi-p-square text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold">Parkir & Fasilitas Lengkap</h5>
                    <p class="text-muted small">Area parkir motor & mobil aman, mushola bersih untuk ibadah, dan area smoking terpisah.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('frontend.rooms') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
                <i class="bi bi-door-open me-2"></i> Pilih Ruangan & Pesan Sekarang
            </a>
        </div>
    </div>
</section>
@endsection
