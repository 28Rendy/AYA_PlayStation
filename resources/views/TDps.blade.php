@extends('layout.main')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah PS</h6>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('DTps.store') }}" method="POST">
                    @csrf <!-- Token keamanan wajib disertakan -->
                    <div class="form-group">
                        <label for="nama_ps">Nama Playstation</label>
                        <input type="text" class="form-control" id="nama" name="nama_ps" placeholder="Masukkan Nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="harga_per_hari">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga_per_hari"
                            placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="status_ps">Status</label>
                        <select class="form-control form-control-sm mb-3" id="status" name="status_ps">
                            <option value="tersedia">Tersedia</option>
                            <option value="stok habis">Stok Habis</option>
                            <option value="rusak">rusak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('DTps.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
