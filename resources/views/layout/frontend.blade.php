<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', ($pengaturan->nama_rental ?? 'AYA PlayStation') . ' - ' . ($pengaturan->tagline ?? 'Modern Gaming Lounge'))</title>
    <meta name="description" content="{{ $pengaturan->deskripsi ?? 'Layanan rental PlayStation 4 & PlayStation 5 terbaik, gaming lounge ber-AC dengan ruang VIP dan sewa konsol harian terpercaya.' }}">
    <meta name="keywords" content="rental ps, rental playstation, ps4, ps5, gaming lounge, sewa ps">

    @php
        $logoSrc = ($pengaturan->logo && file_exists(public_path($pengaturan->logo))) ? asset($pengaturan->logo) : asset('Frontend/img/aya_logo.png');
        $cleanWa = preg_replace('/[^0-9]/', '', $pengaturan->whatsapp ?? '6281234567890');
        if (substr($cleanWa, 0, 1) === '0') {
            $cleanWa = '62' . substr($cleanWa, 1);
        }
    @endphp

    <!-- Favicons -->
    <link href="{{ $logoSrc }}" rel="icon">
    <link href="{{ $logoSrc }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('Frontend/css/main.css') }}" rel="stylesheet">

    <style>
        .page-header-banner {
            background: linear-gradient(135deg, #0b1a30 0%, #173868 100%);
            color: #ffffff;
            padding: 120px 0 50px 0;
            position: relative;
            margin-bottom: 40px;
        }
        .page-header-banner h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .page-header-banner .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        .page-header-banner .breadcrumb a {
            color: #93c5fd;
            text-decoration: none;
        }
        .page-header-banner .breadcrumb .active {
            color: #ffffff;
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
        .pic img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .floating-wa-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: #25d366;
            color: white;
            border-radius: 50px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
            font-weight: 600;
            z-index: 999;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .floating-wa-btn:hover {
            color: white;
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(37, 211, 102, 0.6);
        }
        .floating-wa-btn i {
            font-size: 1.4rem;
        }
    </style>
</head>

<body class="index-page">

    <!-- Header Navbar -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                <img src="{{ $logoSrc }}" alt="{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}" style="max-height: 44px; margin-right: 12px; border-radius: 10px;">
                <h1 class="sitename">{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('frontend.about') }}" class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">Tentang Kami</a></li>
                    <li><a href="{{ route('frontend.features') }}" class="{{ request()->routeIs('frontend.features') ? 'active' : '' }}">Keunggulan</a></li>
                    <li><a href="{{ route('frontend.facilities') }}" class="{{ request()->routeIs('frontend.facilities') ? 'active' : '' }}">Fasilitas</a></li>
                    <li><a href="{{ route('frontend.gallery') }}" class="{{ request()->routeIs('frontend.gallery') ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="{{ route('frontend.rooms') }}" class="{{ request()->routeIs('frontend.rooms') ? 'active' : '' }}">Daftar Ruang</a></li>
                    <li><a href="{{ route('frontend.contact') }}" class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Kontak</a></li>

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
                        <li><a href="{{ route('login') }}" class="btn-login-nav" style="border: 1px solid rgba(13,110,253,0.3); border-radius: 20px; padding: 6px 18px;">Login</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <!-- Main Content Yield -->
    <main class="main">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode('Halo ' . ($pengaturan->nama_rental ?? 'AYA PlayStation') . ', saya ingin bertanya mengenai ketersediaan dan rental.') }}" 
       target="_blank" class="floating-wa-btn" title="Chat WhatsApp">
        <i class="bi bi-whatsapp"></i>
        <span>Chat WhatsApp</span>
    </a>

    <!-- Footer -->
    <footer id="footer" class="footer dark-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-6 footer-about">
                    <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                        <img src="{{ $logoSrc }}" alt="{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}" style="max-height: 40px; margin-right: 10px; border-radius: 8px;">
                        <span class="sitename">{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $pengaturan->tagline ?? 'Modern Gaming Lounge & PlayStation Rental Service' }}</p>
                        <p>{{ $pengaturan->deskripsi ?? 'Pusat hiburan game konsol dengan kenyamanan dan performa terbaik.' }}</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>{{ $pengaturan->telepon ?? '+62 812-3456-7890' }}</span></p>
                        <p><strong>WhatsApp:</strong> <span>{{ $pengaturan->whatsapp ?? '081234567890' }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $pengaturan->email ?? 'kontak@ayaplaystation.com' }}</span></p>
                        <p><strong>Alamat:</strong> <span>{{ $pengaturan->alamat ?? 'Jl. Utama Entertainment No. 88, Pusat Gaming' }}</span></p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Navigasi Halaman</h4>
                    <ul>
                        <li><a href="{{ route('welcome') }}">Beranda</a></li>
                        <li><a href="{{ route('frontend.about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('frontend.features') }}">Keunggulan</a></li>
                        <li><a href="{{ route('frontend.facilities') }}">Fasilitas & Layanan</a></li>
                        <li><a href="{{ route('frontend.gallery') }}">Galeri Foto</a></li>
                        <li><a href="{{ route('frontend.rooms') }}">Daftar Ruang & Tarif</a></li>
                        <li><a href="{{ route('frontend.contact') }}">Kontak Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-3 footer-links">
                    <h4>Jam Operasional</h4>
                    <p class="text-muted small">{{ $pengaturan->jam_operasional ?? 'Senin - Minggu: 09:00 - 24:00 WIB' }}</p>
                    <p class="text-muted small">Layanan Rental Rumahan: Setiap Hari</p>
                    <div class="mt-3">
                        <a href="https://wa.me/{{ $cleanWa }}" target="_blank" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            <i class="bi bi-whatsapp me-1 text-success"></i> Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Hak Cipta</span> <strong class="px-1 sitename">{{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}</strong> <span>Seluruh Hak Dilindungi</span></p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('Frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('Frontend/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
