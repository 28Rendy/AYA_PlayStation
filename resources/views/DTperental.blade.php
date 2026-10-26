@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Perental</h6>
                    <a href="{{ route('DTperental.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor Ruang</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Jam Sewa</th>
                                <th>Harga Perjam</th>
                                <th>Total Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <!-- Optionally add footer if needed -->
                        </tfoot>
                        <tbody>
                            @foreach ($dataPerental as $item)
                            <tr>
                                <td>{{ $item->nomor_ruang }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jam_masuk }}</td>
                                <td>{{ $item->jam_keluar }}</td>
                                <td>{{ $item->jam_sewa }}</td>
                                <td>{{ $item->harga_perjam }}</td>
                                <td>{{ $item->total_bayar }}</td>
                                <td class="text-center">
                                    <a href="{{ route('DTperental.edit', $item->nama) }}" class="btn btn-sm btn-warning"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('DTperental.destroy', $item->nama) }}" method="POST"
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
