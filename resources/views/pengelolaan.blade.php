@extends('layouts.app')

@section('title', 'Pengelolaan Favorit')

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/pengelolaan.css') }}">

<div class="position-relative py-5">
  <div class="bg-orb orb-blue"></div>
  <div class="bg-orb orb-purple"></div>

  <div class="container position-relative" data-aos="fade-up">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-light display-6">🌟 Pengelolaan Favorit</h2>
      <p class="text-light">
        Pilih album, lalu pilih lagu yang kamu suka 🎶
      </p>
    </div>

    <div class="card p-4 mb-4 mx-auto" style="max-width: 600px;">
      <form method="POST" action="{{ route('pengelolaan', ['username' => $username]) }}">
        @csrf
        <label class="form-label fw-semibold text-light">Pilih Album</label>
        <select id="album" name="favorite_album" class="form-select bg-dark text-white" required>
          <option value="">-- pilih album --</option>
        </select>

        <label class="form-label fw-semibold text-light mt-3">Pilih Track</label>
        <select id="track" name="favorite_track" class="form-select bg-dark text-white">
          <option value="">-- pilih track --</option>
        </select>

        <button type="submit" class="btn btn-primary w-100 mt-3 fw-semibold">
          💾 Simpan Favorit
        </button>
      </form>
    </div>

    <div class="card p-4 mx-auto" style="max-width: 600px;">
      <h4 class="fw-semibold text-info mb-3">🎧 Favoritmu</h4>

      @if (count($favorites) > 0)
      <ul class="list-group list-group-flush">
        @foreach ($favorites as $f)
        @if($f['type'] === 'track')
        <li class="list-group-item bg-transparent text-light">
          🎵 {{ $f['label'] }}
        </li>
        @endif
        @endforeach
      </ul>
      @else
      <div class="text-secondary fst-italic">Belum ada favorit 😢</div>
      @endif

      <form action="{{ route('hapusFavorit') }}" method="POST" class="mt-3">
        @csrf
        <button class="btn btn-danger btn-sm">Hapus Semua Favorit</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: false,
    easing: 'ease-in-out'
  });

  document.addEventListener("DOMContentLoaded", function() {
    let items = JSON.parse('{!! json_encode($items) !!}');

    const albumSelect = document.getElementById('album');
    const trackSelect = document.getElementById('track');

    // Load albums
    albumSelect.innerHTML = '<option value="">-- pilih album --</option>';
    items.forEach(i => {
      if (i.type === 'album') {
        const opt = document.createElement('option');
        opt.value = i.label;
        opt.textContent = i.label;
        albumSelect.appendChild(opt);
      }
    });

    // Update tracks
    albumSelect.addEventListener('change', function() {
      let selectedAlbum = this.value;
      trackSelect.innerHTML = '<option value="">-- pilih lagu --</option>';

      items.forEach(i => {
        if (i.type === 'track' && i.label.includes(selectedAlbum.replace('Album: ', ''))) {
          let opt = document.createElement('option');
          opt.value = i.label;
          opt.textContent = i.label;
          trackSelect.appendChild(opt);
        }
      });
    });
  });
</script>

@endsection