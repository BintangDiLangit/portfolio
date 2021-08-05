<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/certifApr', function(){
    return view('appreciation.certificate');
});
Route::get('/ttd', function(){
    return view('appreciation.ttd');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/about', [WelcomeController::class, 'about'])->name('about');

Route::get('/achievement', [WelcomeController::class, 'indexAchievement'])->name('achievement');

Route::get('/portofolio', [WelcomeController::class, 'indexPortofolio'])->name('portofolio');
Route::get('/portofolio/{id}', [WelcomeController::class, 'show'])->name('porto.show');

Route::get('/blog', [WelcomeController::class, 'indexBlog'])->name('blog');
Route::get('/blog/{title}', [WelcomeController::class, 'showBlog'])->name('blg.show');

Route::get('tag/{tag_id}', [TagController::class, 'show']);
Route::get('tag', [TagController::class, 'index']);

Route::group(['middleware'=>'isAdmin'],function(){
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('dashboard.admin');
    Route::resource('admin/portofolio',PortofolioController::class)->middleware('auth');
    Route::resource('admin/certificate',CertificateController::class)->middleware('auth');
    Route::resource('admin/client',ClientController::class)->middleware('auth');
    Route::resource('admin/user',UserController::class)->middleware('auth');
    Route::prefix('/admin/cv')->group(function (){
        Route::get('/',[CVController::class,'index'])->name('cv.index')->middleware('auth');;
        Route::post('/',[CVController::class,'store'])->name('cv.store')->middleware('auth');;
    });
});

Route::resource('admin/blog',BlogController::class)->middleware('auth');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});