@extends('layouts.app')

@section('title', $album['title'] . ' - Album')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $album['cover'] }}" class="cover-thumb" alt="cover">
                <div class="card-body">
                    <h5 class="card-title">{{ $album['title'] }}</h5>
                    <p class="card-text">{{ $album['description'] }}</p>

                    <p class="mb-1"><strong>Links:</strong></p>
                    <p class="small mb-1"><a href="{{ $album['links']['merch'] }}" target="_blank">Merch</a>
                    </p>
                    <p class="small mb-1"><a href="{{ $album['links']['spotify'] }}" target="_blank">Spotify</a></p>
                    <p class="small mb-0"><a href="{{ $album['links']['youtube'] }}" target="_blank">YouTube</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <h4>Daftar Lagu</h4>
            <div class="list-group">
                @foreach ($album['tracks'] as $idx => $t)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $idx + 1 }}. {{ $t['title'] }}</h5>
                        </div>
                        <p class="mb-1"> {{ $t['meaning'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
