<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('Frontend/img/aya_logo.png') }}" rel="icon">
    <title>Login - AYA PlayStation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0a1a;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: fixed;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at 20% 50%, rgba(13,110,253,0.15) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 20%, rgba(233,69,96,0.12) 0%, transparent 50%),
                        radial-gradient(ellipse at 60% 80%, rgba(9,132,227,0.1) 0%, transparent 50%);
            animation: bgPulse 8s ease-in-out infinite alternate;
            z-index: 0;
        }
        @keyframes bgPulse {
            0% { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(2%,2%) rotate(2deg); }
        }
        .login-wrapper {
            position: relative; z-index: 1;
            width: 100%; max-width: 460px; padding: 20px;
        }
        .login-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            padding: 40px 36px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.06);
            animation: slideUp 0.5s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .brand-header { text-align: center; margin-bottom: 28px; }
        .brand-logo {
            width: 80px; height: 80px; border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 8px 24px rgba(13,110,253,0.3);
            margin-bottom: 14px;
            border: 2px solid rgba(255,255,255,0.1);
        }
        .brand-title { font-size: 1.4rem; font-weight: 700; color: white; margin-bottom: 4px; }
        .brand-subtitle { font-size: 0.82rem; color: rgba(255,255,255,0.5); }
        .role-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 14px; border-radius: 20px;
            font-size: 0.78rem; font-weight: 600; margin-top: 8px;
        }
        .role-badge.admin { background: rgba(233,69,96,0.15); border: 1px solid rgba(233,69,96,0.3); color: #e94560; }
        .role-badge.pelanggan { background: rgba(13,110,253,0.15); border: 1px solid rgba(13,110,253,0.3); color: #0d6efd; }
        .form-label { color: rgba(255,255,255,0.7); font-size: 0.82rem; font-weight: 500; margin-bottom: 6px; }
        .form-control {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px; color: white;
            padding: 12px 16px; font-size: 0.88rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: rgba(13,110,253,0.5);
            box-shadow: 0 0 0 3px rgba(13,110,253,0.1);
            color: white; outline: none;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.25); }
        .form-control.is-invalid { border-color: #e94560; }
        .lupa-sandi { font-size: 0.78rem; color: #0d6efd; text-decoration: none; font-weight: 500; }
        .lupa-sandi:hover { color: #4da3ff; }
        .btn-masuk {
            width: 100%; padding: 13px; border-radius: 12px;
            border: none; font-weight: 700; font-size: 0.92rem;
            cursor: pointer; transition: all 0.3s; margin-top: 8px;
            letter-spacing: 0.5px; font-family: 'Poppins', sans-serif;
        }
        .admin-btn {
            background: linear-gradient(135deg, #e94560, #c0392b);
            color: white; box-shadow: 0 6px 20px rgba(233,69,96,0.3);
        }
        .admin-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(233,69,96,0.4); }
        .pelanggan-btn {
            background: linear-gradient(135deg, #0d6efd, #0652DD);
            color: white; box-shadow: 0 6px 20px rgba(13,110,253,0.3);
        }
        .pelanggan-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(13,110,253,0.4); }
        .divider { display: flex; align-items: center; gap: 12px; margin: 20px 0; }
        .divider-line { flex: 1; height: 1px; background: rgba(255,255,255,0.08); }
        .divider-text { color: rgba(255,255,255,0.3); font-size: 0.78rem; }
        .bottom-links { text-align: center; font-size: 0.8rem; }
        .bottom-links a { color: #0d6efd; text-decoration: none; font-weight: 600; }
        .bottom-links a:hover { color: #4da3ff; }
        .bottom-links span { color: rgba(255,255,255,0.4); }
        .back-link {
            display: block; text-align: center; margin-top: 12px;
            color: rgba(255,255,255,0.3); font-size: 0.78rem;
            text-decoration: none; transition: color 0.3s;
        }
        .back-link:hover { color: rgba(255,255,255,0.6); }
        .invalid-feedback { color: #e94560; font-size: 0.78rem; }
        .alert { border-radius: 10px; font-size: 0.85rem; padding: 10px 14px; margin-bottom: 16px; }
        .alert-success { background: rgba(40,167,69,0.15); border: 1px solid rgba(40,167,69,0.3); color: #55d98a; }
        .alert-info { background: rgba(23,162,184,0.15); border: 1px solid rgba(23,162,184,0.3); color: #4dd8e8; }
        .custom-checkbox-label {
            display: flex; align-items: center; gap: 8px;
            color: rgba(255,255,255,0.5); font-size: 0.8rem; cursor: pointer;
        }
        .custom-checkbox-label input[type="checkbox"] { width: 16px; height: 16px; accent-color: #0d6efd; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .d-flex { display: flex; }
        .justify-content-between { justify-content: space-between; }
        .align-items-center { align-items: center; }
        .mb-0 { margin-bottom: 0; }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">

            <div class="brand-header">
                <img src="{{ asset('Frontend/img/aya_logo.png') }}" class="brand-logo" alt="AYA PlayStation">
                <div class="brand-title">AYA PlayStation</div>
                <div class="brand-subtitle" id="loginSubtitle">Masuk ke akun Anda</div>
                <div id="roleBadge" class="role-badge" style="display: none;"></div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('status'))
                <div class="alert alert-info">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@contoh.com"
                        value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-0">
                        <label class="form-label mb-0">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a class="lupa-sandi" href="{{ route('password.request') }}">Lupa Sandi?</a>
                        @endif
                    </div>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan kata sandi" required style="margin-top:6px;">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="custom-checkbox-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat Saya di Perangkat Ini
                    </label>
                </div>

                <button type="submit" class="btn-masuk" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

            </form>

            <div class="divider" id="registerSection">
                <div class="divider-line"></div>
                <span class="divider-text">atau</span>
                <div class="divider-line"></div>
            </div>

            <div class="bottom-links" id="registerLinks">
                <span>Belum punya akun? </span>
                <a href="{{ route('register') }}">Daftar sebagai Pelanggan</a>
            </div>

            <a href="{{ route('welcome') }}" class="back-link">&#8592; Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const role = urlParams.get('role');
        const badge = document.getElementById('roleBadge');
        const submitBtn = document.getElementById('submitBtn');
        const subtitle = document.getElementById('loginSubtitle');
        const registerSection = document.getElementById('registerSection');
        const registerLinks = document.getElementById('registerLinks');

        if (role === 'admin') {
            badge.style.display = 'inline-flex';
            badge.className = 'role-badge admin';
            badge.innerHTML = '<i class="fas fa-shield-alt"></i> Mode Administrator';
            submitBtn.className = 'btn-masuk admin-btn';
            submitBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Masuk sebagai Admin';
            subtitle.textContent = 'Akses panel administrator sistem';
            registerSection.style.display = 'none';
            registerLinks.style.display = 'none';
        } else {
            badge.style.display = 'inline-flex';
            badge.className = 'role-badge pelanggan';
            badge.innerHTML = '<i class="fas fa-user"></i> Portal Pelanggan';
            submitBtn.className = 'btn-masuk pelanggan-btn';
            submitBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> Masuk sebagai Pelanggan';
            subtitle.textContent = 'Akses akun pelanggan Anda';
        }
    </script>
</body>

</html>

