@extends('layout.main')
@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Perental</h6>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('DTperental.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nomor_ruang">Nomor Ruang</label>
                        <select class="form-control" id="nomor_ruang" name="nomor_ruang" required>
                            @foreach ($nruang as $ruang)
                                <option value="{{ $ruang->nomor_ruang }}" data-harga="{{ $ruang->harga_perjam }}">
                                    {{ $ruang->nomor_ruang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control " id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="clockPicker2">Jam Masuk</label>
                        <div class="input-group clockpicker" id="clockPicker2">
                            <input type="text" class="form-control  @error('jam_masuk') is-invalid @enderror"
                                name="jam_masuk" value="">
                            @error('jam_masuk')
                                <span class="invalid-feedback alert-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Keluar</label>
                        <div class="input-group clockpicker" id="">
                            <input type="" class="form-control" name="jam_keluar" value=""
                                placeholder="Tolong Masukan Jam Sewa" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jam_sewa">Jam Sewa</label>
                        <input type="number" class="form-control" id="jam_sewa" name="jam_sewa"
                            placeholder="Contoh '2' Jam " required>
                    </div>
                    <div class="form-group">
                        <label for="harga_perjam">Harga Perjam</label>
                        <input type="number" class="form-control" id="harga_perjam" name="harga_perjam" readonly>
                    </div>


                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengatur jam masuk sesuai waktu saat ini
        function setJamMasukSaatKlik() {
            const jamMasukInput = document.querySelector('input[name="jam_masuk"]');

            // Event listener untuk fokus (focus event)
            jamMasukInput.addEventListener('focus', function() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');

                // Format HH:mm
                const currentTime = `${hours}:${minutes}`;
                this.value = currentTime; // Set waktu ke input
                updateJamKeluar(); // Perbarui Jam Keluar setelah Jam Masuk diatur
            });
        }

        // Fungsi untuk mengatur harga perjam sesuai dengan nomor ruang pertama yang terpilih
        function initializeForm() {
            const nomorRuangSelect = document.getElementById('nomor_ruang');
            const hargaPerJamInput = document.getElementById('harga_perjam');

            if (nomorRuangSelect.options.length > 0) {
                const firstOption = nomorRuangSelect.options[0];
                const hargaPerJam = firstOption.dataset.harga || 0;
                hargaPerJamInput.value = hargaPerJam; // Set harga perjam awal
            }
        }

        // Fungsi untuk menghitung Jam Keluar
        function updateJamKeluar() {
            const jamMasukInput = document.querySelector('input[name="jam_masuk"]').value;
            const jamSewaInput = parseInt(document.getElementById('jam_sewa').value) || 0;

            // Pastikan format waktu Jam Masuk valid (HH:mm)
            if (jamMasukInput && jamMasukInput.includes(':')) {
                const [hours, minutes] = jamMasukInput.split(':').map(Number);

                // Tambahkan Jam Sewa ke Jam Masuk
                const jamKeluar = new Date();
                jamKeluar.setHours(hours + jamSewaInput);
                jamKeluar.setMinutes(minutes);

                // Format Jam Keluar menjadi HH:mm
                const jamKeluarFormatted =
                    `${String(jamKeluar.getHours()).padStart(2, '0')}:${String(jamKeluar.getMinutes()).padStart(2, '0')}`;

                // Set Jam Keluar ke input
                document.querySelector('input[name="jam_keluar"]').value = jamKeluarFormatted;
            }
        }

        // Jalankan fungsi initializeForm saat halaman pertama kali dimuat
        window.addEventListener('DOMContentLoaded', function() {
            initializeForm(); // Inisialisasi nomor ruang dan harga perjam
            setJamMasukSekarang(); // Set jam masuk
            updateJamKeluar(); // Hitung dan set jam keluar

        });

        // Event listener untuk mengupdate jam keluar saat jam sewa diubah
        document.getElementById('jam_sewa').addEventListener('input', updateJamKeluar);

        // Event listener untuk mengupdate jam keluar saat jam masuk diubah secara manual
        document.querySelector('input[name="jam_masuk"]').addEventListener('input', updateJamKeluar);

        document.getElementById('nomor_ruang').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const hargaPerJam = selectedOption.dataset.harga || 0; // Ambil harga perjam
            document.getElementById('harga_perjam').value = hargaPerJam; // Set harga perjam pada input
        });

        document.getElementById('jam_sewa').addEventListener('input', function() {
            updateTotalBayar(); // Update total bayar ketika jam sewa berubah
        });

        function updateTotalBayar() {
            const jamSewa = parseFloat(document.getElementById('jam_sewa').value) || 0;
            const hargaPerJam = parseFloat(document.getElementById('harga_perjam').value) || 0;
            const totalBayar = jamSewa * hargaPerJam;
            document.getElementById('total_bayar').value = totalBayar;
        }
    </script>
@endsection
