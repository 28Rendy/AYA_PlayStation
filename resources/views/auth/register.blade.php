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

        .register-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            margin: auto;
        }

        .register-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 26px 26px;
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
            margin-bottom: 16px;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.15);
            margin-bottom: 6px;
            border: 2px solid #ffffff;
        }

        .brand-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
            letter-spacing: -0.3px;
        }

        .brand-subtitle {
            font-size: 0.78rem;
            color: #64748b;
        }

        .pelanggan-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 600;
            margin-top: 4px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
        }

        .form-group {
            margin-bottom: 11px;
        }

        .form-label {
            color: #334155;
            font-size: 0.78rem;
            font-weight: 600;
            margin-bottom: 3px;
            display: block;
        }

        .form-control {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            color: #0f172a;
            padding: 9px 13px;
            font-size: 0.85rem;
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
            font-size: 0.72rem;
            margin-top: 3px;
            display: block;
        }

        .btn-daftar {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.88rem;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 6px;
            letter-spacing: 0.3px;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1d4ed8 0%, #1e3a8a 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(29, 78, 216, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-daftar:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(29, 78, 216, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 14px 0 12px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        .divider-text {
            color: #94a3b8;
            font-size: 0.72rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .bottom-links {
            text-align: center;
            font-size: 0.76rem;
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
            margin-top: 10px;
            color: #64748b;
            font-size: 0.74rem;
            text-decoration: none;
            transition: color 0.2s;
            font-weight: 500;
        }

        .back-link:hover {
            color: #0f172a;
        }

        @media (max-height: 680px) {
            body {
                padding: 10px 15px;
            }
            .register-card {
                padding: 18px 20px;
            }
            .brand-header {
                margin-bottom: 10px;
            }
            .brand-logo {
                width: 44px;
                height: 44px;
                margin-bottom: 2px;
            }
            .form-group {
                margin-bottom: 8px;
            }
        }
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

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Nama lengkap" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="email@contoh.com" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Minimal 8 karakter" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 14px;">
                    <label class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="form-control" placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" class="btn-daftar">
                    <i class="fas fa-user-plus"></i> <span>Daftar Sekarang</span>
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

            <a href="{{ route('welcome') }}" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>
