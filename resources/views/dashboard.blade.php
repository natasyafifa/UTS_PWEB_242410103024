@extends('layouts.app')

@section('title', 'Dashboard - ' . $artist['name'])

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="container my-5" data-aos="fade-up">
    <!-- Background animasi -->
    <div class="bg-orb orb-blue"></div>
    <div class="bg-orb orb-purple"></div>
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

            @if (!empty($favorites))
            <div class="bg-gray-800 mt-8 p-4 rounded-xl shadow-md" data-aos="fade-up">
                <h4 class="text-blue-300 font-semibold mb-3">🎵 Lagu Favoritmu</h4>
                <ul class="list-disc pl-5 space-y-1 text-gray-200">
                    @foreach ($favorites as $fav)
                    <li>{{ $fav['label'] ?? 'Tanpa Nama' }}</li>
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