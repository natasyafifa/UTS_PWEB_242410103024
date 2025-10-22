<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Katalog Artis')</title>

  <!-- Bootstrap CDN (boleh ganti) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* sedikit styling agar rapi */
    .artist-photo { width:100%; height:220px; object-fit:cover; border-radius:8px; }
    .cover-thumb { width:100%; height:180px; object-fit:cover; border-radius:6px; }
  </style>
</head>
<body class="min-h-screen bg-gray-100 text-gray-800 overflow-x-hidden">
  <x-navbar :username="$username ?? null" />

  <main class="container my-4">
    @yield('content')
  </main>
  @include('components.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')
</body>



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({
  duration: 800,
  once: true,
  easing: 'ease-in-out',
});
</script>

</html>
