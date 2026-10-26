@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
                    <a href="{{ route('DTpenyewa.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Hp</th>
                                <th>PS</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_penyewa as $penyewa)
                                <tr>
                                    <td>{{ $penyewa->nama_penyewa }}</td>
                                    <td>{{ $penyewa->alamat }}</td>
                                    <td>{{ $penyewa->telepon }}</td>
                                    <td>{{ $penyewa->ps->nama_ps ?? 'N/A' }}</td>
                                    <td>{{ $penyewa->tanggal_sewa }}</td>
                                    <td>{{ $penyewa->tanggal_kembali }}</td>
                                    <td>Rp.{{ number_format($penyewa->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $penyewa->status_sewa == 'dipinjam' ? 'badge-success' : 'badge-danger' }}">
                                            {{ $penyewa->status_sewa }}
                                    <td class="text-center">
                                        <a href="{{ route('DTpenyewa.edit', $penyewa->id) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('DTpenyewa.destroy', $penyewa->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
