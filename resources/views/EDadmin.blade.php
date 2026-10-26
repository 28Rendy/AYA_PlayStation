@extends('layout.main')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Admin</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('DTadmin.update', $admin->nama) }}" method="POST">
                    @method('PUT')
                    @csrf <!-- Token keamanan wajib disertakan -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" value="{{ old('nama', $admin->nama) }}" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ old('email', $admin->email) }}" class="form-control" id="email" name="email"
                            placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
