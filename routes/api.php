<?php

use App\Http\Controllers\ApiCertificateController;
use Illuminate\Support\Facades\Route;


Route::name('api.')->group(function () {
    Route::get('/all-certificates', [ApiCertificateController::class, 'index']);
    Route::get('/certificate/{id}', [ApiCertificateController::class, 'show']);
});