@extends('layouts.guest')
@section('content')
<section class="vh-100" style="background-color: #343232;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center" >
            <div class="col col-xl-10" style="background-color: #3d2cf3;">
                <div class="row">
                    <div class="col-6 col-xl-6" >
                        <img src="{{ asset('/img/Universitas Merdeka Pasuruan.webp') }}" alt="" width="130px" height="130px" />
                    </div>
                    <div class="col-6 col-xl-6" >
                        <div class="h4 fw-bold mb-0 text-center" style="color:#1d1819">Sistem Informasi</div>
                        <div class="h4 fw-bold mb-0 text-center" style="color:#1d1819">UNIVERSITAS MERDEKA PASURUAN</div>
                    </div>
                </div>
            </div>
        </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-6 col-lg-7 d-none d-md-block">
                <span>Kolom Kiri</span>
              </div>
              <div class="col-md-6 col-lg-5 d-flex align-items-center">
                <span>Kolom Kanan</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection