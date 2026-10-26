@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengeluaran</h6>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('pengeluaran.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="admin_nama">Nama Admin</label>
                            <select class="form-control" id="admin_nama" name="admin_nama" required>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->nama }}">{{ $admin->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_ruang">Nama Toko/Individu</label>
                            <input type="text" class="form-control" id="hari" name="nama"
                                placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nomor_ruang">Kas Keluar</label>
                            <input type="text" class="form-control" id="kas_keluar" name="kas_keluar"
                                placeholder="Masukkan Kas Keluar" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_ruang">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Masukkan keterangan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
