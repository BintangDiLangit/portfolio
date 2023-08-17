<?php

use App\Http\Controllers\api\CertificateController;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\api\CompetitionController;
use App\Http\Controllers\api\CVController;
use App\Http\Controllers\api\PortfolioController;
use App\Http\Controllers\api\SEOController;
use App\Http\Controllers\api\SkillController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('/all-portfolios', [PortfolioController::class, 'index']);
    Route::post('/portfolio/{id}', [PortfolioController::class, 'show']);

    Route::post('/all-awardees', [CompetitionController::class, 'index']);
    Route::post('/awardee/{id}', [CompetitionController::class, 'show']);

    Route::post('/seo', [SEOController::class, 'index']);
    Route::post('/skills', [SkillController::class, 'index']);
    Route::post('/clients', [ClientController::class, 'index']);
    Route::post('/cv', [CVController::class, 'index']);

    Route::post('/all-certificates', [CertificateController::class, 'index']);
    Route::post('/certificate/{id}', [CertificateController::class, 'show']);
});