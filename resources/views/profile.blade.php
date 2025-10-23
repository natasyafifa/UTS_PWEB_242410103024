@extends('layouts.app')

@section('title', 'Profile Pengguna')

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(180deg, #0e1a2b 0%, #1f2c3d 100%);
    color: #f5f5f5;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
  }

  h4, h5 {
    color: #f0f6ff;
  }

  .text-muted {
    color: #7fa6e0 !important;
  }

  .card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
  }

  .img-fluid {
    border-radius: 12px;
    transition: transform 0.4s ease;
  }

  .img-fluid:hover {
    transform: scale(1.05);
  }

  .btn {
    border-radius: 50px;
    transition: all 0.3s ease;
  }

  .btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
  }

  /* efek klik */
  button, a {
    position: relative;
    overflow: hidden;
  }

  button::after, a::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    border-radius: 50%;
    transition: width 0.4s ease, height 0.4s ease, opacity 0.6s ease;
    opacity: 0;
  }

  button:active::after, a:active::after {
    width: 200%;
    height: 200%;
    opacity: 1;
  }
</style>

<div class="container my-5" data-aos="fade-up">
  <div class="row">
    <div class="col-md-8 mb-4">
      <h4 class="fw-semibold mb-3">Profile Penggemar</h4>
      <p class="text-muted">Halo, <strong>{{ $username ?? 'Pengunjung' }}</strong> — semoga makin kenal dengan NIKI!</p>

      <div class="card mb-3" data-aos="fade-right">
        <div class="card-body">
          <h5 class="fw-bold text-light mb-2">{{ $artist['name'] }}</h5>
          <p class="text-muted">{{ $artist['bio'] }}</p>
          <p class="fw-semibold text-light">Discography Singkat:</p>
          <ul class="list-unstyled ps-3">
            @foreach ($artist['discography'] as $d)
              <li class="mb-2">
                <span class="fw-bold text-light">{{ $d['title'] }}</span>
                <span class="text-muted">({{ $d['year'] }})</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4" data-aos="fade-left">
      <h5 class="fw-semibold mb-3">Foto</h5>
      @foreach ($artist['photos'] as $p)
        <img src="{{ $p }}" class="img-fluid mb-3 shadow-sm" alt="photo">
      @endforeach
    </div>
  </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({
  duration: 1000,
  once: false,
});
</script>
@endsection
