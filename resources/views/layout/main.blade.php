<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('Backend/img/logo/aya_logo.png') }}" rel="icon">
    <title>Admin - AYA PlayStation</title>
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- ClockPicker -->
    <link href="{{ asset('Backend/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 -->
    <link href="{{ asset('Backend/ruang-admin/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- Bootstrap DatePicker -->
    <link href="{{ asset('Backend/ruang-admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <!-- Bootstrap Touchspin -->
    <link href="{{ asset('Backend/ruang-admin/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}"
        rel="stylesheet">
    <!-- ClockPicker -->
    <link href="{{ asset('Backend/ruang-admin/vendor/clock-picker/clockpicker.css') }}" rel="stylesheet">
    <!-- RuangAdmin CSS -->
    <link href="{{ asset('Backend/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>


<style>

.collapse-item.active {
    font-weight: bold;
    color: #4e73df !important;
}
.nav-item.active {
    border-left: 4px solid #4e73df;
}


</style>

<body id="page-top">
    <div id="wrapper">
@php
    $appPengaturan = \App\Models\PengaturanWeb::getSettings();
@endphp
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    @if($appPengaturan->logo && file_exists(public_path($appPengaturan->logo)))
                        <img src="{{ asset($appPengaturan->logo) }}" style="max-height: 42px; border-radius: 8px;">
                    @else
                        <img src="{{ asset('Backend/img/logo/aya_logo.png') }}" style="max-height: 42px; border-radius: 8px;">
                    @endif
                </div>
                <div class="sidebar-brand-text mx-3">{{ $appPengaturan->nama_rental ?? 'AYA PlayStation' }}</div>
            </a>
            <hr class="sidebar-divider my-0">
<!-- Sidebar Navigation -->
<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>  <!-- Ikon untuk Dashboard -->
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">
<div class="sidebar-heading">Master Data</div>

<!-- Master -->
<li class="nav-item {{ request()->routeIs('DTadmin.*', 'DTpelanggan.*', 'DTruang.*', 'DTps.*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
        aria-expanded="{{ request()->routeIs('DTadmin.*', 'DTpelanggan.*', 'DTruang.*', 'DTps.*') ? 'true' : 'false' }}" 
        aria-controls="collapseMaster">
        <i class="fas fa-fw fa-database"></i>
        <span>Master</span>
    </a>
    <div id="collapseMaster" 
        class="collapse {{ request()->routeIs('DTadmin.*', 'DTpelanggan.*', 'DTruang.*', 'DTps.*') ? 'show' : '' }}" 
        aria-labelledby="headingMaster" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Master</h6>
            <a class="collapse-item {{ request()->routeIs('DTadmin.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTadmin.index') }}">Data Admin</a>
            <a class="collapse-item {{ request()->routeIs('DTpelanggan.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTpelanggan.index') }}">Data Pelanggan</a>
            <a class="collapse-item {{ request()->routeIs('DTruang.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTruang.index') }}">Data Ruang</a>
            <a class="collapse-item {{ request()->routeIs('DTps.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTps.index') }}">Data PlayStation</a>
        </div>
    </div>
</li>

<hr class="sidebar-divider">
<div class="sidebar-heading">Transaksi & Laporan</div>

<!-- Tampilan Data -->
<li class="nav-item {{ request()->routeIs('DTperental.*', 'DTpenyewa.*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
        aria-expanded="{{ request()->routeIs('DTperental.*', 'DTpenyewa.*') ? 'true' : 'false' }}" 
        aria-controls="collapseTable">
        <i class="fas fa-fw fa-table"></i>
        <span>Tampilan Data</span>
    </a>
    <div id="collapseTable" 
        class="collapse {{ request()->routeIs('DTperental.*', 'DTpenyewa.*') ? 'show' : '' }}" 
        aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Rental</h6>
            <a class="collapse-item {{ request()->routeIs('DTperental.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTperental.index') }}">Data Perental</a>
            <a class="collapse-item {{ request()->routeIs('DTpenyewa.*') ? 'active font-weight-bold' : '' }}" 
                href="{{ route('DTpenyewa.index') }}">Data Penyewa</a>
        </div>
    </div>
</li>

