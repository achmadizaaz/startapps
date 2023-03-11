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
            <h4>DAFTAR USER</h4>
            <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                <i class="bi bi-person-plus-fill"></i> Tambah
            </a>
        </div>
        <div class=" bg-light p-4 rounded-3 shadow">
            {{ session('kodeUnit') }}
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
                            <td class="d-flex ">
                                <a href="{{ route('admin.user.show', $user->slug) }}" class="btn btn-sm btn-info text-white me-1" title="Detail">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form method="POST" action="{{ route('admin.user.reset', $user->id) }}">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="hidden" id="namaUnit" value="{{ $user->name }}" data-nama="{{ $user->name }}">
                                    <button type="submit" class="btn btn-sm btn-warning btn-flat reset_confirm me-1 text-white" data-username="{{ $user->name }}" title="Reset">
                                        <i class="bi bi-recycle"></i>
                                    </button>
                                </form>
                                


                                <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" id="namaUnit" value="{{ $user->name }}" >
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat delete_confirm" data-username="{{ $user->name }}" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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

<script type="text/javascript">

 $(document).ready(function () {
        $('#example').DataTable();
    });


 //  RESET USER - SWEERALERT2
 $('.reset_confirm').click(function(event) {
         let form =  $(this).closest("form");
         let name = $(this).data("name");
         let userName = $(this).data('username');
         event.preventDefault();
           Swal.fire({
                title: 'Reset Katasandi',
                html: "Apakah anda ingin mereset sandi: <b>"+userName+"</b>",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Reset Sandi',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });    

    //  DELETE USER - SWEERALERT2
    $('.delete_confirm').click(function(event) {
         let form =  $(this).closest("form");
         let name = $(this).data("name");
         let userName = $(this).data('username');

         event.preventDefault();
           Swal.fire({
                title: 'HAPUS DATA',
                html: "Apakah anda ingin menghapus pengguna: <b>"+userName+"</b>",
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