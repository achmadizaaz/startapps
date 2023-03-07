@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
   <div class="container p-2 mb-3">
        <div class="d-flex  justify-content-between mb-3 p-3">
            <h4>DAFTAR UNIT</h4>
            <a href="{{ route('admin.unit.create') }}" class="btn btn-success">Tambah Unit</a>
        </div>
        <div class=" bg-light p-4 rounded-3 shadow">
            <table id="example" class="table table-bordered table-striped dataTable" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $unit->kode_unit }}</td>
                        <td>{{ $unit->nama_unit }}</td>
                        <td>
                            <a href="{{ route('admin.unit.edit', $unit->slug) }}" class="btn btn-sm btn-warning text-white" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" title="Hapus"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
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