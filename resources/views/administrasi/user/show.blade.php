@extends('layouts.administrasi')
{{-- @section('title', 'Dashboard Administrasi') --}}
@section('content')
    <div class="container p-2 mb-3">
        

        <div class="card">
            <div class="card-header bg-secondary-subtle">
                <h5>Data Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="user-detail mb-4 text-secondary">
                    Detail Pengguna (user)
                </div>
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Kolom Form Sebelah Kiri  --}}
                        <div class="col-md-6">
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label for="name" class="form-label" >Nama Pengguna  <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label for="email" class="form-label" >Username / Email  <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label for="role" class="col-md-6">Role <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->roles[0]->name }}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label for="password_default" class="form-label" >Sandi Default</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->password_default }}
                                </div>
                            </div>
                           
                        </div>
                        {{-- END Kolom Form Kiri --}}

                        {{--  Kolom Form Kanan --}}
                        <div class="col-md-6">                          
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label for="pengawai" class="form-label" >Pengawai/Dosen</label>
                                </div>
                                <div class="col-md-7" >
                                    <span class="fst-italic">Fitur belum tersedia</span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label class="form-label" >Login terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->last_login_at }}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-5 fw-bold">
                                    <label class="form-label" >IP terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    {{ $user->last_login_ip }}
                                </div>
                            </div>
                        </div>
                        {{--  END Kolom Form Kanan --}}

                        <div class="mt-3 text-end">
                            <a href="{{ route('admin.users') }}" class="btn btn-info text-white"><i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar</a>
                            <button class="btn btn-success"><i class="bi bi-save2 me-1"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection