<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('Frontend/img/aya_logo.png') }}" rel="icon">
    <title>Portal Pelanggan - AYA PlayStation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
            color: #0f172a;
            min-height: 100vh;
        }

        .navbar-pelanggan {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 24px;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 10px;
        }

        .brand-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: #0f172a;
        }

        .welcome-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            border-radius: 20px;
            color: #ffffff;
            padding: 30px;
            box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.25);
            margin-bottom: 26px;
        }

        .content-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 15px -3px rgba(15, 23, 42, 0.05);
            padding: 22px;
            margin-bottom: 24px;
        }

        .card-header-clean {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 12px;
        }

        .card-header-clean h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.76rem;
            font-weight: 600;
        }

        .badge-tersedia {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .badge-terpakai {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .btn-custom {
            padding: 9px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-navy {
            background: #1e3a8a;
            color: #ffffff;
        }

        .btn-navy:hover {
            background: #1e40af;
            color: #ffffff;
        }

        .btn-danger-soft {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }

        .btn-danger-soft:hover {
            background: #fca5a5;
            color: #7f1d1d;
        }

        .stat-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px;
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e3a8a;
        }

        .stat-label {
            font-size: 0.78rem;
            color: #64748b;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar-pelanggan d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('Frontend/img/aya_logo.png') }}" class="brand-logo" alt="Logo">
            <span class="brand-title">AYA PlayStation</span>
            <span class="badge badge-light ml-2 text-primary font-weight-bold" style="border: 1px solid #bfdbfe;">Portal Pelanggan</span>
        </div>
        <div class="d-flex align-items-center">
            <span class="mr-3 text-muted small d-none d-md-inline">Halo, <b>{{ $user->name ?? 'Pelanggan' }}</b></span>
            <a href="{{ route('welcome') }}" class="btn btn-sm btn-outline-secondary mr-2">
                <i class="fas fa-home"></i> Beranda
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger-soft">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">

        <!-- Welcome Banner -->
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="font-weight-bold mb-2">Selamat Datang, {{ $user->name }}! 👋</h3>
                    <p class="mb-0" style="color: rgba(255,255,255,0.85); font-size: 0.92rem;">
                        Anda masuk sebagai <b>Pelanggan AYA PlayStation</b> ({{ $user->email }}). Di sini Anda dapat melihat status ketersediaan ruang, daftar konsol PlayStation, dan memberikan ulasan layanan.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
                    <a href="{{ route('welcome') }}#pricing" class="btn btn-light font-weight-bold" style="border-radius: 12px; padding: 10px 20px; color: #1e3a8a;">
                        <i class="fas fa-gamepad mr-1"></i> Pesan Ruang Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <div class="stat-number">{{ count($ruang) }}</div>
                    <div class="stat-label">Total Ruang PlayStation</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <div class="stat-number">{{ $ruang->where('status_ruang', 'Tersedia')->count() }}</div>
                    <div class="stat-label">Ruang Siap Digunakan</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-item">
                    <div class="stat-number">{{ count($ps) }}</div>
                    <div class="stat-label">Konsol PS Tersedia</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Room Status -->
            <div class="col-lg-7">
                <div class="content-card">
                    <div class="card-header-clean">
                        <h5><i class="fas fa-tv text-primary mr-2"></i> Status Ruang Bermain</h5>
                        <span class="text-muted small">Update Realtime</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="thead-light">
                                <tr style="font-size: 0.8rem;">
                                    <th>Nomor Ruang</th>
                                    <th>Kapasitas</th>
                                    <th>Perangkat</th>
                                    <th>Tarif / Jam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 0.86rem;">
                                @forelse ($ruang as $r)
                                    <tr>
                                        <td><b>Ruang {{ $r->nomor_ruang }}</b></td>
                                        <td>{{ $r->kapasitas }}</td>
                                        <td>{{ $r->perangkat_tersedia }}</td>
                                        <td>Rp {{ number_format($r->harga_perjam, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge-status {{ $r->status_ruang == 'Tersedia' ? 'badge-tersedia' : 'badge-terpakai' }}">
                                                {{ $r->status_ruang }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-3">Belum ada data ruang.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Console List & Feedback -->
            <div class="col-lg-5">
                <div class="content-card">
                    <div class="card-header-clean">
                        <h5><i class="fas fa-gamepad text-primary mr-2"></i> Rental Konsol PS</h5>
                    </div>
                    <ul class="list-group list-group-flush mb-3">
                        @forelse ($ps as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                                <div>
                                    <h6 class="mb-0 font-weight-bold">{{ $item->nama_ps }}</h6>
                                    <small class="text-muted">Unit ID: {{ $item->nomor_seri ?? $item->id }}</small>
                                </div>
                                <span class="badge badge-primary px-3 py-2 font-weight-bold" style="border-radius: 8px;">
                                    Rp {{ number_format($item->harga_per_hari ?? 50000, 0, ',', '.') }} / hari
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item px-0 text-muted">Belum ada unit PS.</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('welcome') }}#contact" class="btn btn-navy btn-block text-center font-weight-bold" style="border-radius: 10px;">
                        <i class="fas fa-phone-alt mr-1"></i> Hubungi Admin untuk Sewa
                    </a>
                </div>

                <!-- Form Ulasan Cepat -->
                <div class="content-card">
                    <div class="card-header-clean">
                        <h5><i class="fas fa-star text-warning mr-2"></i> Tulis Ulasan Anda</h5>
                    </div>
                    <form action="{{ route('ulasan.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nama" value="{{ $user->name }}">
                        <input type="hidden" name="subject" value="Ulasan Pelanggan ({{ now()->format('d M Y') }})">
                        <div class="form-group mb-2">
                            <textarea name="message" class="form-control" rows="3" placeholder="Tulis kepuasan atau saran Anda bermain di AYA PlayStation..." required style="border-radius: 10px; font-size: 0.85rem;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-navy btn-sm btn-block font-weight-bold" style="border-radius: 8px;">
                            <i class="fas fa-paper-plane mr-1"></i> Kirim Ulasan
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('Backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
