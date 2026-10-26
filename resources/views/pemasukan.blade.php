@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pemasukan</h6>
                    <a class="m-0 float-right btn btn-primary btn-sm" href="DTperental">Lihat Data <i
                            class="fas fa-chevron-right"></i></a>
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
                                <th>Kas Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kasMasukGabungan as $kas)
                                <tr>
                                
                                    <td>{{ $kas->hari }}</td>
                                    <td>{{ $kas->tanggal }}</td>
                                    <td>{{ $kas->bulan }}</td>
                                    <td>{{ $kas->tahun }}</td>
                                    <td>{{ number_format($kas->total_kas_masuk, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Popup -->
    <div class="modal fade" id="ubahPeriodeModal" tabindex="-1" role="dialog" aria-labelledby="ubahPeriodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPeriodeModalLabel">Ubah Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('ubahPeriode', ['id' => $kas->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal"
                                value="{{ old('tanggal') }}">
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari:</label>
                            <input type="text" class="form-control" id="hari" name="hari"
                                value="{{ old('hari') }}">
                        </div>
                        <div class="form-group">
                            <label for="bulan">Bulan:</label>
                            <input type="text" class="form-control" id="bulan" name="bulan"
                                value="{{ old('bulan') }}">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun:</label>
                            <input type="text" class="form-control" id="tahun" name="tahun"
                                value="{{ old('tahun') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $('#ubahPeriodeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Tombol yang diklik
        var tanggal = button.data('tanggal');
        var hari = button.data('hari');
        var bulan = button.data('bulan');
        var tahun = button.data('tahun');

        // Isi form di dalam modal
        var modal = $(this);
        modal.find('#tanggal').val(tanggal);
        modal.find('#hari').val(hari);
        modal.find('#bulan').val(bulan);
        modal.find('#tahun').val(tahun);
    });
</script>
