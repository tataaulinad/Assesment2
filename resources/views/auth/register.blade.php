@extends('layouts.guest')
@section('title', 'Register')
@section('content')
    <h5 class="mb-3">Buat akun Pemohon</h5>
    <form method="POST" action="{{ route('register.store') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror" autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (min. 8 karakter)</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" 
class="form-control">
        </div>
        {{-- Tidak ada input "role" di sini. Role ditetapkan oleh server. --}}
        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>
    <p class="text-center small mt-3 mb-0">
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
@endsection