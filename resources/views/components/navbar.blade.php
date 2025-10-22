<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>@props(['username' => null])

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard', ['username' => $username]) }}">ZefArchive</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
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
          <span class="me-3">Selamat datang, <strong>{{ $username }}</strong></span>
          <a class="btn btn-outline-secondary btn-sm" href="{{ route('logout') }}">Logout</a>
        @else
          <a class="btn btn-primary btn-sm" href="{{ route('login.form') }}">Login</a>
        @endif
      </div>
    </div>
  </div>
</nav>
