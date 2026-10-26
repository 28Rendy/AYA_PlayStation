@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Pengeluaran</h6>
                </div>
                <div class="table-responsive p-3">
                    <form action="{{ route('pengeluaran.update', $pengeluaran->nama) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <form action="{{ route('pengeluaran.update', $pengeluaran->nama) }}" method="POST">
                            @csrf
                            @method('PUT')  <!-- Tambahkan metode PUT untuk update data -->
                            
                            <!-- Field Nama Admin -->
                            <div class="form-group">
                                <label for="admin_nama">Nama Admin</label>
                                <select class="form-control" id="admin_nama" name="admin_nama" required>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->nama }}" 
                                            {{ $admin->nama == old('admin_nama', $pengeluaran->admin_nama ?? '') ? 'selected' : '' }}>
                                            {{ $admin->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <!-- Field Nama -->
                            <div class="form-group">
                                <label for="nama">Nama Toko/Individu</label>
                                <input value="{{ old('nama', $pengeluaran->nama ?? '') }}" type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama" required>
                            </div>
                        
                            <!-- Field Tanggal -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                       value="{{ old('tanggal', \Carbon\Carbon::parse($pengeluaran->tanggal ?? '')->format('Y-m-d')) }}" required>
                            </div>
                        
                            <!-- Field Kas Keluar -->
                            <div class="form-group">
                                <label for="kas_keluar">Kas Keluar</label>
                                <input value="{{ old('kas_keluar', $pengeluaran->kas_keluar ?? '') }}" type="text" class="form-control" id="kas_keluar" name="kas_keluar" placeholder="Masukkan Kas Keluar" required>
                            </div>
                            
                        
                            <!-- Field Keterangan -->
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                       value="{{ old('keterangan', $pengeluaran->keterangan ?? '') }}" placeholder="Masukkan Keterangan" required>
                            </div>
                        
                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        
            </div>
        </div>
    </div>
@endsection
