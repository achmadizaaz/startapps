@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
    <div class="container p-2 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-middle bg-secondary-subtle">
                <h5>Data Pengguna</h5>
                <div class="text-end">
                    <a href="{{ route('admin.user') }}" class="btn btn-md btn-info text-white">Kembali ke Daftar</a>
                    <a href="{{ route('admin.user.edit', $user->slug) }}" class="btn btn-md btn-warning text-white">Edit</a>
                    <button class="btn btn-md btn-danger">Hapus</button>
                </div>
            </div>
            <div class="card-body">
                
                <div class="user-detail mb-4 text-secondary">
                    Detail Pengguna (user)
                </div>
                    <div class="row ">
                        <div class="col-2 d-flex flex-column flex-shrink-0 border-end border-2 border-light">
                            <ul class="nav nav-pills flex-column mb-auto fw-bold" style="font-size:12px">
                                <li class="nav-item bg-dark border-start border-3 border-primary">
                                    <a href="#" class="nav-link text-white ">
                                        Data Pengguna
                                    </a>
                                </li>
                                <li class="nav-item bg-secondary border-start border-3 border-secondary hover ">
                                    <a href="#" class="nav-link text-white">
                                    Role Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {{-- Kolom Form Sebelah Kiri  --}}
                        <div class="col-md-5">
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label for="name" class="form-label" >Nama Pengguna  </label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label for="email" class="form-label" >Username / Email  </label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label for="role" class="form-label">Role</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->roles[0]->name }}
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label for="pengawai" class="form-label" >Pengawai/Dosen</label>
                                </div>
                                <div class="col-md-7" >
                                    <span class="fst-italic">Fitur belum tersedia</span>
                                </div>
                            </div>
                           
                        </div>
                        {{-- END Kolom Form Kiri --}}

                        {{--  Kolom Form Kanan --}}
                        <div class="col-md-5">                          
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label for="password_default" class="form-label" >Sandi Default</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->password_default }}
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label class="form-label" >Login terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->last_login_at }}
                                </div>
                            </div>
                            
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5 fw-bold">
                                    <label class="form-label" >IP Login Terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->last_login_ip }}
                                </div>
                            </div>
                        </div>
                        {{--  END Kolom Form Kanan --}}

                    </div>
            </div>
        </div>

        {{-- <div class="card shadow">
            <div class="card-header d-flex justify-content-between bg-secondary-subtle">
                <h5 class="d-flex align-items-center">
                    Role Pengguna
                </h5>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahRole">
                        Tambah Role
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                Hapus
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}

    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}
@endsection