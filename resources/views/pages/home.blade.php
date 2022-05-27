@extends('layouts.home')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Selamat Datang di</h1>
          <h2>Sistem Informasi Surat Masuk & Surat Keluar</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
              @if (Auth::user())
              <a href="{{ route('dashboard') }}" class="btn-get-started scrollto">Dashboard</a>
              @else
              <a href="{{ route('login') }}" class="btn-get-started scrollto">Masuk</a>
              @endif

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ url('frontend/assets/img/hero-img.png') }}" class="img-fluid animated" alt="" style="width: 1000px;">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
@endsection
