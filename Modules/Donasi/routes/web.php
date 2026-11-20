<?php

use Illuminate\Support\Facades\Route;
use Modules\Donasi\Http\Controllers\DonasiController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('donasis', DonasiController::class)->names('donasi');
});
