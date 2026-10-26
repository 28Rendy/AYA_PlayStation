@extends('layout.main')
@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pengeluaran</h6>
                
                    <a href="{{ route('pengeluaran.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Kas Keluar </th>
                                <th>Keterangan </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pengeluaran as $pengeluaran)
                                <tr>
                    
                                    <td>{{ $pengeluaran->hari }}</td>
                                    <td>{{ $pengeluaran->tanggal }}</td>
                                    <td>{{ $pengeluaran->bulan }}</td>
                                    <td>{{ $pengeluaran->tahun }}</td>
                                    <td>{{ $pengeluaran->kas_keluar }}</td>
                                    <td>{{ $pengeluaran->keterangan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pengeluaran.edit', $pengeluaran->nama) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pengeluaran.destroy', $pengeluaran->nama) }}" method="POST"
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
