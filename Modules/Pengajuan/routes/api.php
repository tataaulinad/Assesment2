<?php

use Illuminate\Support\Facades\Route;
use Modules\Pengajuan\Http\Controllers\PengajuanController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('pengajuans', PengajuanController::class)->names('pengajuan');
});
