@extends('layouts.app')

@section('title', $album['title'] . ' - Album')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<style>
  body {
    background-color: #0e1a24;
    color: #e0e0e0;
    font-family: 'Poppins', sans-serif;
  }

  .card {
    background: linear-gradient(145deg, #1c2732, #101820);
    border: none;
    border-radius: 16px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.3);
  }

  .card-title {
    color: #9ec6ff;
  }

  .text-muted {
    color: #b0b9c4 !important;
  }

  .list-group {
    background: transparent;
  }

  .list-group-item {
    background: #1b2430;
    border: none;
    color: #e4e4e4;
    transition: all 0.3s ease;
    border-radius: 10px;
    margin-bottom: 8px;
    cursor: pointer;
  }

  .list-group-item:hover {
    background-color: #223247;
    transform: scale(1.01);
  }

  .list-group-item.active {
    background-color: #1DB95433;
    border-left: 4px solid #1DB954;
  }

  .text-primary {
    color: #8ab4f8 !important;
  }

  iframe {
    filter: grayscale(20%) brightness(0.95);
    box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    transition: all 0.5s ease;
  }

  iframe:hover {
    filter: grayscale(0%) brightness(1.05);
    transform: scale(1.02);
  }

  /* Animasi scroll fade-up */
  [data-aos] {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }

  [data-aos].aos-animate {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<div class="row gy-4">
  <!-- KIRI: Cover + Deskripsi + Spotify -->
  <div class="col-md-5" data-aos>
    <div class="card shadow-sm border-0">
      <img src="{{ $album['cover'] ?? 'https://via.placeholder.com/400x400?text=No+Cover' }}"
        class="cover-thumb rounded-top w-100"
        alt="Album Cover"
        style="object-fit: cover; height: 400px; transition: all 0.6s ease;">
      <div class="card-body">
        <h4 class="card-title fw-bold mb-2">{{ $album['title'] }}</h4>
        <p class="card-text text-muted mb-0">
          {{ $album['description'] ?? 'Belum ada deskripsi untuk album ini.' }}
        </p>
      </div>
    </div>

    {{-- EMBED SPOTIFY (ALBUM) --}}
    @if (!empty($album['links']['spotify']))
      <div class="mt-4" data-aos>
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
  <div class="col-md-7" data-aos>
    <h4 class="fw-semibold mb-3 text-light">Daftar Lagu</h4>

    @if (!empty($album['tracks']))
      <div class="list-group shadow-sm" id="trackList">
        @foreach ($album['tracks'] as $idx => $t)
          <div class="list-group-item list-group-item-action py-3"
               data-spotify="{{ $t['spotify_embed'] ?? '' }}">
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

      <!-- Kontainer iframe preview Spotify -->
      <div id="spotifyPreview" class="mt-4" style="display: none;">
        <iframe id="spotifyPlayer"
          style="border-radius: 12px;"
          src=""
          width="100%" height="152" frameborder="0"
          allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
          loading="lazy">
        </iframe>
      </div>
    @else
      <p class="text-muted fst-italic">Belum ada data lagu di album ini.</p>
    @endif
  </div>
</div>

<script>
  // animasi scroll fade
  const items = document.querySelectorAll('[data-aos]');
  const scrollHandler = () => {
    items.forEach(el => {
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 100) {
        el.classList.add('aos-animate');
      }
    });
  };
  window.addEventListener('scroll', scrollHandler);
  scrollHandler();

  // ====== SPOTIFY PREVIEW HANDLER ======
  const trackItems = document.querySelectorAll('#trackList .list-group-item');
  const previewContainer = document.getElementById('spotifyPreview');
  const spotifyPlayer = document.getElementById('spotifyPlayer');

  trackItems.forEach(item => {
    item.addEventListener('click', () => {
      const embedUrl = item.getAttribute('data-spotify');

      // reset warna semua item
      trackItems.forEach(i => i.style.backgroundColor = '#1b2430');

      // ubah warna item aktif
      item.style.backgroundColor = '#154b3d';

      if (embedUrl && embedUrl.trim() !== '') {
        spotifyPlayer.src = embedUrl;
        previewContainer.style.display = 'block';
      } else {
        previewContainer.style.display = 'none';
        alert('Preview Spotify belum tersedia untuk lagu ini 🎧');
      }
    });
  });
</script>
@endsection
