@extends('layout.main')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Penyewa</h6>
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
                <form action="{{ route('DTpenyewa.update', $data_penyewa->id) }}" method="POST">
                    @method('PUT')
                    @csrf <!-- Token keamanan wajib disertakan -->
                    <div class="form-group">
                        <label for="nama_penyewa">Nama</label>
                        <input type="text" class="form-control"
                            value="{{ old('nama_penyewa', $data_penyewa->nama_penyewa) }}" id="nama"
                            name="nama_penyewa" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" value="{{ old('alamat', $data_penyewa->alamat) }}"
                            id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No hp</label>
                        <input type="number" class="form-control" value="{{ old('telepon', $data_penyewa->telepon) }}"
                            id="hp" name="telepon" placeholder="Masukkan No hp" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sewa">Tanggal Sewa</label>
                        <input type="date" class="form-control"
                            value="{{ old('tanggal_sewa', $data_penyewa->tanggal_sewa) }}" id="tanggal_sewa"
                            name="tanggal_sewa" placeholder="Masukkan Tanggal sewa" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control"
                            value="{{ old('tanggal_kembali', $data_penyewa->tanggal_kembali) }}" id="tanggal_kembali"
                            name="tanggal_kembali" placeholder="Masukkan Tanggal Kembali" required>
                    </div>
                    <div class="form-group">
                        <label for="ps_id">PS</label>
                        <select class="form-control mb-3" name="ps_id" id="ps_id" required>
                            <option value="">Pilih PS</option>
                            @foreach ($data_ps as $ps)
                                <option value="{{ $ps->id }}" data-harga="{{ $ps->harga_per_hari }}"
                                    {{ old('ps_id', $data_penyewa->ps_id) == $ps->id ? 'selected' : '' }}>
                                    {{ $ps->nama_ps }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="harga_ps">Harga Ps</label>
                        <input type="number" class="form-control" id="harga_ps"
                            value="{{ old('harga_ps', $data_penyewa->harga_ps) }}" name="harga_ps"
                            placeholder="Pilih Ps terlebih dahulu" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status_ps">Status</label>
                        <select class="form-control  mb-3" id="status" name="status_sewa">
                            <option value="dipinjam"
                                {{ old('status_sewa', $data_penyewa->status_sewa) == 'dipinjam' ? 'selected' : '' }}>
                                Dipinjam</option>
                            <option value="dikembalikan"
                                {{ old('status_sewa', $data_penyewa->status_sewa) == 'dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan</option>
                            <option value="hilang"
                                {{ old('status_sewa', $data_penyewa->status_sewa) == 'hilang' ? 'selected' : '' }}>Hilang
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('DTpenyewa.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const psSelect = document.getElementById('ps_id');
        const hargaPsInput = document.getElementById('harga_ps');

        // Event listener ketika pilihan PS berubah
        psSelect.addEventListener('change', function() {
            const selectedOption = psSelect.options[psSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');

            // Set input harga_ps dengan nilai dari data-harga
            if (harga) {
                hargaPsInput.value = harga;
            } else {
                hargaPsInput.value = ''; // Kosongkan jika tidak ada pilihan
            }
        });
    });
</script>
