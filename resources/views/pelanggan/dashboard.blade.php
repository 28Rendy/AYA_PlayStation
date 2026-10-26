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

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 12px;">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Welcome Banner -->
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="font-weight-bold mb-2">Selamat Datang, {{ $user->name }}! 👋</h3>
                    <p class="mb-0" style="color: rgba(255,255,255,0.85); font-size: 0.92rem;">
                        Anda masuk sebagai <b>Pelanggan AYA PlayStation</b> ({{ $user->email }}). Anda dapat memesan ruangan PlayStation secara langsung, memantau ketersediaan ruang, dan memberikan ulasan layanan.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
                    <button type="button" class="btn btn-light font-weight-bold shadow-sm" data-toggle="modal" data-target="#modalPesanRuang" style="border-radius: 12px; padding: 12px 24px; color: #1e3a8a;">
                        <i class="fas fa-gamepad mr-2"></i> Pesan Ruang Sekarang
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <div class="stat-number">{{ count($ruang) }}</div>
                    <div class="stat-label">Total Ruang PS</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <div class="stat-number text-success">{{ $ruang->where('status_ruang', 'Tersedia')->count() }}</div>
                    <div class="stat-label">Ruang Tersedia</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <div class="stat-number text-info">{{ count($ps) }}</div>
                    <div class="stat-label">Konsol PS Rental</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <div class="stat-number text-primary">{{ count($riwayat) }}</div>
                    <div class="stat-label">Pesanan Ruang Saya</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Room Status -->
            <div class="col-lg-7">
                <div class="content-card">
                    <div class="card-header-clean">
                        <h5><i class="fas fa-tv text-primary mr-2"></i> Status Ruang Bermain</h5>
                        <button type="button" class="btn btn-sm btn-navy" data-toggle="modal" data-target="#modalPesanRuang">
                            <i class="fas fa-plus mr-1"></i> Pesan Ruang
                        </button>
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
                                    <th>Aksi</th>
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
                                        <td>
                                            @if($r->status_ruang == 'Tersedia')
                                                <button type="button" class="btn btn-sm btn-primary py-1 px-2 btnPesanCepat" 
                                                    data-ruang="{{ $r->nomor_ruang }}" 
                                                    data-harga="{{ $r->harga_perjam }}"
                                                    data-toggle="modal" data-target="#modalPesanRuang" style="border-radius: 6px; font-size: 0.78rem;">
                                                    Pesan
                                                </button>
                                            @else
                                                <span class="text-muted small">Sedang Penuh</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">Belum ada data ruang.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Riwayat Pemesanan Saya -->
                <div class="content-card">
                    <div class="card-header-clean">
                        <h5><i class="fas fa-history text-primary mr-2"></i> Riwayat Pemesanan Ruang Saya</h5>
                        <span class="badge badge-primary px-2 py-1">{{ count($riwayat) }} Pesanan</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="thead-light">
                                <tr style="font-size: 0.8rem;">
                                    <th>Ruang</th>
                                    <th>Tanggal</th>
                                    <th>Jam Main</th>
                                    <th>Durasi</th>
                                    <th>Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 0.85rem;">
                                @forelse ($riwayat as $item)
                                    <tr>
                                        <td><b>Ruang {{ $item->nomor_ruang }}</b></td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->jam_masuk }} - {{ $item->jam_keluar }}</td>
                                        <td>{{ $item->jam_sewa }} Jam</td>
                                        <td><b class="text-success">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</b></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="fas fa-calendar-times fa-2x mb-2 text-muted d-block"></i>
                                            Anda belum pernah memesan ruangan. Klik tombol "Pesan Ruang Sekarang" untuk memulai!
                                        </td>
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
                        <h5><i class="fas fa-gamepad text-primary mr-2"></i> Rental Konsol PS Rumahan</h5>
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
                    <a href="https://wa.me/6281234567890?text=Halo%20AYA%20PlayStation,%20saya%20{{ urlencode($user->name) }}%20ingin%20sewa%20konsol%20PS" target="_blank" class="btn btn-navy btn-block text-center font-weight-bold" style="border-radius: 10px;">
                        <i class="fab fa-whatsapp mr-1"></i> Hubungi Admin via WhatsApp
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
                            <textarea name="message" class="form-control" rows="3" placeholder="Bagaimana pengalaman Anda bermain di AYA PlayStation? Tulis ulasan Anda di sini..." required style="border-radius: 10px; font-size: 0.85rem;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-navy btn-sm btn-block font-weight-bold" style="border-radius: 8px;">
                            <i class="fas fa-paper-plane mr-1"></i> Kirim Ulasan
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Pemesanan Ruang -->
    <div class="modal fade" id="modalPesanRuang" tabindex="-1" role="dialog" aria-labelledby="modalPesanRuangLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 18px; border: none; box-shadow: 0 15px 40px rgba(15,23,42,0.18);">
                <div class="modal-header" style="background: linear-gradient(135deg, #1e3a8a, #2563eb); color: white; border-top-left-radius: 18px; border-top-right-radius: 18px;">
                    <h5 class="modal-title font-weight-bold" id="modalPesanRuangLabel">
                        <i class="fas fa-gamepad mr-2"></i> Formulir Pemesanan Ruang
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pelanggan.pesanRuang') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label class="font-weight-bold text-muted small">PILIH RUANGAN PLAYSTATION</label>
                            <select name="nomor_ruang" id="selectRuang" class="form-control" required style="border-radius: 10px;">
                                <option value="" disabled selected>-- Pilih Ruangan --</option>
                                @foreach($ruang as $r)
                                    <option value="{{ $r->nomor_ruang }}" data-harga="{{ $r->harga_perjam }}">
                                        Ruang {{ $r->nomor_ruang }} ({{ $r->perangkat_tersedia }}) - Rp {{ number_format($r->harga_perjam, 0, ',', '.') }}/jam [{{ $r->status_ruang }}]
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold text-muted small">TANGGAL BERMAIN</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required style="border-radius: 10px;">
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold text-muted small">JAM MASUK / MULAI</label>
                                <input type="time" name="jam_masuk" id="inputJamMasuk" class="form-control" value="13:00" required style="border-radius: 10px;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold text-muted small">DURASI MAIN (JAM)</label>
                                <input type="number" name="jam_sewa" id="inputJamSewa" class="form-control" value="2" min="1" max="12" required style="border-radius: 10px;">
                            </div>
                        </div>

                        <div class="p-3 my-2" style="background: #f8fafc; border-radius: 12px; border: 1px dashed #cbd5e1;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted font-weight-bold small">Estimasi Total Bayar:</span>
                                <span class="font-weight-bold text-primary h5 mb-0" id="textTotalBayar">Rp 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-4 pb-4 border-0">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="border-radius: 10px;">Batal</button>
                        <button type="submit" class="btn btn-primary font-weight-bold px-4" style="border-radius: 10px; background: #1e3a8a; border-color: #1e3a8a;">
                            <i class="fas fa-check mr-1"></i> Konfirmasi Pemesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('Backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function hitungTotal() {
            var selected = $('#selectRuang option:selected');
            var harga = selected.data('harga') || 0;
            var durasi = parseInt($('#inputJamSewa').val()) || 0;
            var total = harga * durasi;
            $('#textTotalBayar').text('Rp ' + total.toLocaleString('id-ID'));
        }

        $('#selectRuang').on('change', hitungTotal);
        $('#inputJamSewa').on('input change', hitungTotal);

        $('.btnPesanCepat').on('click', function() {
            var nomor = $(this).data('ruang');
            $('#selectRuang').val(nomor).trigger('change');
        });

        hitungTotal();
    </script>
</body>

</html>
