@extends('layouts.app')

@section('title', 'Pengelolaan Favorit')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-gray-100 px-6 py-16 relative overflow-hidden">

  {{-- Efek partikel lembut di background --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow top-10 left-10"></div>
    <div class="absolute w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow delay-300 bottom-0 right-10"></div>
  </div>

  <div class="max-w-5xl mx-auto relative z-10">
    <h2 class="text-4xl font-bold text-blue-300 mb-3 tracking-tight" data-aos="fade-down">
      ✨ Pengelolaan Favorit
    </h2>
    <p class="text-gray-400 mb-10 leading-relaxed" data-aos="fade-up">
      Pilih album favoritmu, lalu pilih lagu dari album tersebut. Data akan tersimpan sementara di session.
    </p>

    {{-- FORM --}}
    <form method="POST" action="{{ route('pengelolaan', array('username' => $username)) }}" class="space-y-10">
      @csrf

      {{-- Pilihan Album --}}
      <div class="transition-transform duration-300 hover:translate-x-1" data-aos="fade-right">
        <label for="album" class="block text-sm font-semibold mb-2 text-blue-200">Pilih Album</label>
        <select id="album" name="album"
          class="w-full bg-gray-800/70 border border-gray-700 rounded-xl p-3 backdrop-blur-md focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
          <option value="">-- Pilih Album --</option>
          @foreach ($items as $album)
            <option value="{{ $album['label'] }}">{{ $album['label'] }}</option>
          @endforeach
        </select>
      </div>

      {{-- Dropdown Lagu (Dinamis) --}}
      <div id="song-dropdown" class="hidden transition-opacity duration-500" data-aos="fade-left">
        <label for="favorites" class="block text-sm font-semibold mb-2 text-blue-200">Pilih Lagu</label>
        <select id="favorites" name="favorites[]" multiple
          class="w-full bg-gray-800/70 border border-gray-700 rounded-xl p-3 backdrop-blur-md focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
          <option value="">Pilih lagu dari album...</option>
        </select>
      </div>

      <button type="submit"
        class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-400 hover:to-blue-500 text-white font-semibold py-2 px-6 rounded-xl shadow-md transition-all duration-300 transform hover:scale-105 hover:shadow-blue-400/30">
        💾 Simpan Favorit
      </button>
    </form>

    {{-- Daftar Favorit --}}
    <div class="mt-16" data-aos="fade-up">
      <h3 class="text-2xl font-semibold text-blue-300 mb-4">🎧 Favoritmu</h3>
      @if (count($favorites) > 0)
        <ul class="grid md:grid-cols-2 gap-4">
          @foreach ($favorites as $f)
            <li
              class="bg-gray-800/70 p-4 rounded-xl shadow hover:shadow-blue-400/20 backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:bg-gray-700/70">
              {{ $f }}
            </li>
          @endforeach
        </ul>
      @else
        <div class="text-gray-400 italic">Belum ada favorit yang disimpan.</div>
      @endif
    </div>
  </div>
</div>

{{-- AOS Animation --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 900, once: true });</script>

{{-- Dropdown Dinamis --}}
<script>
  const albumSelect = document.getElementById('album');
  const songDropdown = document.getElementById('song-dropdown');
  const songSelect = document.getElementById('favorites');

  // Data album dan lagu langsung dalam JS (tanpa @json)
  const albumSongs = {
    "Before": ["The Apartment We Wont Share", "Anaheim", "Autumn"],
    "Moonchild": ["Wide Open", "Lose", "Plot Twist"],
    "Nicole": ["High School in Jakarta", "Backburner", "Keeping Tabs"]
  };

  albumSelect.addEventListener('change', function () {
    const selectedAlbum = this.value;
    songSelect.innerHTML = '';

    if (selectedAlbum && albumSongs[selectedAlbum]) {
      songDropdown.classList.remove('hidden');
      songDropdown.classList.add('opacity-100', 'transition-opacity', 'duration-500');
      albumSongs[selectedAlbum].forEach(song => {
        const option = document.createElement('option');
        option.value = song;
        option.textContent = song;
        songSelect.appendChild(option);
      });
    } else {
      songDropdown.classList.add('hidden');
      songDropdown.classList.remove('opacity-100');
    }
  });
</script>

{{-- Animasi custom --}}
<style>
  @keyframes pulse-slow {
    0%, 100% { opacity: 0.5; transform: scale(1); }
    50% { opacity: 0.9; transform: scale(1.1); }
  }
  .animate-pulse-slow {
    animation: pulse-slow 6s ease-in-out infinite;
  }
</style>
@endsection
