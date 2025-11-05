<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use App\Models\{
    LandingPageTranslation,
    HeroSection,
    Feature,
    Service,
    PricingTier,
    Stat,
    Sector,
    TrustBadge,
    ContactInfo,
    SeoSetting,
    SystemSetting
};

class LandingPageController extends Controller
{
    public function index($locale = null)
    {
        // Set locale from URL or session, default to Arabic
        $locale = $locale ?? session('locale', 'ar');

        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'ar';
        }

        session(['locale' => $locale]);
        App::setLocale($locale);

        // Fetch content from database (CMS-managed)
        $translations = LandingPageTranslation::forLocale($locale)->active()->first();
        $hero = HeroSection::forLocale($locale)->active()->ordered()->first();
        $features = Feature::forLocale($locale)->active()->ordered()->get();
        $services = Service::forLocale($locale)->active()->ordered()->get();
        $pricing = PricingTier::forLocale($locale)->active()->ordered()->get();
        $stats = Stat::forLocale($locale)->active()->ordered()->get();
        $sectors = Sector::forLocale($locale)->active()->ordered()->get();
        $trustBadges = TrustBadge::forLocale($locale)->active()->ordered()->get();
        $contactInfos = ContactInfo::forLocale($locale)->active()->ordered()->get();

        // Fetch SEO settings for this page
        $seo = SeoSetting::getForPage('landing', $locale);

        // Fetch system settings
        $systemSettings = SystemSetting::active()->get()->pluck('value', 'key')->toArray();

        // Fallback to JSON translations if database is empty (backward compatibility)
        if (!$translations) {
            $langPath = resource_path("lang/{$locale}.json");
            $jsonTranslations = File::exists($langPath)
                ? json_decode(File::get($langPath), true)
                : [];
        } else {
            $jsonTranslations = [];
        }

        return view('landing', [
            'locale' => $locale,
            'dir' => $locale === 'ar' ? 'rtl' : 'ltr',
            'translations' => $jsonTranslations, // Legacy support
            'cms' => [
                'translations' => $translations,
                'hero' => $hero,
                'features' => $features,
                'services' => $services,
                'pricing' => $pricing,
                'stats' => $stats,
                'sectors' => $sectors,
                'trustBadges' => $trustBadges,
                'contactInfos' => $contactInfos,
            ],
            'seo' => $seo,
            'settings' => $systemSettings,
        ]);
    }
}
