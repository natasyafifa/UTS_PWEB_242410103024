@extends('layouts.app')

@section('title', 'Pengelolaan Favorit')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h4>Pengelolaan — Buat daftar favorit</h4>
            <p class="text-muted">Centang album atau lagu yang kamu favoritkan lalu submit. Data disimpan sementara di
                session.</p>

            <form method="POST" action="{{ route('pengelolaan', ['username' => $username]) }}">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        @foreach ($items as $it)
                            <div class="col-md-6">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="favorites[]"
                                        value="{{ $it['label'] }}" id="fav-{{ $loop->index }}"
                                        @if (in_array($it['label'], $favorites)) checked @endif>
                                    <label class="form-check-label" for="fav-{{ $loop->index }}">
                                        {{ $it['label'] }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="btn btn-success">Simpan Favorit</button>
            </form>
        </div>

        <div class="col-md-4">
            <h5>Favoritmu</h5>
            @if (count($favorites) > 0)
                <ul class="list-group">
                    @foreach ($favorites as $f)
                        <li class="list-group-item">{{ $f }}</li>
                    @endforeach
                </ul>
            @else
                <div class="text-muted">Belum ada favorit yang disimpan.</div>
            @endif
        </div>
    </div>
@endsection
