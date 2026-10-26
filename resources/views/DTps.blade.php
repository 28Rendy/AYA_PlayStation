@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Playstation</h6>
                    <a href="{{ route('DTps.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Playstation</th>
                                <th>Stok</th>
                                <th>Harga Perjam</th>
                                <th>Status Playstation</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_ps as $ps)
                                <tr>
                                    <td>{{ $ps->nama_ps }}</td>
                                    <td>{{ $ps->stok }}</td>
                                    <td>Rp.{{ number_format($ps->harga_per_hari, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge {{ $ps->status_ps == 'Tersedia' ? 'badge-success' : 'badge-danger' }}">{{ $ps->status_ps }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('DTps.edit', $ps->id) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('DTps.destroy', $ps->id) }}" method="POST"
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


