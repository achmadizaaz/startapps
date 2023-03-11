@extends('layouts.administrasi')
@section('content')
<div class="container p-2 mb-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('failed'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ session('failed') }}
            <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="d-flex  justify-content-between mb-3 p-3">
            <h4>DAFTAR USER</h4>
            {{-- {{ $role }} --}}
        </div>
        <div class="card bg-light rounded-3 shadow">
            <div class="card-header d-flex justify-content-between align-middle bg-secondary-subtle">
                <h5>Data Pengguna</h5>
                <div class="text-end">
                    <a href="#" class="btn btn-md btn-info text-white">Kembali ke Daftar</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#RoleUnitModal">
                        <i class="bi bi-person-plus-fill"></i> Tambah
                    </button>

                    <!-- Modal -->
                   

                </div>
            </div>
            
            {{-- MODAL --}}
            <div class="modal fade" id="RoleUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Role Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.user.role.tambah', $user->slug) }}" method="POST" >
                        @csrf
                        <div class="modal-body">
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <div class="mb-3">
                                    <label for="role_id" class="form-label fw-bold">Role</label>
                                    <select name="role_id" id="" class="form-select" style="width: 100%" required>
                                        <option></option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="unit_id" class="form-label fw-bold">Unit Kerja</label>
                                    <select name="unit_id" id="" class="form-select" style="width: 100%" required>
                                        <option></option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
                </div>
                </div>
            </div>
            {{-- END MODAL --}}

            <div class="card-body">
                    <div class="row">
                        <div class="col-2 border-end border-2 border-light">
                            <ul class="nav nav-pills flex-column mb-auto fw-bold" style="font-size:12px">
                                <li class="nav-item bg-secondary border-start border-3 border-primary">
                                    <a href="{{ route('admin.user.show', $user->slug) }}" class="nav-link text-white ">
                                        Data Pengguna
                                    </a>
                                </li>
                                <li class="nav-item bg-dark border-start border-3 border-secondary hover ">
                                    <a href="{{ route('admin.user.role', $user->slug) }}" class="nav-link text-white">
                                    Role Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="callout-info bg-secondary p-4 mb-3">
                                <div class="row">
                                    <div class="col-md-2 text-white">
                                        Nama Pengguna
                                    </div>
                                    <div class="col-md-4 text-white">
                                        {{ $user->name }}
                                    </div>
                                    <div class="col-md-2 text-white">
                                        Alamat Email
                                    </div>
                                    <div class="col-md-4 text-white">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                               
                                                <th>Role</th>
                                                <th>Unit Kerja</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            
                                            @foreach ($roleUnits as $roleUnit)
                                                
                                            <tr>
                                                
                                                <td>{{ $roleUnit->role->name}}</td>
                                                <td>{{ $roleUnit->unit->nama_unit }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('admin.user.role.destroy', $roleUnit->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <input type="hidden" id="namaUnit" value="{{ $user->name }}" >
                                                        <button type="submit" class="btn btn-sm btn-danger btn-flat delete_confirm" data-role="{{ $roleUnit->role->name }}" data-unit="{{ $roleUnit->unit->nama_unit }}" title="Hapus">
                                                            <i class="bi bi-trash"></i>
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
                 
        </div>
        
   </div>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>
        $(document).ready(function() {
            $('.form-select').select2({
                theme: 'bootstrap-5',
                placeholder: "Cari dan Pilih",
                dropdownParent:$('#RoleUnitModal'),
            });
        
        });     


        //  DELETE - SWEERALERT2
    $('.delete_confirm').click(function(event) {
         let form =  $(this).closest("form");
         let name = $(this).data("name");
         let dataRole = $(this).data('role');
         let dataunit = $(this).data('unit');

         event.preventDefault();
           Swal.fire({
                title: 'HAPUS DATA',
                html: "Anda yakin ingin menghapus role unit pengguna: <br/><b>"+dataRole+"</b>/<b>"+dataunit+"</b>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
     });
    </script>
@endsection