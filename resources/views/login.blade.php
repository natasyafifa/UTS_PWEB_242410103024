@extends('layouts.app')

@section('title','Login - Katalog Artis')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3">Login Penggemar</h4>

        <form action="{{ route('login.handle') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input name="username" type="text" class="form-control" required value="{{ old('username') }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
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

          <button class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3 text-muted small">Masuk sebagai penggemar untuk melihat katalog profil artis.</p>
      </div>
    </div>
  </div>
</div>
@endsection
