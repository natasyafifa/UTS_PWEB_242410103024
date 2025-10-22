@extends('layouts.app')

@section('title','Dashboard - '.$artist['name'])

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card mb-3">
      <img src="{{ $artist['photos'][0] ?? 'https://via.placeholder.com/400x220' }}" class="artist-photo" alt="photo">
      <div class="card-body">
        <h5 class="card-title">{{ $artist['name'] }}</h5>
        <a href="{{ route('profile', ['username'=>$username]) }}" class="btn btn-outline-primary btn-sm">Lihat Profil</a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Foto Lainnya</div>
      <div class="card-body">
        <div class="row g-2">
          @foreach($artist['photos'] as $p)
            <div class="col-4"><img src="{{ $p }}" class="img-fluid rounded" alt="photo"></div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="mb-4">
      <h4>Selamat datang, {{ $username ?? 'Pengunjung' }}!</h4>
      <p class="text-muted">Berikut discography dan album dari {{ $artist['name'] }}.</p>
    </div>

    <div class="row">
      @foreach($artist['discography'] as $d)
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <img src="{{ $d['cover'] }}" class="cover-thumb" alt="cover">
            <div class="card-body">
              <h5 class="card-title">{{ $d['title'] }}</h5>
              <p class="card-text">Tahun: {{ $d['year'] }}</p>
              <a href="{{ route('album.view', ['id'=>$d['id'],'username'=>$username]) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
