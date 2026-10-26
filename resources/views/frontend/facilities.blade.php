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
            <p class="text-muted col-lg-8 mx-auto">Kami tidak hanya menyewakan PlayStation, tetapi menghadirkan suasana santai dan fasilitas pendukung terlengkap.</p>
        </div>

        <div class="row gy-4 mb-5">
            <!-- Fasilitas 1: VIP Lounge -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="facility-card">
                    <div class="pic">
                        <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" alt="Ruang VIP Gaming Lounge">
                    </div>
                    <div class="content">
                        <span class="facility-badge">Exclusive Room</span>
                        <h4 class="font-weight-bold">Ruang VIP Gaming Sanctuary</h4>
                        <p class="text-muted small">Nikmati sesi mabar privat dengan sofa recliner mewah, Smart TV 4K 65 inci, tata cahaya neon ambient, dan tata suara soundbar imersif untuk kenyamanan maksimal bersama kawan terdekat.</p>
                    </div>
                </div>
            </div>

            <!-- Fasilitas 2: Cafe & Snack -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="facility-card">
                    <div class="pic">
                        <img src="{{ asset('Frontend/img/facilities/cafe_snack.jpg') }}" alt="Arcade & Snack Bar">
                    </div>
                    <div class="content">
                        <span class="facility-badge">Food & Beverage</span>
                        <h4 class="font-weight-bold">Arcade & Chill Snack Bar</h4>
                        <p class="text-muted small">Tersedia aneka minuman dingin segar, kopi pilihan, mie instan hangat, dan beragam camilan lezat yang siap diantar langsung ke meja Anda tanpa mengganggu jalannya permainan.</p>
                    </div>
                </div>
            </div>

            <!-- Fasilitas 3: Turnamen -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-card">
                    <div class="pic">
                        <img src="{{ asset('Frontend/img/facilities/tournament.jpg') }}" alt="Esports Tournament">
                    </div>
                    <div class="content">
                        <span class="facility-badge">Community & Esports</span>
                        <h4 class="font-weight-bold">Turnamen & Komunitas Gamers</h4>
                        <p class="text-muted small">Wadah kompetisi berkala untuk game-game kompetitif seperti eFootball, EA Sports FC, Tekken, dan Mortal Kombat dengan hadiah menarik dan atmosfer seru bersama komunitas lokal.</p>
                    </div>
                </div>
            </div>

            <!-- Fasilitas 4: Rental Rumahan -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="facility-card">
                    <div class="pic">
                        <img src="{{ asset('Frontend/img/facilities/rental_kit.jpg') }}" alt="Home Rental Package">
                    </div>
                    <div class="content">
                        <span class="facility-badge">Home Delivery</span>
                        <h4 class="font-weight-bold">Paket Rental Konsol Rumahan</h4>
                        <p class="text-muted small">Ingin main di rumah bareng keluarga? Kami menyediakan sewa unit PS4 & PS5 harian lengkap dengan tas koper protektif, 2 stik wireless, dan bundle game favorit siap main.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fasilitas Pendukung Lainnya -->
        <div class="section-title text-center mb-4 mt-5">
            <h3 class="fw-bold">Fasilitas Pendukung Kenyamanan</h3>
        </div>

        <div class="row gy-4 align-items-center mb-4">
            <div class="col-md-5">
                <img src="{{ asset('Frontend/img/Ruangan1.jpg') }}" class="img-fluid rounded-4 shadow" alt="Ruangan Reguler">
            </div>
            <div class="col-md-7">
                <h4 class="fw-bold">Ruangan Bermain Nyaman & Bersih</h4>
                <p class="text-muted">Setiap ruangan dirancang khusus agar Anda dapat fokus menikmati permainan favorit tanpa gangguan.</p>
                <ul class="text-muted">
                    <li>Pilihan kapasitas ruangan 1 hingga 3 pemain.</li>
                    <li>Pendingin ruangan (AC) yang sejuk, bersih, dan harum.</li>
                    <li>Koneksi internet cepat untuk update game multiplayer online.</li>
                </ul>
            </div>
        </div>

        <div class="row gy-4 align-items-center mb-4">
            <div class="col-md-5 order-md-2">
                <img src="{{ asset('Frontend/img/mushola.jpg') }}" class="img-fluid rounded-4 shadow" alt="Mushola">
            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="fw-bold">Mushola Bersih & Tempat Wudhu</h4>
                <p class="text-muted">Ibadah tetap terjaga saat asyik bermain bersama kawan-kawan. Kami menyediakan mushola yang bersih, tenang, dan terawat dilengkapi dengan sarana wudhu yang memadai.</p>
            </div>
        </div>

        <div class="row gy-4 align-items-center">
            <div class="col-md-5">
                <img src="{{ asset('Frontend/img/smooking.jpg') }}" class="img-fluid rounded-4 shadow" alt="Smoking Area">
            </div>
            <div class="col-md-7">
                <h4 class="fw-bold">Area Merokok Terpisah (Outdoor/Semi-Outdoor)</h4>
                <p class="text-muted">Area santai khusus merokok dengan sirkulasi udara terbuka yang baik, sehingga ruangan reguler tetap bebas asap dan nyaman bagi semua pengunjung.</p>
            </div>
        </div>

    </div>
</section>
@endsection
