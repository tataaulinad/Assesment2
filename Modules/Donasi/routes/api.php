<?php

use Illuminate\Support\Facades\Route;
use Modules\Donasi\Http\Controllers\DonasiController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('donasis', DonasiController::class)->names('donasi');
});
