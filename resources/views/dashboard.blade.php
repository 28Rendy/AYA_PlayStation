@extends('layout.main')
@section('content')
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pemasukan Bulanan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($pemasukanTotalBulanan, 0, ',', '.') }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                    3.48%</span>
                                <span>Bulan Ini</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Player Perbulan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPerentalMonthly }} Orang</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span>Bulan Ini</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Player Minggun ini</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalPerentalWeekly }} Orang</div>
                            <div class="mt-2 mb-0 text-muted text-xs">

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-success"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->

        <!-- data tables Ruang -->

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ruang</h6>
                    <a class="m-0 float-right btn btn-primary btn-sm" href="DTruang">Lihat Ruang <i
                            class="fas fa-chevron-right"></i></a>
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor Ruang</th>
                                <th>Kapasitas</th>
                                <th>Perangkat yang Tersedia</th>
                                <th>Harga Per Jam</th>
                                <th>Status Ruang</th>
                                <th>Jam Operasional</th>
                                <th>Kondisi Perangkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_ruang as $ruang)
                                <tr>
                                    <td>{{ $ruang->nomor_ruang }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td>{{ $ruang->perangkat_tersedia }}</td>
                                    <td>{{ $ruang->harga_perjam }}</td>
                                    <td>
                                        <span class="badge 
                                            {{ $ruang->status_ruang == 'Tersedia' ? 'badge-success' : 
                                                ($ruang->status_ruang == 'Tidak Tersedia' ? 'badge-danger' : 'badge-secondary') }}">
                                            {{ $ruang->status_ruang ?? 'Tidak Diketahui' }}
                                        </span>
                                    </td>
                                    <td>{{ $ruang->jam_operasional }}</td>
                                    <td>{{ $ruang->kondisi_perangkat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Area Chart -->

        <!-- Pie Chart -->

        <!-- Invoice Example -->

        <!-- Message From Customer-->
        {{-- <script>
                function confirmLogout() {
                    if (confirm('Apakah Anda yakin ingin keluar?')) {
                        document.getElementById('logout-form').submit();
                    }
                }
            </script> --}}
    </div>
@endsection
