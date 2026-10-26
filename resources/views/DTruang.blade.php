@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ruang</h6>
                    <a href="{{ route('DTruang.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>

                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Nomor Ruang</th>
                                <th style="width: 15%;">Kapasitas</th>
                                <th style="width: 15%;">Perangkat yang Tersedia</th>
                                <th style="width: 15%;">Harga Per Jam</th>
                                <th style="width: 15%;">Jam Operasional</th>
                                <th style="width: 15%;">Nama Admin</th>
                                <th style="width: 15%;">Status Ruang</th>
                                <th style="width: 15%;">Kondisi Perangkat</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_ruang as $ruang)
                                {{-- @php
                                    // Waktu saat ini
                                    $currentTime = date('H:i:s');
                                    // Default status
                                    $status = 'Tersedia';

                                    foreach ($data_perental as $rental) {
                                        // Cocokkan berdasarkan nomor ruang
                                        if ($rental->nomor_ruang == $rental->nomor_ruang) {
                                            // Periksa apakah waktu sekarang berada di rentang jam masuk dan keluar
                                            if (
                                                $currentTime >= $rental->jam_masuk &&
                                                $currentTime <= $rental->jam_keluar
                                            ) {
                                                $status = 'Tidak Tersedia';
                                                break; // Hentikan loop jika ditemukan penyewa aktif
                                            }
                                        }
                                    }
                                @endphp --}}
                                <tr>
                                    <td>{{ $ruang->nomor_ruang }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td>{{ $ruang->perangkat_tersedia }}</td>
                                    <td>Rp. {{ number_format($ruang->harga_perjam, 0, ',', '.') }}</td>
                                    <td>{{ $ruang->jam_operasional }}</td>
                                    <td>{{ $ruang->admin_nama }}</td>
                                    <td>
                                        <span class="badge {{ $ruang->status_ruang == 'Tersedia' ? 'badge-success' : ($ruang->status_ruang == 'Tidak Tersedia' ? 'badge-danger' : 'badge-secondary') }}">
                                            {{ $ruang->status_ruang ?? 'Tidak Diketahui' }}
                                        </span>
                                    </td>
                                    <td>{{ $ruang->kondisi_perangkat }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('DTruang.edit', $ruang->nomor_ruang) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('DTruang.destroy', $ruang->nomor_ruang) }}" method="POST"
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



{{-- {{ route('ruang.edit', $ruang->nomor_ruang) }} --}}
{{-- {{ route('ruang.destroy', $ruang->nomor_ruang) }} --}}
