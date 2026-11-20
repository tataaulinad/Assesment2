@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <h5 class="mb-3">Masuk ke akun Anda</h5>
    <form method="POST" action="{{ route('login.store') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror" autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Ingat saya</label>
</div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="text-center small mt-3 mb-0">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sebagai Pemohon</a>
    </p>
@endsection