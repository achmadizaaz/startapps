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
                        <button class="btn btn-sm btn-secondary">Logout</button>
                    </div>
                </div>
            </div>
        </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10  bg-white px-4" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px">
          <h5 class="mt-5 py-2">Daftar Modul</h5>
            <div class="row py-4"  >
              <div class="col-md-6 col-lg-6 d-none d-md-block">
                <span>Kolom Kiri</span>
              </div>
              <div class="col-md-6 col-lg-6 d-flex align-items-center">
                <span>Kolom Kanan</span>
              </div>
            </div>
        
        </div>
      </div>
    </div>
  </section>
@endsection