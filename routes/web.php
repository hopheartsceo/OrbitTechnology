<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// Language switching
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Landing page with locale
Route::get('/{locale?}', [LandingPageController::class, 'index'])
    ->where('locale', 'en|ar')
    ->name('landing');
