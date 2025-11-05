<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemSetting;
use App\Models\SeoSetting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // System Settings
        $systemSettings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => ['en' => 'Orbit Technology', 'ar' => 'تقنية أوربت'],
                'group' => 'general',
                'description' => 'Website name in both languages',
                'is_active' => true,
            ],
            [
                'key' => 'maintenance_mode',
                'value' => ['enabled' => false, 'message' => 'We are currently performing maintenance. Please check back soon.'],
                'group' => 'general',
                'description' => 'Enable/disable maintenance mode',
                'is_active' => true,
            ],
            [
                'key' => 'contact_email',
                'value' => ['email' => 'info@ot.com.sa'],
                'group' => 'general',
                'description' => 'Primary contact email',
                'is_active' => true,
            ],

            // Analytics Settings
            [
                'key' => 'google_analytics',
                'value' => ['tracking_id' => 'G-XXXXXXXXXX', 'enabled' => false],
                'group' => 'analytics',
                'description' => 'Google Analytics tracking ID',
                'is_active' => true,
            ],
            [
                'key' => 'facebook_pixel',
                'value' => ['pixel_id' => '', 'enabled' => false],
                'group' => 'analytics',
                'description' => 'Facebook Pixel ID for tracking',
                'is_active' => true,
            ],

            // Social Media Settings
            [
                'key' => 'social_facebook',
                'value' => ['url' => 'https://facebook.com/orbittechnology'],
                'group' => 'social',
                'description' => 'Facebook page URL',
                'is_active' => true,
            ],
            [
                'key' => 'social_twitter',
                'value' => ['url' => 'https://twitter.com/orbittechnology', 'username' => '@orbittechnology'],
                'group' => 'social',
                'description' => 'Twitter profile URL and username',
                'is_active' => true,
            ],
            [
                'key' => 'social_linkedin',
                'value' => ['url' => 'https://linkedin.com/company/orbittechnology'],
                'group' => 'social',
                'description' => 'LinkedIn company page URL',
                'is_active' => true,
            ],
            [
                'key' => 'social_instagram',
                'value' => ['url' => 'https://instagram.com/orbittechnology'],
                'group' => 'social',
                'description' => 'Instagram profile URL',
                'is_active' => true,
            ],
        ];

        foreach ($systemSettings as $setting) {
            SystemSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // SEO Settings - English Landing Page
        SeoSetting::updateOrCreate(
            ['locale' => 'en', 'page' => 'landing'],
            [
                'meta_title' => 'Orbit Technology - Smart Messaging Solutions & WhatsApp Integration',
                'meta_description' => 'Transform your business communication with Orbit Technology\'s advanced WhatsApp Business API solutions. Secure, scalable, and compliant messaging for enterprises across Saudi Arabia.',
                'meta_keywords' => 'WhatsApp Business API, Business Messaging, Smart Communication, Saudi Arabia, Orbit Technology, Enterprise Messaging, Customer Engagement',
                'canonical_url' => url('/en'),

                // Open Graph
                'og_title' => 'Orbit Technology - Leading WhatsApp Business Solutions in Saudi Arabia',
                'og_description' => 'Empower your business with intelligent messaging solutions. Connect with customers seamlessly through WhatsApp Business API integration.',
                'og_image' => asset('logo.png'),
                'og_type' => 'website',

                // Twitter Card
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Orbit Technology - Smart Messaging Solutions',
                'twitter_description' => 'Transform your business communication with advanced WhatsApp Business API solutions.',
                'twitter_image' => asset('logo.png'),
                'twitter_site' => '@orbittechnology',

                // Structured Data
                'structured_data' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'Orbit Technology',
                    'url' => url('/en'),
                    'logo' => asset('logo.png'),
                    'description' => 'Leading provider of WhatsApp Business API solutions in Saudi Arabia',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressCountry' => 'SA',
                        'addressRegion' => 'Riyadh',
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+966-XX-XXX-XXXX',
                        'contactType' => 'customer service',
                        'email' => 'info@ot.com.sa',
                    ],
                    'sameAs' => [
                        'https://facebook.com/orbittechnology',
                        'https://twitter.com/orbittechnology',
                        'https://linkedin.com/company/orbittechnology',
                        'https://instagram.com/orbittechnology',
                    ],
                ],

                'robots' => 'index, follow',
                'is_active' => true,
            ]
        );

        // SEO Settings - Arabic Landing Page
        SeoSetting::updateOrCreate(
            ['locale' => 'ar', 'page' => 'landing'],
            [
                'meta_title' => 'تقنية أوربت - حلول المراسلة الذكية وتكامل واتساب للأعمال',
                'meta_description' => 'حوّل تواصل أعمالك مع حلول Orbit Technology المتقدمة لواجهة برمجة تطبيقات واتساب للأعمال. مراسلة آمنة وقابلة للتوسع ومتوافقة للمؤسسات في جميع أنحاء المملكة العربية السعودية.',
                'meta_keywords' => 'واتساب للأعمال, مراسلة الأعمال, التواصل الذكي, السعودية, أوربت تكنولوجي, رسائل المؤسسات, تفاعل العملاء',
                'canonical_url' => url('/ar'),

                // Open Graph
                'og_title' => 'تقنية أوربت - الرائدة في حلول واتساب للأعمال في السعودية',
                'og_description' => 'عزز أعمالك بحلول المراسلة الذكية. تواصل مع عملائك بسلاسة من خلال تكامل واجهة برمجة تطبيقات واتساب للأعمال.',
                'og_image' => asset('logo.png'),
                'og_type' => 'website',

                // Twitter Card
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'تقنية أوربت - حلول المراسلة الذكية',
                'twitter_description' => 'حوّل تواصل أعمالك مع حلول واجهة برمجة تطبيقات واتساب للأعمال المتقدمة.',
                'twitter_image' => asset('logo.png'),
                'twitter_site' => '@orbittechnology',

                // Structured Data
                'structured_data' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'تقنية أوربت',
                    'url' => url('/ar'),
                    'logo' => asset('logo.png'),
                    'description' => 'المزود الرائد لحلول واجهة برمجة تطبيقات واتساب للأعمال في المملكة العربية السعودية',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressCountry' => 'SA',
                        'addressRegion' => 'الرياض',
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+966-XX-XXX-XXXX',
                        'contactType' => 'customer service',
                        'email' => 'info@ot.com.sa',
                    ],
                    'sameAs' => [
                        'https://facebook.com/orbittechnology',
                        'https://twitter.com/orbittechnology',
                        'https://linkedin.com/company/orbittechnology',
                        'https://instagram.com/orbittechnology',
                    ],
                ],

                'robots' => 'index, follow',
                'is_active' => true,
            ]
        );

        $this->command->info('✅ Settings seeded successfully!');
        $this->command->info('   - System Settings: ' . count($systemSettings) . ' records');
        $this->command->info('   - SEO Settings: 2 records (EN + AR)');
    }
}
