@extends('layouts.app')
@section('title', 'Profil')
@section('content')
    <h4 class="mb-3">Profil Pengguna</h4>
    <div class="card shadow-sm" style="max-width: 560px">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Nama</dt>
                <dd class="col-sm-8">{{ $user->name }}</dd>
                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{ $user->email }}</dd>
                <dt class="col-sm-4">Role</dt>
                <dd class="col-sm-8"><span class="badge text-bg-primary">{{ $user->role->label() }}
</span></dd>
                <dt class="col-sm-4">Bergabung</dt>
                <dd class="col-sm-8">{{ $user->created_at->translatedFormat('d F Y') }}</dd>
                <dt class="col-sm-4">Total pengaduan</dt>
                <dd class="col-sm-8 mb-0">{{ $jumlahPemohon }}</dd>
            </dl>
        </div>
    </div>
@endsection
