<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('Backend/img/logo/logoBarca.png') }}" rel="icon">
    <title>RuangAdmin Barcelona PlayStation</title>
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="{{ asset('Backend/img/logo/logoBarca2.jfif') }}"
                                            class="img-fluid mb-4" style="max-width: 150px;">

                                            <h1 class="h4 text-gray-900 font-weight-bold mb-4">Registrasi Admin Baru</h1>
                                    </div>
                                    <form action="{{route('register-proses')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label> Nama Admin</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputFirstName"
                                                placeholder="Masukkan Nama">
                                                @error('nama')
                                                <span class="invalidfeedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Masukkan Email ">
                                                @error('email')
                                                <span class="invalidfeedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Masukkan Password">
                                                @error('password')
                                                <span class="invalidfeedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                               
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="login">Already have an account?</a>
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

    <script src="{{ asset('Backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Backend/js/ruang-admin.min.js') }}"></script>
</body>

</html>
