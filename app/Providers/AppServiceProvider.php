<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure Filament Language Switcher
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en']) // Arabic and English
                ->labels([
                    'ar' => '🇸🇦 العربية',
                    'en' => '🇬🇧 English',
                ])
                ->circular() // Circular switching between languages
                ->displayLocale('name'); // Display language name instead of code
        });
    }
}
