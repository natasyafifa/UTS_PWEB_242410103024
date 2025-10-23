@extends('layouts.app')

@section('title', 'Login - Katalog Artis')

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="d-flex justify-content-center align-items-center py-5" data-aos="zoom-in">
  <div class="col-md-6 col-lg-5">
    <div class="card p-4">
      <div class="card-body">
        <h3 class="fw-bold text-center mb-4 text-light">🎧 Login</h3>

        <form action="{{ route('login.handle') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label text-light">Username</label>
            <input name="username" type="text" class="form-control" required value="{{ old('username') }}">
          </div>

          <div class="mb-3">
            <label class="form-label text-light">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>

          @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <button class="btn btn-primary w-100 mt-3 py-2">Masuk Sekarang</button>
        </form>

        <p class="mt-4 text-center text-muted small">Masuk untuk mulai menjelajah🎶</p>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
  });
</script>
@endsection