<!-- Laporan -->
<li class="nav-item {{ request()->is('pemasukan', 'pengeluaran') || request()->routeIs('pemasukan.*', 'pengeluaran.*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
        aria-expanded="{{ request()->is('pemasukan', 'pengeluaran') || request()->routeIs('pemasukan.*', 'pengeluaran.*') ? 'true' : 'false' }}" 
        aria-controls="collapseForm">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseForm" 
        class="collapse {{ request()->is('pemasukan', 'pengeluaran') || request()->routeIs('pemasukan.*', 'pengeluaran.*') ? 'show' : '' }}" 
        aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
            <a class="collapse-item {{ request()->routeIs('pemasukan.*') ? 'active font-weight-bold' : '' }}" href="{{ route('pemasukan.index') }}">Pemasukan Kas</a>
            <a class="collapse-item {{ request()->routeIs('pengeluaran.index') ? 'active font-weight-bold' : '' }}" href="{{ route('pengeluaran.index') }}">Pengeluaran Kas</a>
        </div>
    </div>
</li>

<hr class="sidebar-divider">
<div class="sidebar-heading">Pengaturan & Interaksi</div>

<!-- Ulasan -->
<li class="nav-item {{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('ulasan.index') }}">
        <i class="fas fa-fw fa-comments"></i>
        <span>Ulasan</span>
    </a>
</li>

<!-- Pengaturan Website & Media -->
<li class="nav-item {{ request()->routeIs('pengaturan-web.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pengaturan-web.index') }}">
        <i class="fas fa-fw fa-sliders-h"></i>
        <span>Pengaturan Website</span>
    </a>
</li>

            <hr class="sidebar-divider">


            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                    onclick="event.preventDefault();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                            placeholder="What do you want to look for?" aria-label="Search"
                                            aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('Backend/img/logo/aya_logo.png') }}" style="max-width: 50px">
                                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::guard('admin')->user()->nama ?? Auth::user()->name ?? 'Admin AYA PlayStation' }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $judul }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $judul }}</li>
                        </ol>
                    </div>

                    @yield('content')
                    <!--Row-->
                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Pemberitahuan...!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Wahh.. apakah benar anda ingin keluar ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Batal</button>
                                    <form id="logout-form-modal" action="{{ route('logout') }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Yaa Keluar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> - <b>AYA PlayStation Management System</b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('Backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Backend/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('Backend/js/demo/chart-area-demo.js') }}"></script>

    <script src="{{ asset('Backend/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Backend/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- ClockPicker -->
    <script src="{{ asset('Backend/vendor/clock-picker/clockpicker.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('Backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('Backend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <!-- Bootstrap Datepicker -->
    <script src="{{ asset('Backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap Touchspin -->
    <script src="{{ asset('Backend/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('Backend/vendor/clock-picker/clockpicker.js') }}"></script>

    <script>
        $(document).ready(function() {


            $('.select2-single').select2();

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder').select2({
                placeholder: "Select a Province",
                allowClear: true
            });

            // Select2 Multiple
            $('.select2-multiple').select2();

            // Bootstrap Date Picker
            $('#simple-date1 .input-group.date').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
            });

            $('#simple-date2 .input-group.date').datepicker({
                startView: 1,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date3 .input-group.date').datepicker({
                startView: 2,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date4 .input-daterange').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            // TouchSpin

            $('#touchSpin1').TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
                initval: 0
            });

            $('#touchSpin2').TouchSpin({
                min: 0,
                max: 100,
                decimals: 2,
                step: 0.1,
                postfix: '%',
                initval: 0,
                boostat: 5,
                maxboostedstep: 10
            });

            $('#touchSpin3').TouchSpin({
                min: 0,
                max: 100,
                initval: 0,
                boostat: 5,
                maxboostedstep: 10,
                verticalbuttons: true,
            });

            $('#clockPicker1').clockpicker({
                donetext: 'Done'
            });

            $('#clockPicker2').clockpicker({
                autoclose: true
            });

            

            let input = $('#clockPicker3').clockpicker({
                autoclose: true,
                'default': 'now',
                placement: 'top',
                align: 'left',
            });

            $('#check-minutes').click(function(e) {
                e.stopPropagation();
                input.clockpicker('show').clockpicker('toggleView', 'minutes');
            });

        });
        
    </script>
      <script>
        $(document).ready(function () {
          $('#dataTable').DataTable(); // ID From dataTable 
          $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
      </script>
    


</body>

</html>
