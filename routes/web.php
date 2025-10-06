<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\Company\AboutFrontendController;
use App\Http\Controllers\Frontend\Company\FeaturFrontendController;
use App\Http\Controllers\Frontend\Company\GalleryFrontendController;
use App\Http\Controllers\Frontend\Company\MenuFrontendController;
use App\Http\Controllers\Frontend\Company\TeamFrontendController;
use App\Http\Controllers\Frontend\CompanyLandingFrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MartLandingFrontendController;

Route::get('/', function () {
    return view('welcome');
});


// Route Backend
Route::prefix('adminpanel')->group(function () {
    // Hero
    Route::resource('dashboard', DashboardController::class);
});

//Company
Route::get('/', [CompanyLandingFrontendController::class, 'index']);
Route::get('/about', [AboutFrontendController::class, 'index']);
Route::get('/menu', [MenuFrontendController::class, 'index']);
Route::get('/team', [TeamFrontendController::class, 'index']);
Route::get('/featur', [FeaturFrontendController::class, 'index']);
Route::get('/gallery', [GalleryFrontendController::class, 'index']);
//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);

Route::get('/payment', function () {
    return view('page.frontend.mart.payment.index');
});
