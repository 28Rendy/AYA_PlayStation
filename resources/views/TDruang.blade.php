@extends('layout.main')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Ruang</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('DTruang.store') }}" method="POST">
                    @csrf <!-- Token keamanan wajib disertakan -->

                    <div class="form-group">
                        <label for="nomor_ruang">Nomor Ruang</label>
                        <input type="text" class="form-control" id="nomor_ruang" name="nomor_ruang"
                            placeholder="contoh '001'" required>
                    </div>

                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <select class="form-control form-control-sm mb-3" id="kapasitas" name="kapasitas">
                            <option value="1 Orang">1 Orang</option>
                            <option value="2 Orang">2 Orang</option>
                            <option value="3 Orang">3 Orang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="perangkat_tersedia">Perangkat yang Tersedia</label>
                        <input type="text" class="form-control" id="perangkat_tersedia" name="perangkat_tersedia"
                            placeholder="Masukkan perangkat yang tersedia" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_perjam">Harga Per Jam</label>
                        <input type="number" class="form-control" id="harga_perjam" name="harga_perjam"
                            placeholder="Masukkan harga contoh 8000" required>
                    </div>

                    <div class="form-group">
                        <label for="clockPicker2">Jam Operasional</label>
                        <div class="input-group clockpicker" id="clockPicker2">
                            <input type="text" class="form-control" name="jam_operasional" value="">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_ruang">Status Ruang</label>
                        <select class="form-control" id="status_ruang" name="status_ruang" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kondisi_perangkat">Kondisi Perangkat</label>
                        <input type="text" class="form-control" id="kondisi_perangkat" name="kondisi_perangkat"
                            placeholder="Masukkan kondisi perangkat" required>
                    </div>

                    <div class="form-group">
                        <label for="admin_nama">Nama Admin</label>
                        <select class="form-control" id="admin_nama" name="admin_nama" required>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->nama }}">{{ $admin->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
