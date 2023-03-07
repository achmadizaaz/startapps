@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
   <div class="container p-2 mb-3">
        <div class="d-flex  justify-content-between mb-3 p-3">
            <h4>DAFTAR USER</h4>
            <a href="{{ route('admin.user.create') }}" class="btn btn-success">Tambah Pengguna</a>
        </div>
        <div class=" bg-light p-4 rounded-3 shadow">

            <table id="example" class="table table-bordered table-striped dataTable" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Login Terakhir</th>
                        <th>IP Login Terakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{$loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->last_login_at }}

                                @empty( $user->last_login_at )
                                   <span class="fst-italic">-</span>
                                @endempty

                            </td>
                            <td>
                                {{ $user->last_login_ip }}
                                @empty( $user->last_login_ip )
                                <span class="fst-italic">-</span>
                             @endempty
                            </td>
                            <td>
                                <a href="{{ route('admin.user.show', $user->slug) }}" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Katasandi">
                                    <i class="bi bi-recycle"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
                <tfoot class="bg-secondary text-white">
                    <tr>
                        <th class="text-center"ss>No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Login Terakhir</th>
                        <th>IP Login Terakhir</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
   </div>


   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
   <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
   </script>
@endsection