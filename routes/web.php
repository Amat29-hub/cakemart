<?php

use App\Http\Controllers\Frontend\Company\AboutFrontendController;
use App\Http\Controllers\Frontend\CompanyLandingFrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MartLandingFrontendController;

Route::get('/', function () {
    return view('welcome');
});

//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);

//Company
Route::get('/', [CompanyLandingFrontendController::class, 'index']);
Route::get('/about', [AboutFrontendController::class, 'index']);

