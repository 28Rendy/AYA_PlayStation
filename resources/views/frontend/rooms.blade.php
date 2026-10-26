@extends('layout.frontend')

@section('title', 'Daftar Ruang & Tarif - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Daftar Ruang & Tarif Sewa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Ruang</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Rooms Section Content -->
<section id="pricing" class="pricing section py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-2">Pilihan Ruangan</span>
            <h2 class="fw-bold">Pilih Ruangan Sesuai Kebutuhan Mabar Anda</h2>
            <p class="text-muted col-lg-8 mx-auto">Tarif sewa transparan, terjangkau per jam, dengan pilihan kapasitas dan kelengkapan perangkat yang fleksibel.</p>
        </div>

        @php
            $cleanWa = preg_replace('/[^0-9]/', '', $pengaturan->whatsapp ?? '6281234567890');
            if (substr($cleanWa, 0, 1) === '0') {
                $cleanWa = '62' . substr($cleanWa, 1);
            }
        @endphp

        <div class="row gy-4">
            @forelse($data_ruang ?? [] as $ruang)
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-tem h-100 d-flex flex-column justify-content-between p-4 bg-white rounded-4 shadow-sm border border-light" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform=''">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="text-dark fw-bold mb-0" style="font-size: 1.3rem;">Ruang {{ $ruang->nomor_ruang }}</h3>
                                <span class="badge {{ $ruang->status_ruang == 'Tersedia' ? 'bg-success' : 'bg-danger' }} text-white px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                    <i class="bi {{ $ruang->status_ruang == 'Tersedia' ? 'bi-check-circle' : 'bi-x-circle' }} me-1"></i>
                                    {{ $ruang->status_ruang }}
                                </span>
                            </div>

                            <div class="price my-3">
                                <span class="fs-6 text-muted align-top">Rp</span>
                                <span class="fs-1 fw-extrabold text-primary">{{ number_format($ruang->harga_perjam, 0, ',', '.') }}</span>
                                <span class="text-muted small">/ jam</span>
                            </div>

                            <hr class="my-3">

                            <ul class="list-unstyled mb-4 text-start">
                                <li class="mb-2"><i class="bi bi-people text-primary me-2"></i> <strong>Kapasitas:</strong> {{ $ruang->kapasitas }}</li>
                                <li class="mb-2"><i class="bi bi-controller text-primary me-2"></i> <strong>Unit:</strong> {{ $ruang->perangkat_tersedia }}</li>
                                <li class="mb-2"><i class="bi bi-clock text-primary me-2"></i> <strong>Jam:</strong> {{ $ruang->jam_operasional }}</li>
                                <li class="mb-2"><i class="bi bi-snow text-primary me-2"></i> Ruangan Full AC</li>
                                <li class="mb-2"><i class="bi bi-shield-check text-primary me-2"></i> Kondisi: {{ $ruang->kondisi_perangkat }}</li>
                            </ul>
                        </div>

                        <div class="mt-3">
                            @php
                                $waMsg = urlencode("Halo " . ($pengaturan->nama_rental ?? 'AYA PlayStation') . ", saya ingin reservasi/booking Ruang " . $ruang->nomor_ruang . ". Apakah saat ini tersedia?");
                            @endphp
                            @if($ruang->status_ruang == 'Tersedia')
                                <a href="https://wa.me/{{ $cleanWa }}?text={{ $waMsg }}" target="_blank" class="btn btn-primary d-block w-100 py-2 rounded-pill shadow-sm text-center">
                                    <i class="bi bi-whatsapp me-1"></i> Booking via WA
                                </a>
                            @else
                                <button class="btn btn-secondary d-block w-100 py-2 rounded-pill text-center" disabled style="cursor: not-allowed; opacity: 0.6;">
                                    <i class="bi bi-lock me-1"></i> Sedang Digunakan
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                    Belum ada data ruangan yang ditambahkan oleh admin.
                </div>
            @endforelse
        </div>

        <!-- Info Tambahan -->
        <div class="alert alert-info border-0 rounded-4 shadow-sm mt-5 p-4 text-center">
            <h5 class="fw-bold text-dark mb-2"><i class="bi bi-info-circle text-primary me-2"></i> Butuh Sewa PlayStation untuk Dibawa Pulang ke Rumah?</h5>
            <p class="mb-3 text-muted">Kami juga menyediakan paket sewa harian/mingguan konsol PS4 & PS5 unit rumahan lengkap dengan tas protektif dan 2 stik wireless.</p>
            <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode('Halo ' . ($pengaturan->nama_rental ?? 'AYA PlayStation') . ', saya tertarik dengan paket sewa konsol rumahan harian.') }}" 
               target="_blank" class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
                <i class="bi bi-whatsapp me-1"></i> Tanya Paket Sewa Rumahan
            </a>
        </div>
    </div>
</section>
@endsection
