@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pelanggan</h6>
                    <a href="{{ route('DTpelanggan.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('DTpelanggan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Lengkap Pelanggan</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama pelanggan" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Alamat Email</label>
                            <input type="email" name="email" class="form-control" placeholder="pelanggan@contoh.com" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kata Sandi (Password)</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi kata sandi" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('DTpelanggan.index') }}" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save mr-1"></i> Simpan Data Pelanggan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
