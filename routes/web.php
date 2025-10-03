<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MartLandingFrontendController;

Route::get('/', function () {
    return view('welcome');
});

//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);




// Route Backend
Route::prefix('adminpanel')->group(function () {
    // Hero
    Route::resource('dashboard', DashboardController::class);
});
