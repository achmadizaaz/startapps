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
                        <div class="col-md-6 fw-bold">
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="name" class="form-label" >Nama Pengguna  <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-7" >
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama Pengguna">
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="email" class="form-label" >Username / Email  <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-7" >
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="email@unmerpas.ac.id">
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="password" class="form-label" >Sandi Pengguna <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-7" >
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="********">
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="role" class="col-md-6">Role <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-7" >
                                    <select name="role" id="role" class="col-md-7 form-select" name="id_role" required>
                                        <option value="">Pilih Role Pengguna </option>
                                        @foreach ($roles = \Spatie\Permission\Models\Role::all() as $role)   
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                        {{-- END Kolom Form Kiri --}}

                        {{--  Kolom Form Kanan --}}
                        <div class="col-md-6 fw-bold">
                            
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="password_default" class="form-label" >Sandi Default</label>
                                </div>
                                <div class="col-md-7" >
                                    <input type="text" class="form-control" name="password_default" value="{{ old('password_default') }}">
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label for="pengawai" class="form-label" >Pengawai/Dosen</label>
                                </div>
                                <div class="col-md-7" >
                                    <input type="text" class="form-control" name="pengawai_id" value="{{ old('pengawai') }}">
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label class="form-label" >Login terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    <input class="form-control" value="{{ old('last_login_at') }}" disabled>
                                </div>
                            </div>
                            <div class="row py-2 border-bottom">
                                <div class="col-md-5">
                                    <label class="form-label" >IP terakhir</label>
                                </div>
                                <div class="col-md-7" >
                                    <input class="form-control" value="{{ old('last_login_ip') }}" disabled>
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