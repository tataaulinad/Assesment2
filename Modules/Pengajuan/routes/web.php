<?php

use Illuminate\Support\Facades\Route;
use Modules\Pengajuan\Http\Controllers\PengajuanController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pengajuans', PengajuanController::class)->names('pengajuan');
});
