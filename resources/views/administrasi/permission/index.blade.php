@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
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
            <h4>DAFTAR PERMISSION</h4>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#permissionModal">
                <i class="bi bi-person-plus-fill"></i> Tambah
            </button>
        </div>

        <div class="alert alert-danger alert-dismissiblemt-3" role="alert">
            <i class="bi bi-exclamation-circle"></i> <b>Warning :</b> Fitur ini hanya untuk kerperluan pengembangan aplikasi.
        </div>


        {{-- MODAL --}}
        <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.permission.store') }}" method="POST" >
                    @csrf
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="permission" class="form-label fw-bold">Nama Permission</label>
                                <input type="text" id="permission" class="form-control" name="permission" required>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah Permission</button>
                    </div>
            </form>
            </div>
            </div>
        </div>
        {{-- END MODAL --}}

        <div class=" bg-light p-4 rounded-3 shadow">
            <table class="table table-striped" id="permissionTable">
                <thead class="bg-primary text-white fw-bold">
                    <tr>
                        <td>#</td>
                        <td>Nama Permission</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <div class="d-flex jutify-content-between">

                                    {{-- <a href="#" class="btn btn-sm btn-warning text-white me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> --}}
    
                                    <form method="POST" action="{{ route('admin.permission.destroy', $permission->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" id="namaUnit" value="{{ $permission->id }}" >
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat delete_confirm" title="Hapus" data-permission="{{ $permission->name }}" disabled>
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
           
   </div>


   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">

 $(document).ready(function () {
        $('#permissionTable').DataTable();
    });

    //  DELETE USER - SWEERALERT2
    $('.delete_confirm').click(function(event) {
         let form =  $(this).closest("form");
         let permission = $(this).data("permission");
        //  let userName = $(this).data('username');

         event.preventDefault();
           Swal.fire({
                title: 'HAPUS DATA',
                html: "Yakin ingin menghapus permission: <b>"+permission+"</b>",
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