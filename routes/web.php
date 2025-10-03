<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\Company\AboutFrontendController;
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
//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);

Route::get('/payment', function () {
    return view('page.frontend.mart.payment.index');
});
