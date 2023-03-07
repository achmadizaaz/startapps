@extends('layouts.guest')
@section('content')
<style>
  .bg-compay {
    background-image: url(https://assets.siakadcloud.com/assets/v1/img/pattern/pat_04.png)
  }
  </style>
<section class="vh-100" style="background-color: #343232;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center" >
        <div class="col col-xl-10" style="background-color: #fff;">
            <div class="row">
                    <div class="col-6 col-xl-6" >
                        <img src="{{ asset('/img/Universitas Merdeka Pasuruan.webp') }}" alt="" width="130px" height="130px" />
                    </div>
                    <div class="col-4 col-xl-4" >
                        <div class="mb-0" style="color:#fbfbfb">Sistem Informasi</div>
                        <div class="h6 fw-bold mb-0" style="color:#ffffff">UNIVERSITAS MERDEKA PASURUAN</div>
                    </div>
                    <div class="col-6 col-xl-6 text-end" >
                        <button class="btn btn-sm btn-primary">Profil</button>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                      <button type="submit" class="btn btn-danger">Sign out</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10  bg-white px-4" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px">
          <h5 class="mt-5 py-2">Daftar Modul</h5>
            <div class="row py-4"  >
              <div class="col-md-6 col-lg-6 d-none d-md-block">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Administrasi Aplikasi</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                  </li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6 d-flex align-items-center">
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h4>DAFTAR ROLE</h4> 
                    <div class="small">Administrasi Aplikasi</div>
                    @can('Super Administrator')
                    <form action="{{ route('admin.session') }}" method="POST">
                      @csrf
                      <input type="hidden" name="tesSessionUnit" value="kodeUnit-201">
                      <input type="hidden" name="tesSessionRole" value="kodeRole-202">
                      <button type="submit">Super Administrator</button>
                    </form>
                    @endcan
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>
              </div>
            </div>
        
        </div>
      </div>
    </div>
  </section>
@endsection