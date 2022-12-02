<?php

use App\Http\Controllers\api\CertificateController;
use App\Http\Controllers\api\PortfolioController;
use App\Http\Controllers\api\SEOController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('/all-portfolios', [PortfolioController::class, 'index']);
    Route::post('/portfolio/{id}', [PortfolioController::class, 'show']);

    Route::post('/seo', [SEOController::class, 'index']);

    Route::post('/all-certificates', [CertificateController::class, 'index']);
    Route::post('/certificate/{id}', [CertificateController::class, 'show']);
});