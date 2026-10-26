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
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 50%, #dbeafe 100%);
            padding: 20px 15px;
            color: #0f172a;
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            margin: auto;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 32px 28px;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 20px 35px -10px rgba(30, 58, 138, 0.12);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .brand-header {
            text-align: center;
            margin-bottom: 22px;
        }

        .brand-logo {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            object-fit: cover;
            box-shadow: 0 4px 14px rgba(30, 58, 138, 0.15);
            margin-bottom: 8px;
            border: 2px solid #ffffff;
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
            letter-spacing: -0.3px;
        }

        .brand-subtitle {
            font-size: 0.8rem;
            color: #64748b;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            color: #334155;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
        }

        .form-control {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            color: #0f172a;
            padding: 10px 14px;
            font-size: 0.875rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            color: #0f172a;
            outline: none;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 4px;
            display: block;
        }

        .lupa-sandi {
            font-size: 0.75rem;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .lupa-sandi:hover {
            color: #1e3a8a;
            text-decoration: underline;
        }

        .custom-checkbox-label {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
            font-size: 0.78rem;
            cursor: pointer;
            user-select: none;
        }

        .custom-checkbox-label input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #1e3a8a;
            cursor: pointer;
        }

        .btn-masuk {
            width: 100%;
            padding: 11px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 6px;
            letter-spacing: 0.3px;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(30, 58, 138, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-masuk:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e3a8a 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(30, 58, 138, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 16px 0 14px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider-text {
            color: #94a3b8;
            font-size: 0.74rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .bottom-links {
            text-align: center;
            font-size: 0.78rem;
        }

        .bottom-links a {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
        }

        .bottom-links a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        .bottom-links span {
            color: #64748b;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 14px;
            color: #64748b;
            font-size: 0.76rem;
            text-decoration: none;
            transition: color 0.2s;
            font-weight: 500;
        }

        .back-link:hover {
            color: #0f172a;
        }

        .alert {
            border-radius: 8px;
            font-size: 0.8rem;
            padding: 8px 12px;
            margin-bottom: 14px;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .alert-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        @media (max-height: 640px) {
            body {
                padding: 10px 15px;
            }
            .login-card {
                padding: 20px 22px;
            }
            .brand-header {
                margin-bottom: 12px;
            }
            .brand-logo {
                width: 48px;
                height: 48px;
                margin-bottom: 4px;
            }
            .form-group {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">

            <div class="brand-header">
                <img src="{{ asset('Frontend/img/aya_logo.png') }}" class="brand-logo" alt="AYA PlayStation">
                <div class="brand-title">AYA PlayStation</div>
                <div class="brand-subtitle">Silakan masukkan email dan kata sandi Anda</div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('status'))
                <div class="alert alert-info">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@contoh.com"
                        value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label" style="margin-bottom: 0;">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a class="lupa-sandi" href="{{ route('password.request') }}">Lupa Sandi?</a>
                        @endif
                    </div>
                    <div style="position: relative; margin-top: 4px;">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan kata sandi" required style="padding-right: 42px;">
                        <button type="button" id="togglePasswordBtn" 
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #64748b; font-size: 0.95rem; padding: 4px; display: flex; align-items: center; justify-content: center;"
                            title="Tampilkan / Sembunyikan Kata Sandi">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 16px;">
                    <label class="custom-checkbox-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat Saya di Perangkat Ini
                    </label>
                </div>

                <button type="submit" class="btn-masuk">
                    <i class="fas fa-sign-in-alt"></i> <span>Masuk Sekarang</span>
                </button>

            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">atau</span>
                <div class="divider-line"></div>
            </div>

            <div class="bottom-links">
                <span>Belum punya akun? </span>
                <a href="{{ route('register') }}">Daftar sebagai Pelanggan</a>
            </div>

            <a href="{{ route('welcome') }}" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePasswordBtn && passwordInput && eyeIcon) {
            togglePasswordBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                    eyeIcon.style.color = '#1e3a8a';
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                    eyeIcon.style.color = '#64748b';
                }
            });
        }
    </script>
</body>

</html>
