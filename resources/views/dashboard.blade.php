@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="mb-4">
        <h4 class="mb-1">Halo, {{ $user->name }}</h4>
        <p class="text-muted mb-0">
            @if ($user->isAdmin())
                Dashboard Admin - ringkasan seluruh data FoodShare.
            @else
                Dashboard Pemohon - ringkasan pengajuan milik Anda.
            @endif
        </p>
    </div>
    {{-- Kartu statistik (responsif: 1 kolom di HP, 2 di tablet, 4 di desktop) --}}
    <div class="row g-3 mb-4">
        @foreach ($stats as $label => $nilai)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">{{ $label }}</div>
                        <div class="fs-2 fw-semibold">{{ $nilai }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card shadow-sm">
        <div class="card-header fw-semibold">Pengajuan Terbaru</div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Donasi</th>
                        @if ($user->isAdmin())
                            <th>Pemohon</th>
                        @endif
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($terbaru as $p)
                        <tr>
                            <td>{{ $p->judul }}</td>
                            <td>{{ $p->Donasi->nama }}</td>
                            @if ($user->isAdmin())
                                <td>{{ $p->user->name }}</td>

               @endif
                            <td><span class="badge text-bg-secondary">{{ ucfirst($p->status) }}
</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Belum ada Pemohon.
</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
