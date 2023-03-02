<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Administration Application') }}</title>

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
    </head>
    <body class="font-sans antialiased">
        <header>
            <div class="bg-dark mb-3">              
                <div class="p-2 container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <img src="{{ asset('/img/Universitas Merdeka Pasuruan.webp') }}" alt="" width="80" height="80">
                        </a>
                        
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('admin.index') }}" class="nav-link px-2 text-white">Dashboard</a></li>
                        <li><a href="{{ route('admin.users') }}" class="nav-link px-2 text-white">Pengguna</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Laporan</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                          </li>
                        </ul>

                        <div class="text-end text-light px-2">
                            Hai, Administrator
                        </div>
                        <div class="dropdown text-end">
                        <a href="#" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
          </header>

        @yield('content')

    </body>
</html>
