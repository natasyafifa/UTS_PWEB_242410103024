@extends('layouts.app')

@section('title', 'Dashboard - ' . $artist['name'])

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(180deg, #0e1a2b 0%, #1f2c3d 100%);
        color: #f5f5f5;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
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

    .artist-photo {
        width: 100%;
        border-radius: 12px;
        object-fit: cover;
        height: 220px;
        transition: transform 0.5s ease;
    }

    .artist-photo:hover {
        transform: scale(1.05);
    }

    .cover-thumb {
        width: 100%;
        height: 200px;
        border-radius: 12px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .cover-thumb:hover {
        transform: scale(1.03) rotate(-1deg);
    }

    .btn {
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    /* carousel bergerak */
    .photo-carousel-wrapper {
        overflow: hidden;
        position: relative;
    }

    .photo-carousel {
        display: flex;
        gap: 10px;
        animation: scroll-horizontal 30s linear infinite;
    }

    .photo-carousel:hover {
        animation-play-state: paused;
    }

    .photo-carousel img {
        height: 90px;
        width: 120px;
        border-radius: 10px;
        object-fit: cover;
        transition: transform 0.3s ease, opacity 0.3s ease;
        flex-shrink: 0;
    }

    .photo-carousel img:hover {
        transform: scale(1.1);
        opacity: 0.9;
    }

    @keyframes scroll-horizontal {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-50%);
        }
    }

    /* warna teks baru */
    .text-muted {
        color: #7fa6e0 !important;
    }

    h4, h5, h6 {
        color: #f0f6ff;
    }

    .card-title {
        color: #d8e2ff;
    }

    .card-header {
        color: #a5b8e0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
        <div class="col-md-4 mb-4">
            <div class="card p-3" data-aos="zoom-in">
                <img src="{{ $artist['photos'][0] ?? 'https://via.placeholder.com/400x220' }}" class="artist-photo"
                    alt="photo">
                <div class="card-body text-center">
                    <h5 class="card-title mb-2">{{ $artist['name'] }}</h5>
                    <a href="{{ route('profile', ['username' => $username]) }}" class="btn btn-outline-light btn-sm px-4">
                        Lihat Profil
                    </a>
                </div>
            </div>

            <div class="card p-3 mt-3" data-aos="fade-right">
                <div class="card-header text-center fw-bold">Foto Lainnya</div>
                <div class="card-body photo-carousel-wrapper">
                    <div class="photo-carousel">
                        @foreach (array_merge($artist['photos'], $artist['photos']) as $p)
                            <img src="{{ $p }}" alt="photo">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="mb-4" data-aos="fade-down">
                <h4 class="fw-semibold">Selamat datang, {{ $username ?? 'Pengunjung' }}!</h4>
                <p class="text-muted">Berikut discography dan album dari {{ $artist['name'] }}.</p>
            </div>

            <div class="row">
                @foreach ($artist['discography'] as $d)
                    <div class="col-md-6 mb-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100">
                            <img src="{{ $d['cover'] }}" class="cover-thumb" alt="cover">
                            <div class="card-body">
                                <h5 class="card-title">{{ $d['title'] }}</h5>
                                <p class="card-text text-muted">Tahun: {{ $d['year'] }}</p>
                                <a href="{{ route('album.show', ['id' => $d['id'], 'username' => $username]) }}"
                                    class="btn btn-outline-light btn-sm px-3">
                                    Lihat Album
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (session('favorites'))
            <div class="bg-gray-800 mt-8 p-4 rounded-xl shadow-md" data-aos="fade-up">
                <h4 class="text-blue-300 font-semibold mb-3">🎵 Lagu Favoritmu</h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-200">
                @foreach (session('favorites') as $fav)
                    <li>{{ $fav }}</li>
                @endforeach
    </ul>
  </div>
@endif

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

