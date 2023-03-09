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
            {{ $role }}
        </div>
        <div class="card bg-light rounded-3 shadow">
            <div class="card-header d-flex justify-content-between align-middle bg-secondary-subtle">
                <h5>Data Pengguna</h5>
                <div class="text-end">
                    <a href="#" class="btn btn-md btn-info text-white">Kembali ke Daftar</a>
                    <a href="#" class="btn btn-md btn-success text-white">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-2 border-end border-2 border-light">
                            <ul class="nav nav-pills flex-column mb-auto fw-bold" style="font-size:12px">
                                <li class="nav-item bg-secondary border-start border-3 border-secondary hover ">
                                    <a href="#" class="nav-link text-white ">
                                        Data Pengguna
                                    </a>
                                </li>
                                <li class="nav-item bg-dark border-start border-3 border-primary">
                                    <a href="#" class="nav-link text-white">
                                    Role Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="callout-info bg-secondary p-4">
                                <div class="row">
                                    <div class="col-md-2 text-white">
                                        Nama Pengguna
                                    </div>
                                    <div class="col-md-4 text-white">
                                        User Unit
                                    </div>
                                    <div class="col-md-2 text-white">
                                        Alamat Email
                                    </div>
                                    <div class="col-md-4 text-white">
                                        alamat-email@unmerpas.ac.id
                                    </div>
                                </div>
                                
                            </div>
                                
                        </div>
                 </div>
                 
        </div>
        
   </div>
@endsection