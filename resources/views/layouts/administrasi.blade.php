<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title-page', config('app.name'))
        </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Vendor --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

        <style>
            .nav .nav-item .dropdown-menu{ display: none; }
            .nav .nav-item:hover .nav-link{   }
            .nav .nav-item:hover .dropdown-menu{ display: block; }
            .nav .nav-item .dropdown-menu{ margin-top:0; }
        </style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    </head>
    <body class="font-sans antialiased">
        <header class="mb-3">
            <div class="bg-dark py-3">              
                <div class="p-2 container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
                        <div href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-2">
                        <img src="{{ asset('/img/Universitas Merdeka Pasuruan.webp') }}" alt="" width="80" height="80">
                        </div>
                        <div class="app-name text-white col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <div class="small">
                                Modul Administrasi
                            </div>
                            <div class="fs-5 fw-bold">
                                Universitas Merdeka Pasuruan
                            </div>
                        </div>
                        
                        <div class="">
                            <div class="text-light px-2 float-start">
                                Hai, Administrator
                            </div>
                            <div class="dropdown">
                            <a href="#" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <button type="submit" class="btn btn-danger">Sign out</button>
                                    </form>
                                </li>
                            </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="py-2" style="background-color: #e3f2fd;">

                <div class="container" >
                    <ul class="nav navbar-expand-lg" >
                        <li><a href="{{ route('admin.index') }}" class="nav-link px-2 text-dark">Dashboard</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Pengguna</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                                @can('read user-administrasi')
                                <li><a class="dropdown-item" href="{{ route('admin.user') }}">User</a></li>
                                @endcan
                                
                                @can('read role-administrasi')
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.role') }}">Role</a></li>
                                @endcan
                                
                                @can('read permission-administrasi')
                                <li><a class="dropdown-item" href="{{ route('admin.permission') }}">Permission</a></li>
                                @endcan
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.unit') }}" class="nav-link px-2 text-dark">Unit</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">Laporan</a></li>
                    </ul>
                </div>
            </div>
          </header>

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
