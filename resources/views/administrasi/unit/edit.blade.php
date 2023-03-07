@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
    <div class="container p-2 mb-3">
        

        <div class="card">
            <div class="card-header bg-secondary-subtle d-flex justify-content-between">
                <h5>Edit Unit</h5>
                <div>
                    <a href="{{ route('admin.unit') }}" class="btn btn-sm btn-info text-white">
                        Kembali Ke Daftar
                    </a>
                </div>
            </div>
            <div class="card-body">
            <div class=" bg-light p-4 rounded-3 shadow">
                    <table id="example" class="table table-bordered table-striped dataTable" style="width:100%">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Kode Unit</th>
                                <th>Nama Unit</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('admin.unit.update', $unit->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                                <tr>
                                        <td>#</td>
                                        <td>
                                            <input type="text" class="form-control" name="kode_unit" value="{{ old('kode_unit', $unit->kode_unit) }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="nama_unit" value="{{ old('nama_unit', $unit->nama_unit) }}">
                                        </td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan">
                                                <i class="bi bi-save"></i>
                                            </button>
                                            <button type="reset" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </td>
                                </tr>
                            </form>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Unit</th>
                                <th>Nama Unit</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection