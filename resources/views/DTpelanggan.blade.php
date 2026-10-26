@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Registrasi Pelanggan</h6>
                    <a href="{{ route('DTpelanggan.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-user-plus mr-1"></i> Tambah Pelanggan
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Tanggal Registrasi</th>
                                <th style="width: 120px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_pelanggan as $index => $pelanggan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ $pelanggan->name }}</div>
                                    </td>
                                    <td>{{ $pelanggan->email }}</td>
                                    <td>
                                        <span class="badge badge-light border">
                                            <i class="far fa-calendar-alt text-primary mr-1"></i>
                                            {{ $pelanggan->created_at ? $pelanggan->created_at->format('d M Y, H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('DTpelanggan.edit', $pelanggan->id) }}" class="btn btn-sm btn-warning" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('DTpelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan {{ $pelanggan->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada data pelanggan yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
