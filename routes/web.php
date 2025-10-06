<?php

use Illuminate\Support\Facades\Route;

// ===========================
// BACKEND CONTROLLERS
// ===========================
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\AboutusController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\SejarahController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ContactUsController;
// ===========================
// FRONTEND CONTROLLERS
// ===========================
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MediaSocialController;
use App\Http\Controllers\Backend\TenagaKerjaController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\MartLandingFrontendController;
use App\Http\Controllers\Frontend\Company\AboutFrontendController;
use App\Http\Controllers\Frontend\Company\FeaturFrontendController;
use App\Http\Controllers\Frontend\Company\GalleryFrontendController;
use App\Http\Controllers\Frontend\Company\MenuFrontendController;
use App\Http\Controllers\Frontend\Company\TeamFrontendController;
use App\Http\Controllers\Frontend\CompanyLandingFrontendController;


// ===========================
// FRONTEND ROUTES
// ===========================

// Landing page utama
Route::get('/', [CompanyLandingFrontendController::class, 'index'])->name('home');

// Company
Route::get('/about', [AboutFrontendController::class, 'index'])->name('about');


//Company
Route::get('/', [CompanyLandingFrontendController::class, 'index']);
Route::get('/about', [AboutFrontendController::class, 'index']);
Route::get('/menu', [MenuFrontendController::class, 'index']);
Route::get('/team', [TeamFrontendController::class, 'index']);
Route::get('/featur', [FeaturFrontendController::class, 'index']);
Route::get('/gallery', [GalleryFrontendController::class, 'index']);
//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);

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

    // Aboutus routes
    Route::resource('aboutus', AboutUsController::class);
    Route::patch('aboutus/{aboutu}/toggle-status', [AboutusController::class, 'toggleStatus'])->name('aboutus.toggleStatus');

    // Service routes
    Route::resource('services', ServiceController::class);
    Route::patch('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggleStatus');

    // Gallery routes
    Route::resource('gallery', GalleryController::class);
    Route::patch('gallery/{gallery}/toggle-status', [GalleryController::class, 'toggleStatus'])->name('gallery.toggleStatus');

    // Testimonial routes
    Route::resource('testimonial', TestimonialController::class);
    Route::patch('testimonial/{id}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonial.toggleStatus');

    // Sejarah routes
    Route::resource('sejarah', SejarahController::class);
    Route::patch('sejarah/{id}/toggle-status', [SejarahController::class, 'toggleStatus'])->name('sejarah.toggleStatus');

    // Tenaga Kerja routes
    Route::resource('tenagakerja', TenagaKerjaController::class);
    Route::patch('tenagakerja/{id}/toggle-status', [TenagaKerjaController::class, 'toggleStatus'])->name('tenagakerja.toggleStatus');

    // Partners routes
    Route::resource('partners', PartnerController::class);
    Route::patch('partners/{id}/toggle-status', [PartnerController::class, 'toggleStatus'])->name('partners.toggleStatus');

    // Media Social routes
    Route::resource('mediasocial', MediaSocialController::class);
    Route::patch('mediasocial/{id}/toggle-status', [MediaSocialController::class, 'toggleStatus'])->name('mediasocial.toggleStatus');

    // Contact Us routes
    Route::resource('contactus', ContactUsController::class);
});
