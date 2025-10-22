@extends('layouts.app')

@section('title', $album['title'] . ' - Album')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">         
<div class="row gy-4">
    <!-- KIRI: Cover + Deskripsi + Spotify -->
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <img src="{{ $album['cover'] ?? 'https://via.placeholder.com/400x400?text=No+Cover' }}"
                 class="cover-thumb rounded-top" alt="Album Cover">

            <div class="card-body">
                <h4 class="card-title fw-bold mb-2">{{ $album['title'] }}</h4>
                <p class="card-text text-muted mb-0">
                    {{ $album['description'] ?? 'Belum ada deskripsi untuk album ini.' }}
                </p>
            </div>
        </div>

        {{-- EMBED SPOTIFY --}}
        @if (!empty($album['links']['spotify']))
        <div class="mt-4">
            <iframe style="border-radius: 12px;"
                src="{{ $album['links']['spotify'] }}"
                width="100%" height="352" frameborder="0"
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                loading="lazy">
            </iframe>
        </div>
        @endif
    </div>

    <!-- KANAN: Daftar Lagu -->
    <div class="col-md-7">
        <h4 class="fw-semibold mb-3">Daftar Lagu</h4>

        @if (!empty($album['tracks']))
            <div class="list-group shadow-sm">
                @foreach ($album['tracks'] as $idx => $t)
                    <div class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <h5 class="mb-1 fw-bold text-primary">
                                {{ $idx + 1 }}. {{ $t['title'] }}
                            </h5>
                        </div>
                        <p class="mb-1 text-muted">
                            {{ $t['meaning'] ?? 'Tidak ada penjelasan untuk lagu ini.' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted fst-italic">Belum ada data lagu di album ini.</p>
        @endif
    </div>
</div>
@endsection
