<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MartLandingFrontendController;

Route::get('/', function () {
    return view('welcome');
});

//Mart
Route::get('/mart', [MartLandingFrontendController::class, 'index']);
