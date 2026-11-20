<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - FoodShare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" 
rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    @php($user = auth()->user())
    {{-- HEADER + MENU NAVIGASI --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
                <i class="bi bi-building-gear me-1"></i> FoodShare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#menuUtama" aria-controls="menuUtama" aria-expanded="false" 
aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link {{ request()->routeIs('fasilitas.*') ? 'active' : '' }}"
                           href="{{ route('fasilitas.index') }}">
                            {{ $user->isAdmin() ? 'Kelola Donasi' : 'Donasi' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pengaduan.*') ? 'active' : '' }}"
                           href="{{ route('pengaduan.index') }}">
                            {{ $user->isAdmin() ? 'Semua Pengajuan' : 'Pengajuan Saya' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}"
                           href="{{ route('profil') }}">Profil</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2 text-white">
                    <span class="small">
                        {{ $user->name }}
                        <span class="badge text-bg-light">{{ $user->role->label() }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    {{-- KONTEN --}}
    <main class="container py-4 flex-grow-1">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup">
</button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup">
</button>
            </div>
        @endif
        @yield('content')
    </main>
    {{-- FOOTER --}}
    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center text-muted small">
            &copy; {{ date('Y') }} FoodShare-Sistem untuk mengelola katalog donasi dan pengajuan bantuan secara tertib
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
    @stack('scripts')
</body>
</html>
