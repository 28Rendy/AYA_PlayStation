@extends('layout.frontend')

@section('title', 'Kontak & Reservasi - ' . ($pengaturan->nama_rental ?? 'AYA PlayStation'))

@section('content')
<!-- Page Header Banner -->
<section class="page-header-banner">
    <div class="container text-center">
        <h1>Kontak & Reservasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>
    </div>
</section>

@php
    $cleanWa = preg_replace('/[^0-9]/', '', $pengaturan->whatsapp ?? '6281234567890');
    if (substr($cleanWa, 0, 1) === '0') {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
@endphp

<!-- Contact Section Content -->
<section id="contact" class="contact section py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill text-white mb-2">Hubungi Kami</span>
            <h2 class="fw-bold">Informasi Kontak & Kirim Ulasan</h2>
            <p class="text-muted col-lg-8 mx-auto">Punya pertanyaan seputar ketersediaan ruangan, booking turnamen, atau ingin memberikan ulasan bermain? Hubungi kami langsung!</p>
        </div>

        <div class="row gy-5">
            <!-- Informasi Kontak -->
            <div class="col-lg-5">
                <div class="p-4 bg-white rounded-4 shadow-sm border border-light h-100">
                    <h4 class="fw-bold mb-4 text-dark"><i class="bi bi-info-circle text-primary me-2"></i> Detail Kontak Rental</h4>

                    <div class="d-flex mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-geo-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Alamat / Lokasi</h6>
                            <p class="text-muted mb-0 small">{{ $pengaturan->alamat ?? 'Jl. Utama Entertainment No. 88, Pusat Gaming' }}</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="bg-success text-white rounded-circle p-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-whatsapp fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">WhatsApp Reservasi</h6>
                            <p class="mb-0 small">
                                <a href="https://wa.me/{{ $cleanWa }}" target="_blank" class="text-success text-decoration-none fw-bold">
                                    {{ $pengaturan->whatsapp ?? '081234567890' }}
                                    <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-telephone fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Telepon Kasir / Kantor</h6>
                            <p class="text-muted mb-0 small">{{ $pengaturan->telepon ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-envelope fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Resmi</h6>
                            <p class="text-muted mb-0 small">{{ $pengaturan->email ?? 'kontak@ayaplaystation.com' }}</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="bg-warning text-dark rounded-circle p-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-clock fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Jam Operasional</h6>
                            <p class="text-muted mb-0 small">{{ $pengaturan->jam_operasional ?? 'Senin - Minggu: 09:00 - 24:00 WIB' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Ulasan & Pesan -->
            <div class="col-lg-7">
                <div class="p-4 bg-white rounded-4 shadow-sm border border-light h-100">
                    <h4 class="fw-bold mb-3 text-dark"><i class="bi bi-chat-square-text text-primary me-2"></i> Kirim Ulasan atau Masukan</h4>
                    <p class="text-muted small mb-4">Pengalaman Anda sangat berarti bagi kami untuk terus meningkatkan kenyamanan bermain di {{ $pengaturan->nama_rental ?? 'AYA PlayStation' }}.</p>

                    <form action="{{ route('ulasan.store') }}" id="ulasanFormDedicated" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control rounded-3" placeholder="Nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Subjek / Topik</label>
                                <input type="text" name="subject" class="form-control rounded-3" placeholder="Contoh: Sangat Puas / Ulasan Pelayanan" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small">Isi Pesan / Pengalaman Bermain</label>
                                <textarea name="message" rows="5" class="form-control rounded-3" placeholder="Ceritakan pengalaman bermain Anda..." required></textarea>
                            </div>

                            <div class="col-12">
                                <div id="successMessage" class="alert alert-success border-0 rounded-3 shadow-sm py-2" style="display: none;">
                                    <i class="bi bi-check-circle me-1"></i> Terima kasih! Ulasan atau pesan Anda berhasil dikirimkan.
                                </div>
                                <div id="errorMessage" class="alert alert-danger border-0 rounded-3 shadow-sm py-2" style="display: none;">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Gagal mengirim pesan. Silakan coba sesaat lagi.
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                                    <i class="bi bi-send me-1"></i> Kirim Ulasan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ulasan Pengunjung Terbaru -->
        @if(isset($data_ulasan) && count($data_ulasan) > 0)
            <div class="mt-5 pt-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-dark">Apa Kata Gamers Tentang Kami?</h4>
                </div>
                <div class="row g-4">
                    @foreach($data_ulasan->take(3) as $ulasan)
                        <div class="col-md-4">
                            <div class="p-4 bg-white rounded-4 shadow-sm border border-light h-100">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 42px; height: 42px;">
                                        {{ strtoupper(substr($ulasan->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark">{{ $ulasan->nama }}</h6>
                                        <small class="text-muted">{{ $ulasan->subject }}</small>
                                    </div>
                                </div>
                                <p class="text-muted small fst-italic mb-0">"{{ $ulasan->message }}"</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('ulasanFormDedicated').addEventListener('submit', async function(event) {
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
                throw new Error('Gagal');
            }
        } catch (error) {
            document.getElementById('successMessage').style.display = 'none';
            document.getElementById('errorMessage').style.display = 'block';
        }
    });
</script>
@endpush
