<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('Frontend/img/aya_logo.png') }}" rel="icon">
    <title>Daftar Akun - AYA PlayStation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif; min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            background: #0a0a1a; overflow: hidden; padding: 20px 0;
        }
        body::before {
            content: ''; position: fixed; top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at 20% 50%, rgba(13,110,253,0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, rgba(233,69,96,0.12) 0%, transparent 50%),
                        radial-gradient(ellipse at 60% 80%, rgba(9,132,227,0.1) 0%, transparent 50%);
            animation: bgPulse 8s ease-in-out infinite alternate; z-index: 0;
        }
        @keyframes bgPulse {
            0% { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(2%,2%) rotate(2deg); }
        }
        .register-wrapper { position: relative; z-index: 1; width: 100%; max-width: 480px; padding: 20px; }
        .register-card {
            background: rgba(255,255,255,0.04); backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.08); border-radius: 24px;
            padding: 36px 36px; box-shadow: 0 25px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.06);
            animation: slideUp 0.5s ease;
        }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .brand-header { text-align: center; margin-bottom: 24px; }
        .brand-logo { width: 70px; height: 70px; border-radius: 18px; object-fit: cover; box-shadow: 0 8px 24px rgba(13,110,253,0.3); margin-bottom: 12px; border: 2px solid rgba(255,255,255,0.1); }
        .brand-title { font-size: 1.3rem; font-weight: 700; color: white; margin-bottom: 4px; }
        .brand-subtitle { font-size: 0.8rem; color: rgba(255,255,255,0.5); }
        .pelanggan-badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-top: 6px; background: rgba(13,110,253,0.15); border: 1px solid rgba(13,110,253,0.3); color: #0d6efd; }
        .form-label { color: rgba(255,255,255,0.7); font-size: 0.82rem; font-weight: 500; margin-bottom: 5px; display: block; }
        .form-control {
            width: 100%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px; color: white; padding: 11px 16px; font-size: 0.88rem;
            font-family: 'Poppins', sans-serif; transition: all 0.3s;
        }
        .form-control:focus { background: rgba(255,255,255,0.08); border-color: rgba(13,110,253,0.5); box-shadow: 0 0 0 3px rgba(13,110,253,0.1); color: white; outline: none; }
        .form-control::placeholder { color: rgba(255,255,255,0.25); }
        .form-control.is-invalid { border-color: #e94560; }
        .invalid-feedback { color: #e94560; font-size: 0.78rem; display: block; margin-top: 4px; }
        .mb-3 { margin-bottom: 0.9rem; }
        .btn-daftar { width: 100%; padding: 13px; border-radius: 12px; border: none; font-weight: 700; font-size: 0.92rem; cursor: pointer; transition: all 0.3s; margin-top: 8px; letter-spacing: 0.5px; font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #0d6efd, #0652DD); color: white; box-shadow: 0 6px 20px rgba(13,110,253,0.3); }
        .btn-daftar:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(13,110,253,0.4); }
        .divider { display: flex; align-items: center; gap: 12px; margin: 18px 0; }
        .divider-line { flex: 1; height: 1px; background: rgba(255,255,255,0.08); }
        .divider-text { color: rgba(255,255,255,0.3); font-size: 0.78rem; }
        .bottom-links { text-align: center; font-size: 0.8rem; }
        .bottom-links a { color: #0d6efd; text-decoration: none; font-weight: 600; }
        .bottom-links a:hover { color: #4da3ff; }
        .bottom-links span { color: rgba(255,255,255,0.4); }
        .back-link { display: block; text-align: center; margin-top: 12px; color: rgba(255,255,255,0.3); font-size: 0.78rem; text-decoration: none; transition: color 0.3s; }
        .back-link:hover { color: rgba(255,255,255,0.6); }
    </style>
</head>


<body>
    <div class="register-wrapper">
        <div class="register-card">

            <div class="brand-header">
                <img src="{{ asset('Frontend/img/aya_logo.png') }}" class="brand-logo" alt="AYA PlayStation">
                <div class="brand-title">AYA PlayStation</div>
                <div class="brand-subtitle">Buat akun pelanggan baru</div>
                <div class="pelanggan-badge"><i class="fas fa-user-plus"></i> Registrasi Pelanggan</div>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="contoh@email.com" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Minimal 8 karakter" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="form-control" placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" class="btn-daftar">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>

            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">atau</span>
                <div class="divider-line"></div>
            </div>

            <div class="bottom-links">
                <span>Sudah punya akun? </span>
                <a href="{{ route('login') }}">Masuk di sini</a>
            </div>

            <a href="{{ route('welcome') }}" class="back-link">&#8592; Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>
