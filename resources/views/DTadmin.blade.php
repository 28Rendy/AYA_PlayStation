@extends('layout.main')
@section('content')
    <!-- Mulai section untuk konten -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                    <a href="{{ route('DTadmin.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_admin as $admin)
                                <tr>
                                    <td>{{ $admin->nama }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->password }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('DTadmin.edit', $admin->nama) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('DTadmin.destroy', $admin->nama) }}" method="POST"
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


