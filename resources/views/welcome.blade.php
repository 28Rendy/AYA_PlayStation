<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AYA PlayStation - Modern Gaming Lounge & Rental Console</title>
    <meta name="description" content="Layanan rental PlayStation 4 & PlayStation 5 terbaik, gaming lounge ber-AC dengan ruang VIP dan sewa konsol harian terpercaya.">
    <meta name="keywords" content="rental ps, rental playstation, ps4, ps5, gaming lounge, sewa ps">

    <!-- Favicons -->
    <link href="{{ asset('Frontend/img/aya_logo.png') }}" rel="icon">
    <link href="{{ asset('Frontend/img/aya_logo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('Frontend/css/main.css') }}" rel="stylesheet">
</head>

<style>
    button {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;
        padding: 10px 30px;
        transition: 0.4s;
        border-radius: 50px;
    }

    button:hover {
        background: color-mix(in srgb, var(--accent-color), transparent 25%);
    }

    .pic img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
    }

    .facility-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .facility-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 40px rgba(0,0,0,0.15);
    }

    .facility-card .content {
        padding: 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .facility-badge {
        display: inline-block;
        padding: 4px 12px;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        border-radius: 20px;
        font-size: 0.82rem;
        font-weight: 600;
        margin-bottom: 12px;
    }
</style>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('Frontend/img/aya_logo.png') }}" alt="AYA PlayStation" style="max-height: 44px; margin-right: 12px; border-radius: 10px;">
                <h1 class="sitename">AYA PlayStation</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#keunggulan">Keunggulan</a></li>
                    <li><a href="#details">Fasilitas</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#pricing">Daftar Ruang</a></li>
                    @if(Auth::guard('admin')->check())
                        <li><a href="{{ route('dashboard') }}" style="color: #2563eb; font-weight: 700;"><i class="bi bi-speedometer2"></i> Dashboard Admin</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();" style="color: #dc2626;">Keluar</a>
                            <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    @elseif(Auth::guard('web')->check())
                        <li><a href="{{ route('pelanggan.dashboard') }}" style="color: #2563eb; font-weight: 700;"><i class="bi bi-person-circle"></i> Portal Saya ({{ Auth::user()->name }})</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();" style="color: #dc2626;">Keluar</a>
                            <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-5 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" class="img-fluid rounded-4 shadow-lg animated" alt="AYA PlayStation Lounge" style="border-radius: 20px; border: 2px solid rgba(255,255,255,0.1);">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h1>Nikmati Sensasi Bermain Di <span>AYA PlayStation</span></h1>
                        <p>Lounge Gaming Modern & Rental PlayStation Terpercaya. Konsol PS4 & PS5 dengan TV 4K, Game Terbaru, Ruang VIP Ber-AC, dan Pelayanan Ramah.</p>
                        <div class="d-flex">
                            <a href="#pricing" class="btn-get-started">Pesan Ruangan</a>
                            <a href="#facilities" class="btn-watch-video d-flex align-items-center ms-3"><i class="bi bi-controller"></i><span>Lihat Fasilitas</span></a>
                        </div>
                    </div>

                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">

                    <div class="col-xl-5 content">
                        <h3>Tentang Kami</h3>
                        <h2>Lounge Gaming Modern untuk Pengalaman Tanpa Batas</h2>
                        <p><strong>AYA PlayStation</strong> adalah pusat hiburan gaming dan penyewaan konsol modern yang berdedikasi memberikan pengalaman bermain terbaik bagi para gamer. Kami menyediakan konsol PlayStation 4 dan PlayStation 5 generasi terbaru, kontroler original yang terawat prima, serta katalog game terpopuler dan terupdate.</p>
                        <p>Dengan atmosfer ruangan yang bersih, sejuk, dan dilengkapi fasilitas pendukung lengkap, AYA PlayStation siap menjadi tempat mabar favorit Anda bersama sahabat dan komunitas.</p>
                        <a href="#facilities" class="read-more"><span>Pelajari Fasilitas</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <!-- Keunggulan 1 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box text-center p-4 shadow-sm rounded-4 bg-white">
                                    <i class="bi bi-controller text-primary" style="font-size: 2.5rem;"></i>
                                    <h4 class="mt-3 font-weight-bold">Konsol & Stik Original</h4>
                                    <p class="text-muted small">Unit PS4 & PS5 dengan stik DualSense responsif dan minim delay.</p>
                                </div>
                            </div>

                            <!-- Keunggulan 2 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box text-center p-4 shadow-sm rounded-4 bg-white">
                                    <i class="bi bi-tv text-primary" style="font-size: 2.5rem;"></i>
                                    <h4 class="mt-3 font-weight-bold">Smart TV 4K Jernih</h4>
                                    <p class="text-muted small">Layar monitor & TV beresolusi tinggi dengan refresh rate mulus dan warna hidup.</p>
                                </div>
                            </div>

                            <!-- Keunggulan 3 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box text-center p-4 shadow-sm rounded-4 bg-white">
                                    <i class="bi bi-snow text-primary" style="font-size: 2.5rem;"></i>
                                    <h4 class="mt-3 font-weight-bold">Ruangan Dingin & Nyaman</h4>
                                    <p class="text-muted small">Ruang ber-AC penuh dengan sofa empuk, bebas asap rokok di ruang reguler.</p>
                                </div>
                            </div>

                            <!-- Keunggulan 4 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box text-center p-4 shadow-sm rounded-4 bg-white">
                                    <i class="bi bi-box-seam text-primary" style="font-size: 2.5rem;"></i>
                                    <h4 class="mt-3 font-weight-bold">Rental Unit Rumahan</h4>
                                    <p class="text-muted small">Layanan sewa unit konsol harian lengkap dengan hardcase pelindung dan kabel.</p>
                                </div>
                            </div>

                        </div> <!-- End Row -->
                    </div> <!-- End Column -->

                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Keunggulan Section (separate anchor) -->
        <section id="keunggulan" class="features section light-background">

            <div class="container section-title" data-aos="fade-up">
                <h2>Keunggulan Kami</h2>
                <div><span>Mengapa Memilih</span> <span class="description-title">AYA PlayStation?</span></div>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100" style="border-top: 4px solid #0d6efd; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                            <i class="bi bi-controller text-primary" style="font-size: 3rem;"></i>
                            <h5 class="mt-3 fw-bold">Konsol & Stik Original</h5>
                            <p class="text-muted small">Unit PS4 & PS5 bergaransi dengan DualSense responsif, minim delay, dan bebas masalah disconnect.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100" style="border-top: 4px solid #0d6efd; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                            <i class="bi bi-tv text-primary" style="font-size: 3rem;"></i>
                            <h5 class="mt-3 fw-bold">Smart TV 4K Jernih</h5>
                            <p class="text-muted small">Layar HD dengan refresh rate tinggi dan warna hidup — setiap detail game terlihat sempurna.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100" style="border-top: 4px solid #0d6efd; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                            <i class="bi bi-snow text-primary" style="font-size: 3rem;"></i>
                            <h5 class="mt-3 fw-bold">Ruangan Dingin & Nyaman</h5>
                            <p class="text-muted small">AC penuh, sofa empuk, bebas asap — nikmati gaming maraton tanpa gangguan selama berjam-jam.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm h-100" style="border-top: 4px solid #0d6efd; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                            <i class="bi bi-box-seam text-primary" style="font-size: 3rem;"></i>
                            <h5 class="mt-3 fw-bold">Rental Unit Rumahan</h5>
                            <p class="text-muted small">Sewa konsol harian — lengkap dengan hardcase pelindung, kabel, dan 2 stik wireless.</p>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Keunggulan Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 text-center justify-content-center">
                    <!-- Total Ruang -->
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-door-open text-primary mb-2" style="font-size: 2rem;"></i>
                        <div class="stats-item">
                            <span class="fs-2 fw-bold text-dark">4 Ruangan</span>
                            <p class="text-muted">Pilihan Ruang Reguler & VIP</p>
                        </div>
                    </div>

                    <!-- Playstation -->
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-controller text-primary mb-2" style="font-size: 2rem;"></i>
                        <div class="stats-item">
                            <span class="fs-2 fw-bold text-dark">PS4 & PS5</span>
                            <p class="text-muted">Konsol Generasi Terbaru</p>
                        </div>
                    </div>

                    <!-- Riwayat Total Perental -->
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-people text-primary mb-2" style="font-size: 2rem;"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $data_perental }}"
                                data-purecounter-duration="1" class="purecounter fs-2 fw-bold text-dark"></span>
                            <p class="text-muted">Total Sesi Transaksi Terlayani</p>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Details Section -->
        <section id="details" class="details section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Fasilitas Pendukung</h2>
                <div><span>Kenyamanan Ekstra di</span> <span class="description-title">AYA PlayStation</span></div>
            </div>

            <div class="container">

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('Frontend/img/Ruangan1.jpg') }}" class="img-fluid rounded-4 shadow" alt="Ruangan">
                    </div>
                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                        <h3>Ruangan Bermain Nyaman & Bersih</h3>
                        <p class="fst-italic">
                            Setiap ruangan dirancang khusus agar Anda dapat fokus menikmati permainan favorit tanpa gangguan.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Tersedia pilihan ruangan kapasitas 1 hingga 3 pemain.</span></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Dilengkapi pendingin ruangan (AC) yang sejuk dan bersih.</span></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Koneksi internet stabil untuk download update dan game multiplayer online.</span></li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('Frontend/img/mushola.jpg') }}" class="img-fluid rounded-4 shadow" alt="Mushola">
                    </div>
                    <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
                        <h3>Fasilitas Mushola Bersih & Tenang</h3>
                        <p class="fst-italic">
                            Ibadah tetap terjaga saat asyik bermain bersama kawan-kawan.
                        </p>
                        <p>
                            Kami menyediakan mushola yang bersih, tenang, dan terawat dilengkapi dengan sarana wudhu yang memadai, sehingga Anda dapat menunaikan ibadah dengan khusyuk kapan saja.
                        </p>
                    </div>
                </div>

                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
                        <img src="{{ asset('Frontend/img/smooking.jpg') }}" class="img-fluid rounded-4 shadow" alt="Ruang Merokok">
                    </div>
                    <div class="col-md-7" data-aos="fade-up">
                        <h3>Area Merokok Terpisah</h3>
                        <p class="fst-italic">Area santai khusus merokok dengan sirkulasi udara yang baik tanpa mengganggu area bermain reguler.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Ventilasi udara terbuka yang segar dan luas.</span></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Meja dan kursi santai untuk istirahat antar ronde game.</span></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <span>Menjaga ruangan utama tetap wangi dan bebas asap.</span></li>
                        </ul>
                    </div>
                </div>

            </div>

        </section><!-- /Details Section -->

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Galeri</h2>
                <div><span>Lihat Suasana</span> <span class="description-title">Lounge Kami</span></div>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item rounded-3 overflow-hidden shadow-sm">
                            <a href="{{ asset('Frontend/img/ps4.jpg') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('Frontend/img/ps4.jpg') }}" alt="PS4 Console" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item rounded-3 overflow-hidden shadow-sm">
                            <a href="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" alt="VIP Room" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item rounded-3 overflow-hidden shadow-sm">
                            <a href="{{ asset('Frontend/img/facilities/cafe_snack.jpg') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('Frontend/img/facilities/cafe_snack.jpg') }}" alt="Snack Bar" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item rounded-3 overflow-hidden shadow-sm">
                            <a href="{{ asset('Frontend/img/facilities/rental_kit.jpg') }}" class="glightbox" data-gallery="images-gallery">
                                <img src="{{ asset('Frontend/img/facilities/rental_kit.jpg') }}" alt="Rental Kit" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Gallery Section -->

        <!-- Facilities Section (Overhauled from Team Section) -->
        <section id="facilities" class="team section light-background">

            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan Unggulan</h2>
                <div><span>Fasilitas & Layanan Eksklusif</span> <span class="description-title">AYA PlayStation</span></div>
            </div>

            <div class="container">
                <div class="row gy-4">

                    <!-- Fasilitas 1: VIP Lounge -->
                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="facility-card">
                            <div class="pic">
                                <img src="{{ asset('Frontend/img/facilities/vip_lounge.jpg') }}" alt="Ruang VIP Gaming Lounge">
                            </div>
                            <div class="content">
                                <span class="facility-badge">Exclusive Room</span>
                                <h4 class="font-weight-bold">Ruang VIP Gaming Sanctuary</h4>
                                <p class="text-muted small">Nikmati sesi mabar privat dengan sofa recliner mewah, Smart TV 4K 65 inci, tata cahaya neon ambient, dan tata suara soundbar imersif untuk kenyamanan maksimal.</p>
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
                                <p class="text-muted small">Tersedia aneka minuman dingin segar, kopi pilihan, mie instan hangat, dan beragam camilan lezat yang siap diantar langsung ke ruangan Anda saat bermain.</p>
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
                                <p class="text-muted small">Wadah kompetisi berkala untuk game-game kompetitif seperti eFootball, EA Sports FC, Tekken, dan Mortal Kombat dengan hadiah menarik dan atmosfer seru.</p>
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
                                <p class="text-muted small">Ingin main di rumah bareng keluarga? Kami menyediakan sewa unit PS4 & PS5 harian lengkap dengan tas koper protektif, 2 stik wireless, dan bundle game favorit.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Facilities Section -->

        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Tarif Ruangan</h2>
                <div><span>Pilih Ruangan Sesuai</span> <span class="description-title">Kebutuhan Anda</span></div>
            </div>

            <div class="container">
                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-tem">
                            <h3 class="text-dark">Ruang 001</h3>
                            <div class="price"><sup>Rp</sup>8.000<span> / jam</span></div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Kapasitas: 2 Pemain</li>
                                <li>PS4 Pro & 2x Joystick</li>
                                <li>Monitor Gaming 24"</li>
                                <li>Ruangan Ber-AC</li>
                            </ul>
                            <a href="#contact" class="btn-buy">Hubungi Kami</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pricing-tem">
                            <h3 class="text-dark">Ruang 002</h3>
                            <div class="price"><sup>Rp</sup>8.000<span> / jam</span></div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Kapasitas: 2 Pemain</li>
                                <li>PS4 & 2x Joystick</li>
                                <li>Televisi HD 24"</li>
                                <li>Ruangan Ber-AC</li>
                            </ul>
                            <a href="#contact" class="btn-buy">Hubungi Kami</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pricing-tem">
                            <h3 class="text-dark">Ruang 003</h3>
                            <div class="price"><sup>Rp</sup>8.000<span> / jam</span></div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Kapasitas: 3 Pemain</li>
                                <li>PS4 & 2x Joystick</li>
                                <li>Televisi HD 24"</li>
                                <li>Ruangan Ber-AC</li>
                            </ul>
                            <a href="#contact" class="btn-buy">Hubungi Kami</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-tem">
                            <h3 class="text-dark">Ruang 004</h3>
                            <div class="price"><sup>Rp</sup>6.000<span> / jam</span></div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Kapasitas: 1 Pemain</li>
                                <li>PS4 & 1x Joystick</li>
                                <li>Televisi HD 24"</li>
                                <li>Ruangan Ber-AC</li>
                            </ul>
                            <a href="#contact" class="btn-buy">Hubungi Kami</a>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Pricing Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak & Reservasi</h2>
                <div><span>Hubungi Kami &</span> <span class="description-title">Kirim Masukan</span></div>
            </div>

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Lokasi Lounge</h3>
                                <p>Jl. Utama Entertainment No. 88, Pusat Gaming</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Telepon / WhatsApp</h3>
                                <p>+62 812-3456-7890</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Resmi</h3>
                                <p>kontak@ayaplaystation.com</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="{{ route('ulasan.store') }}" id="ulasanForm" class="email-form"
                            method="post" data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-12">
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Nama Anda" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek / Ulasan Singkat"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Tuliskan pengalaman atau pesan Anda..." required=""></textarea>
                                </div>
                                <div id="successMessage" class="text-center mt-3"
                                    style="display: none; color: #198754; font-weight: 600;">
                                    Terima kasih! Pesan/ulasan Anda berhasil dikirim.
                                </div>
                                <div id="errorMessage" class="text-center mt-3" style="display: none; color: #dc3545;">
                                    Gagal mengirim pesan. Silakan coba beberapa saat lagi.
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-6 footer-about">
                    <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('Frontend/img/aya_logo.png') }}" alt="" style="max-height: 40px; margin-right: 10px; border-radius: 8px;">
                        <span class="sitename">AYA PlayStation</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Modern Gaming Lounge & PlayStation Rental Service</p>
                        <p>Pusat hiburan game konsol dengan kenyamanan dan performa terbaik.</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>+62 812-3456-7890</span></p>
                        <p><strong>Email:</strong> <span>kontak@ayaplaystation.com</span></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Navigasi Cepat</h4>
                    <ul>
                        <li><a href="#hero">Beranda</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#facilities">Layanan & Fasilitas</a></li>
                        <li><a href="#pricing">Tarif Sewa</a></li>
                        <li><a href="#contact">Kontak Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 footer-links">
                    <h4>Jam Operasional</h4>
                    <p class="text-muted small">Senin - Minggu: 09:00 - 24:00 WIB</p>
                    <p class="text-muted small">Layanan Rental Rumahan: Setiap Hari</p>
                </div>

            </div>

        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">AYA PlayStation</strong> <span>Seluruh Hak Dilindungi</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('Frontend/js/main.js') }}"></script>

    <script>
        document.getElementById('ulasanForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route('ulasan.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                    },
                    body: formData
                });

                if (response.ok) {
                    document.getElementById('successMessage').style.display = 'block';
                    document.getElementById('errorMessage').style.display = 'none';
                    form.reset();
                } else {
                    throw new Error('Gagal mengirim data');
                }
            } catch (error) {
                document.getElementById('successMessage').style.display = 'none';
                document.getElementById('errorMessage').style.display = 'block';
            }
        });

    </script>

</body>

</html>
