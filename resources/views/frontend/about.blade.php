@extends('layout.frontend')

@section('title', 'Tentang Kami - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Tentang Kami</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</section>

<!-- About Section Content -->
<section id="about" class="about section py-5">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-3" style="font-size: 0.85rem;">Profil Rental & Gaming Lounge</span>
                    <h2 class="fw-bold mb-3">Solusi Hiburan Gaming Terlengkap & Ternyaman</h2>
                    <p class="lead text-primary fw-semibold">{{ $pengaturan->tagline ?? 'Modern Gaming Lounge & Rental Console' }}</p>
                    <p class="text-muted">
                        <strong>{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}</strong> didirikan dengan dedikasi menghadirkan atmosfer rental PlayStation berkelas di mana para gamer dapat bermain dengan peralatan prima, TV resolusi jernih, dan ruangan ber-AC yang nyaman.
                    </p>
                    <p class="text-muted">
                        {{ $pengaturan->deskripsi ?? 'Kami menyediakan konsol PlayStation 4 dan PlayStation 5 dengan stik original terawat, game-game terbaru, serta opsi rental rumahan bagi Anda yang ingin bermain santai bersama keluarga.' }}
                    </p>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ route('frontend.rooms') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-door-open me-1"></i> Lihat Daftar Ruang
                        </a>
                        <a href="{{ route('frontend.facilities') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                            <i class="bi bi-controller me-1"></i> Cek Fasilitas
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-controller text-primary" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mt-3">Konsol PS4 & PS5</h5>
                            <p class="text-muted small mb-0">Hardware generasi terbaru dengan performa stabil.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-tv text-primary" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mt-3">TV Resolusi 4K</h5>
                            <p class="text-muted small mb-0">Visual tajam dan refresh rate mulus tanpa lag.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-snow text-primary" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mt-3">Ruangan Full AC</h5>
                            <p class="text-muted small mb-0">Suhu sejuk, sofa empuk, bebas gerah.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-4 bg-light rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-shield-check text-primary" style="font-size: 2.5rem;"></i>
                            <h5 class="fw-bold mt-3">Stik Terawat</h5>
                            <p class="text-muted small mb-0">Selalu dibersihkan dan dicek sebelum sesi main.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="row mt-5 pt-4">
            <div class="col-md-6 mb-4">
                <div class="p-4 border rounded-4 shadow-sm h-100 bg-white">
                    <h4 class="fw-bold text-dark mb-3"><i class="bi bi-compass text-primary me-2"></i> Visi Kami</h4>
                    <p class="text-muted mb-0">
                        Menjadi destinasi hiburan rental PlayStation dan gaming lounge nomor satu yang mengedepankan kualitas pelayanan ramah, fasilitas bersih berstandar tinggi, dan harga terjangkau untuk semua kalangan gamer.
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="p-4 border rounded-4 shadow-sm h-100 bg-white">
                    <h4 class="fw-bold text-dark mb-3"><i class="bi bi-bullseye text-primary me-2"></i> Misi Kami</h4>
                    <ul class="text-muted mb-0 ps-3">
                        <li class="mb-2">Menyediakan perangkat konsol dan game resmi paling update secara berkala.</li>
                        <li class="mb-2">Menjaga kebersihan dan kenyamanan area bermain agar bebas asap di area reguler.</li>
                        <li>Memberikan kemudahan reservasi dan pelayanan cepat bagi perental di tempat maupun sewa rumahan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
