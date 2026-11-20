<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ProfilController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        return view('profil', [
            'user' => $user,
            'jumlahPengajuan' => $user->pengajuan()->count(),
        ]);
    }
}