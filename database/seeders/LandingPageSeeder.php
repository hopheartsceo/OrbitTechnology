<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Landing Page Translations
        \App\Models\LandingPageTranslation::create([
            'locale' => 'en',
            'site_title' => 'Orbit Technology - SMS Services',
            'site_description' => 'Professional SMS services in Saudi Arabia',
            'nav_home' => 'Home',
            'nav_services' => 'Services',
            'nav_pricing' => 'Pricing',
            'nav_contact' => 'Contact',
            'nav_login' => 'Login',
            'footer_copyright' => 'All Rights Reserved - Orbit Technology',
        ]);

        \App\Models\LandingPageTranslation::create([
            'locale' => 'ar',
            'site_title' => 'أوربت تكنولوجي - خدمات الرسائل القصيرة',
            'site_description' => 'خدمات رسائل SMS احترافية في المملكة العربية السعودية',
            'nav_home' => 'الرئيسية',
            'nav_services' => 'خدماتنا',
            'nav_pricing' => 'الأسعار',
            'nav_contact' => 'تواصل معنا',
            'nav_login' => 'تسجيل الدخول',
            'footer_copyright' => 'جميع الحقوق محفوظة - أوربت تكنولوجي',
        ]);

        // Hero Sections
        \App\Models\HeroSection::create([
            'locale' => 'en',
            'title' => 'Professional SMS Services for Your Business',
            'subtitle' => 'Authorized provider by CITC - We provide bulk SMS solutions with competitive prices',
            'primary_button_text' => 'Start Now',
            'primary_button_url' => 'https://app.mobile.net.sa/reg',
            'secondary_button_text' => 'View Pricing',
            'secondary_button_url' => '#pricing',
        ]);

        \App\Models\HeroSection::create([
            'locale' => 'ar',
            'title' => 'خدمات رسائل SMS احترافية لأعمالك',
            'subtitle' => 'مزود معتمد من هيئة الاتصالات - نقدم حلول الرسائل الجماعية بأسعار تنافسية',
            'primary_button_text' => 'ابدأ الآن',
            'primary_button_url' => 'https://app.mobile.net.sa/reg',
            'secondary_button_text' => 'عرض الأسعار',
            'secondary_button_url' => '#pricing',
        ]);

        // Run php artisan db:seed --class=LandingPageSeeder to populate more
        // Add Features, Services, Pricing, Stats, Sectors, Trust Badges, Contact Info here
    }
}
