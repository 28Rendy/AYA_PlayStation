<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('Backend/img/logo/aya_logo.png') }}" rel="icon">
    <title>Login - AYA PlayStation</title>
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <!-- Tambahkan elemen img di sini -->
                                        <img src="{{ asset('Backend/img/logo/aya_logo.png') }}"
                                            class="img-fluid mb-4 shadow-sm" style="max-width: 120px; border-radius: 16px;">
                                        <h1 class="h4 text-gray-900 font-weight-bold mb-4">Login Admin AYA PlayStation</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Masukkan Email">
                                            @error('email')
                                                <span class="invalidfeedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Masukkan Password">
                                            @error('password')
                                                <span class="invalidfeedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 offset-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 offset-md-12">

                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                        </div>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="register">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Login Content -->

    <script src="{{ asset('Backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Backend/js/ruang-admin.min.js') }}"></script>
</body>

</html>
