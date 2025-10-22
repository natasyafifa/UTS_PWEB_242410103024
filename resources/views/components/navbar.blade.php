<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>

@props(['username' => null])

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm navbar-custom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('dashboard', ['username' => $username]) }}">
      Zef<span class="highlight">Archive</span>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('profile', ['username' => $username]) }}">Profile</a></li>
      </ul>

      <div class="d-flex align-items-center">
        @if($username)
          <span class="me-3 text-light small">Selamat datang, <strong>{{ $username }}</strong></span>
          <a class="btn btn-outline-light btn-sm px-3" href="{{ route('logout') }}">Logout</a>
        @else
          <a class="btn btn-primary btn-sm px-3" href="{{ route('login.form') }}">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>

<style>
  /* NAVBAR UTAMA */
  .navbar-custom {
    position: sticky;
    top: 0;
    width: 100%;
    z-index: 1000;
    background: rgba(14, 26, 43, 0.95);
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    font-family: 'Poppins', sans-serif;
    transition: all 0.4s ease-in-out;
    backdrop-filter: blur(10px);
  }

  .navbar-hidden {
    opacity: 0;
    transform: translateY(-100%);
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .navbar-visible {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .navbar-brand {
    color: #f0f6ff !important;
    transition: color 0.3s ease;
    letter-spacing: 0.5px;
  }

  .navbar-brand .highlight {
    color: #7fa6e0;
  }

  .navbar-brand:hover {
    color: #a8c9ff !important;
  }

  .nav-link {
    color: #cfd3d8 !important;
    margin-right: 10px;
    position: relative;
    transition: all 0.3s ease;
  }

  .nav-link:hover {
    color: #a8c9ff !important;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 2px;
    width: 0%;
    height: 2px;
    background: #7fa6e0;
    transition: width 0.3s ease;
  }

  .nav-link:hover::after {
    width: 100%;
  }

  .btn-outline-light {
    border-color: rgba(255, 255, 255, 0.3);
    color: #f0f6ff;
    transition: all 0.3s ease;
  }

  .btn-outline-light:hover {
    background: #7fa6e0;
    border-color: #7fa6e0;
    color: #0e1a2b;
    transform: scale(1.05);
  }

  /* Animasi smooth muncul pertama kali */
  .navbar-custom {
    animation: fadeIn 0.8s ease;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<script>
  // Script untuk auto-hide & show navbar saat scroll
  let lastScrollTop = 0;
  const navbar = document.querySelector('.navbar-custom');

  window.addEventListener('scroll', function() {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop && scrollTop > 50) {
      // Scroll ke bawah → sembunyikan navbar
      navbar.classList.remove('navbar-visible');
      navbar.classList.add('navbar-hidden');
    } else {
      // Scroll ke atas → tampilkan navbar
      navbar.classList.remove('navbar-hidden');
      navbar.classList.add('navbar-visible');
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // jangan negatif
  }, false);
</script>
