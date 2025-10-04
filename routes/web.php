<?php

use Illuminate\Support\Facades\Route;

// ===========================
// BACKEND CONTROLLERS
// ===========================
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HeroController;
// ===========================
// FRONTEND CONTROLLERS
// ===========================
use App\Http\Controllers\Frontend\MartLandingFrontendController;
use App\Http\Controllers\Frontend\Company\AboutFrontendController;
use App\Http\Controllers\Frontend\CompanyLandingFrontendController;


// ===========================
// FRONTEND ROUTES
// ===========================

// Landing page utama
Route::get('/', [CompanyLandingFrontendController::class, 'index'])->name('home');

// Company
Route::get('/about', [AboutFrontendController::class, 'index'])->name('about');

// Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index'])->name('mart');

// Payment
Route::get('/payment', function () {
    return view('page.frontend.mart.payment.index');
})->name('payment');


// ===========================
// BACKEND ROUTES (Admin Panel)
// ===========================
Route::prefix('adminpanel')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Hero routes
    Route::resource('hero', HeroController::class);
    Route::patch('hero/{hero}/toggle-status', [HeroController::class, 'toggleStatus'])->name('hero.toggleStatus');
});
