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

// ORBIT Brand Identity Guidelines Page (CMS-driven)
Route::get('/brand/{locale?}', function ($locale = 'en') {
    if (!in_array($locale, ['en', 'ar'])) {
        $locale = 'en';
    }

    $dir = $locale === 'ar' ? 'rtl' : 'ltr';

    // Fetch ORBIT Brand Content
    $orbit = [
        'about' => \App\Models\AboutSection::byLocale($locale)->active()->ordered()->first(),
        'missionVision' => \App\Models\MissionVision::byLocale($locale)->active()->first(),
        'coreValues' => \App\Models\CoreValue::byLocale($locale)->active()->ordered()->get(),
        'logoIdentity' => \App\Models\LogoIdentity::byLocale($locale)->active()->first(),
        'colorPalette' => \App\Models\ColorPalette::byLocale($locale)->active()->ordered()->get(),
        'typography' => \App\Models\Typography::byLocale($locale)->active()->ordered()->get(),
        'visualStyle' => \App\Models\VisualStyle::byLocale($locale)->active()->ordered()->first(),
        'strategyApps' => \App\Models\StrategyApplication::byLocale($locale)->active()->ordered()->get(),
        'customers' => \App\Models\Customer::forLocale($locale)->active()->ordered()->get(),
    ];

    return view('orbit-brand', compact('locale', 'dir', 'orbit'));
})->where('locale', 'en|ar')->name('orbit.brand');

// ORBIT Premium Landing Page (Main Homepage)
Route::get('/{locale?}', function ($locale = 'en') {
    if (!in_array($locale, ['en', 'ar'])) {
        $locale = 'en';
    }

    $dir = $locale === 'ar' ? 'rtl' : 'ltr';

    // Fetch all CMS content for ORBIT landing page
    $hero = \App\Models\HeroSection::forLocale($locale)->active()->ordered()->first();
    $about = \App\Models\AboutSection::byLocale($locale)->active()->ordered()->first();
    $missionVision = \App\Models\MissionVision::byLocale($locale)->active()->first();
    $coreValues = \App\Models\CoreValue::byLocale($locale)->active()->ordered()->get();
    $services = \App\Models\Service::forLocale($locale)->active()->ordered()->get();
    $trustBadges = \App\Models\TrustBadge::forLocale($locale)->active()->ordered()->get();
    $customers = \App\Models\Customer::forLocale($locale)->active()->ordered()->get();

    return view('orbit-landing', compact('locale', 'dir', 'hero', 'about', 'missionVision', 'coreValues', 'services', 'trustBadges', 'customers'));
})->where('locale', 'en|ar')->name('landing');

// SMS Services Landing page (alternate)
Route::get('/sms/{locale?}', [LandingPageController::class, 'index'])
    ->where('locale', 'en|ar')
    ->name('sms.landing');
