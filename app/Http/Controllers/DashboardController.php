<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Fasilitas\Models\Fasilitas;
use Modules\Pengaduan\Models\Pengaduan;
class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        if ($user->isAdmin()) {
            // Dashboard admin: ringkasan seluruh sistem
            $stats = [
                'Total Donasi' => Fasilitas::count(),
                'Total Pengajuan' => Pengaduan::count(),
                'Menunggu Ditangani' => Pengaduan::where('status', 'menunggu')->count(),
                'Jumlah Pemohon' => User::where('role', UserRole::Pemohonan->value)->count(),
            ];
            $terbaru = Pengaduan::with(['Donasi:id,nama', 'user:id,name'])->latest()->limit(5)
>get();
        } else {
            // Dashboard mahasiswa: hanya data milik sendiri
            $stats = [
                'Pengajuan Saya' => $user->pengaduan()->count(),
                'Menunggu' => $user->pengaduan()->where('status', 'menunggu')->count(),
                'Diproses' => $user->pengaduan()->where('status', 'diproses')->count(),
                'Selesai' => $user->pengaduan()->where('status', 'selesai')->count(),
            ];
            $terbaru = $user->pengaduan()->with('Donasi:id,nama')->latest()->limit(5)->get();
        }
        return view('dashboard', compact('user', 'stats', 'terbaru'));
    }

}
