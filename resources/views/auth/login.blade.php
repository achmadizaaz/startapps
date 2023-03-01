@extends('layouts.guest')
@section('content')
<section class="vh-100" style="background-color: #343232;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('/img/login.webp') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                    <div class="d-flex align-items-center mb-5 pb-1">
                      <img src="{{ asset('/img/Universitas Merdeka Pasuruan.webp') }}" alt="" width="130px" height="130px">
                      <span class="h2 fw-bold mb-0 text-center" style="color:#1d1819">UNIVERSITAS MERDEKA PASURUAN</span>
                    </div>
                    <div class="text-center">
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;color:#444">Masuk dengan akun Anda</h5>
                    </div>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                      <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" placeholder="Masukkan akun pengguna" required/>
                    </div>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                      <input type="password" id="password"  name="password"
                       class="form-control form-control-lg" placeholder="Masukkan katasandi" required autocomplete="current-password"/>
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>

                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection