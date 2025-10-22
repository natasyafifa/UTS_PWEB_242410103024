@extends('layouts.app')

@section('title', 'Profile Pengguna')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4>Profile Penggemar</h4>
            <p>Halo, <strong>{{ $username ?? 'Pengunjung' }}</strong> — ini halaman profile sederhana.</p>

            <div class="card mb-3">
                <div class="card-body">
                    <h5>Profil Artis: {{ $artist['name'] }}</h5>
                    <p>{{ $artist['bio'] }}</p>
                    <p><strong>Discography singkat:</strong></p>
                    <ul>
                        @foreach ($artist['discography'] as $d)
                            <li>{{ $d['title'] }} ({{ $d['year'] }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h5>Foto</h5>
            @foreach ($artist['photos'] as $p)
                <img src="{{ $p }}" class="img-fluid mb-2 rounded" alt="photo">
            @endforeach
        </div>
    </div>
@endsection
