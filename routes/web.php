<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
// Hanya untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});
// Untuk semua pengguna yang sudah login 
Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('profil', ProfilController::class)->name('profil');
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
