<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\Service;
use App\Models\PricingTier;
use App\Models\Stat;
use App\Models\Sector;
use App\Models\TrustBadge;
use App\Models\ContactInfo;

class CompleteCMSSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Feature::truncate();
        Service::truncate();
        PricingTier::truncate();
        Stat::truncate();
        Sector::truncate();
        TrustBadge::truncate();
        ContactInfo::truncate();

        // ============================================
        // FEATURES - English
        // ============================================
        $featuresEN = [
            [
                'icon' => 'fa-solid fa-bolt',
                'title' => 'Lightning Fast Delivery',
                'description' => 'Send thousands of messages instantly with our high-speed infrastructure. Delivery within 2 seconds guaranteed.',
                'order' => 0,
            ],
            [
                'icon' => 'fa-solid fa-shield-halved',
                'title' => 'Bank-Level Security',
                'description' => 'Your data is protected with enterprise-grade encryption and security protocols. ISO 27001 certified.',
                'order' => 1,
            ],
            [
                'icon' => 'fa-solid fa-chart-line',
                'title' => 'Real-Time Analytics',
                'description' => 'Track message delivery, open rates, and performance with comprehensive real-time dashboards.',
                'order' => 2,
            ],
            [
                'icon' => 'fa-solid fa-globe',
                'title' => 'International Coverage',
                'description' => 'Send SMS to 190+ countries worldwide with competitive rates and reliable delivery.',
                'order' => 3,
            ],
            [
                'icon' => 'fa-solid fa-code',
                'title' => 'Developer-Friendly API',
                'description' => 'Easy integration with RESTful API, webhooks, and SDKs for all major programming languages.',
                'order' => 4,
            ],
            [
                'icon' => 'fa-solid fa-headset',
                'title' => '24/7 Expert Support',
                'description' => 'Our dedicated support team is available around the clock to help you succeed.',
                'order' => 5,
            ],
        ];

        foreach ($featuresEN as $feature) {
            Feature::create(array_merge($feature, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // FEATURES - Arabic
        // ============================================
        $featuresAR = [
            [
                'icon' => 'fa-solid fa-bolt',
                'title' => 'إرسال سريع كالبرق',
                'description' => 'أرسل آلاف الرسائل فورياً بفضل بنيتنا التحتية عالية السرعة. التسليم مضمون خلال ثانيتين.',
                'order' => 0,
            ],
            [
                'icon' => 'fa-solid fa-shield-halved',
                'title' => 'أمان بمستوى البنوك',
                'description' => 'بياناتك محمية بتشفير وبروتوكولات أمان على مستوى المؤسسات. حاصلون على شهادة ISO 27001.',
                'order' => 1,
            ],
            [
                'icon' => 'fa-solid fa-chart-line',
                'title' => 'تحليلات فورية',
                'description' => 'تتبع تسليم الرسائل ومعدلات الفتح والأداء من خلال لوحات معلومات شاملة في الوقت الفعلي.',
                'order' => 2,
            ],
            [
                'icon' => 'fa-solid fa-globe',
                'title' => 'تغطية دولية',
                'description' => 'أرسل رسائل SMS إلى أكثر من 190 دولة حول العالم بأسعار تنافسية وتسليم موثوق.',
                'order' => 3,
            ],
            [
                'icon' => 'fa-solid fa-code',
                'title' => 'واجهة برمجية سهلة',
                'description' => 'تكامل سهل مع RESTful API، والـ webhooks، ومكتبات برمجية لجميع لغات البرمجة الرئيسية.',
                'order' => 4,
            ],
            [
                'icon' => 'fa-solid fa-headset',
                'title' => 'دعم فني 24/7',
                'description' => 'فريق الدعم المتخصص لدينا متاح على مدار الساعة لمساعدتك على النجاح.',
                'order' => 5,
            ],
        ];

        foreach ($featuresAR as $feature) {
            Feature::create(array_merge($feature, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // SERVICES - English
        // ============================================
        $servicesEN = [
            [
                'icon' => 'fa-solid fa-comment-dots',
                'title' => 'Bulk SMS',
                'description' => 'Send promotional messages, notifications, and updates to thousands of customers instantly.',
                'order' => 0,
            ],
            [
                'icon' => 'fa-solid fa-shield-halved',
                'title' => 'OTP & Verification',
                'description' => 'Secure your applications with one-time passwords and two-factor authentication SMS.',
                'order' => 1,
            ],
            [
                'icon' => 'fa-solid fa-bell',
                'title' => 'Alerts & Reminders',
                'description' => 'Automated appointment reminders, payment alerts, and important notifications.',
                'order' => 2,
            ],
            [
                'icon' => 'fa-solid fa-chart-pie',
                'title' => 'Marketing Campaigns',
                'description' => 'Run targeted SMS marketing campaigns with segmentation and personalization.',
                'order' => 3,
            ],
            [
                'icon' => 'fa-solid fa-exchange-alt',
                'title' => 'Two-Way Messaging',
                'description' => 'Engage customers with interactive SMS conversations and automated responses.',
                'order' => 4,
            ],
        ];

        foreach ($servicesEN as $service) {
            Service::create(array_merge($service, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // SERVICES - Arabic
        // ============================================
        $servicesAR = [
            [
                'icon' => 'fa-solid fa-comment-dots',
                'title' => 'رسائل SMS جماعية',
                'description' => 'أرسل رسائل ترويجية وإشعارات وتحديثات لآلاف العملاء فورياً.',
                'order' => 0,
            ],
            [
                'icon' => 'fa-solid fa-shield-halved',
                'title' => 'OTP والتحقق',
                'description' => 'أمِّن تطبيقاتك بكلمات مرور لمرة واحدة والمصادقة الثنائية عبر SMS.',
                'order' => 1,
            ],
            [
                'icon' => 'fa-solid fa-bell',
                'title' => 'التنبيهات والتذكيرات',
                'description' => 'تذكيرات المواعيد الآلية، تنبيهات الدفع، والإشعارات المهمة.',
                'order' => 2,
            ],
            [
                'icon' => 'fa-solid fa-chart-pie',
                'title' => 'الحملات التسويقية',
                'description' => 'نفذ حملات تسويقية مستهدفة عبر SMS مع التقسيم والتخصيص.',
                'order' => 3,
            ],
            [
                'icon' => 'fa-solid fa-exchange-alt',
                'title' => 'المراسلة الثنائية',
                'description' => 'تفاعل مع العملاء من خلال محادثات SMS تفاعلية وردود آلية.',
                'order' => 4,
            ],
        ];

        foreach ($servicesAR as $service) {
            Service::create(array_merge($service, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // PRICING TIERS - English
        // ============================================
        $pricingEN = [
            [
                'tier_name' => '0 - 500 messages',
                'price' => 0.11,
                'per_message_text' => 'per message',
                'is_featured' => false,
                'order' => 0,
            ],
            [
                'tier_name' => '500 - 1,000 messages',
                'price' => 0.10,
                'per_message_text' => 'per message',
                'is_featured' => false,
                'order' => 1,
            ],
            [
                'tier_name' => '1,000 - 5,000 messages',
                'price' => 0.09,
                'per_message_text' => 'per message',
                'is_featured' => false,
                'order' => 2,
            ],
            [
                'tier_name' => '5,000+ messages',
                'price' => 0.08,
                'per_message_text' => 'per message',
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($pricingEN as $tier) {
            PricingTier::create(array_merge($tier, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // PRICING TIERS - Arabic
        // ============================================
        $pricingAR = [
            [
                'tier_name' => '0 - 500 رسالة',
                'price' => 0.11,
                'per_message_text' => 'لكل رسالة',
                'is_featured' => false,
                'order' => 0,
            ],
            [
                'tier_name' => '500 - 1,000 رسالة',
                'price' => 0.10,
                'per_message_text' => 'لكل رسالة',
                'is_featured' => false,
                'order' => 1,
            ],
            [
                'tier_name' => '1,000 - 5,000 رسالة',
                'price' => 0.09,
                'per_message_text' => 'لكل رسالة',
                'is_featured' => false,
                'order' => 2,
            ],
            [
                'tier_name' => '5,000+ رسالة',
                'price' => 0.08,
                'per_message_text' => 'لكل رسالة',
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($pricingAR as $tier) {
            PricingTier::create(array_merge($tier, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // STATS - English
        // ============================================
        $statsEN = [
            [
                'number' => '500+',
                'label' => 'Active Clients',
                'order' => 0,
            ],
            [
                'number' => '10M+',
                'label' => 'Messages Sent',
                'order' => 1,
            ],
            [
                'number' => '99.9%',
                'label' => 'Success Rate',
                'order' => 2,
            ],
            [
                'number' => '< 2s',
                'label' => 'Avg. Delivery Time',
                'order' => 3,
            ],
        ];

        foreach ($statsEN as $stat) {
            Stat::create(array_merge($stat, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // STATS - Arabic
        // ============================================
        $statsAR = [
            [
                'number' => '500+',
                'label' => 'عميل نشط',
                'order' => 0,
            ],
            [
                'number' => '10M+',
                'label' => 'رسالة مرسلة',
                'order' => 1,
            ],
            [
                'number' => '99.9%',
                'label' => 'معدل النجاح',
                'order' => 2,
            ],
            [
                'number' => '< 2s',
                'label' => 'متوسط وقت التسليم',
                'order' => 3,
            ],
        ];

        foreach ($statsAR as $stat) {
            Stat::create(array_merge($stat, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // SECTORS - English
        // ============================================
        $sectorsEN = [
            ['name' => 'Education', 'order' => 0],
            ['name' => 'Healthcare', 'order' => 1],
            ['name' => 'Retail', 'order' => 2],
            ['name' => 'Banking', 'order' => 3],
            ['name' => 'Government', 'order' => 4],
            ['name' => 'Technology', 'order' => 5],
            ['name' => 'Real Estate', 'order' => 6],
            ['name' => 'Transportation', 'order' => 7],
        ];

        foreach ($sectorsEN as $sector) {
            Sector::create(array_merge($sector, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // SECTORS - Arabic
        // ============================================
        $sectorsAR = [
            ['name' => 'التعليم', 'order' => 0],
            ['name' => 'الصحة', 'order' => 1],
            ['name' => 'التجزئة', 'order' => 2],
            ['name' => 'البنوك', 'order' => 3],
            ['name' => 'الحكومة', 'order' => 4],
            ['name' => 'التقنية', 'order' => 5],
            ['name' => 'العقارات', 'order' => 6],
            ['name' => 'النقل', 'order' => 7],
        ];

        foreach ($sectorsAR as $sector) {
            Sector::create(array_merge($sector, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // TRUST BADGES - English
        // ============================================
        $badgesEN = [
            [
                'text' => 'Licensed by CITC',
                'icon' => 'fa-solid fa-certificate',
                'order' => 0,
            ],
            [
                'text' => 'Approved for Noor System',
                'icon' => 'fa-solid fa-school',
                'order' => 1,
            ],
            [
                'text' => 'ISO 27001 Certified',
                'icon' => 'fa-solid fa-shield-alt',
                'order' => 2,
            ],
        ];

        foreach ($badgesEN as $badge) {
            TrustBadge::create(array_merge($badge, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // TRUST BADGES - Arabic
        // ============================================
        $badgesAR = [
            [
                'text' => 'مرخص من هيئة الاتصالات',
                'icon' => 'fa-solid fa-certificate',
                'order' => 0,
            ],
            [
                'text' => 'معتمد لنظام نور',
                'icon' => 'fa-solid fa-school',
                'order' => 1,
            ],
            [
                'text' => 'شهادة ISO 27001',
                'icon' => 'fa-solid fa-shield-alt',
                'order' => 2,
            ],
        ];

        foreach ($badgesAR as $badge) {
            TrustBadge::create(array_merge($badge, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        // ============================================
        // CONTACT INFO - English
        // ============================================
        $contactEN = [
            [
                'type' => 'phone',
                'title' => 'Phone',
                'value' => '920006900',
                'icon' => 'fa-solid fa-phone-alt',
                'order' => 0,
            ],
            [
                'type' => 'email',
                'title' => 'Email',
                'value' => 'info@ot.com.sa',
                'icon' => 'fa-solid fa-envelope',
                'order' => 1,
            ],
            [
                'type' => 'address',
                'title' => 'Location',
                'value' => 'Riyadh, Saudi Arabia',
                'icon' => 'fa-solid fa-map-marker-alt',
                'order' => 2,
            ],
        ];

        foreach ($contactEN as $contact) {
            ContactInfo::create(array_merge($contact, [
                'locale' => 'en',
                'is_active' => true,
            ]));
        }

        // ============================================
        // CONTACT INFO - Arabic
        // ============================================
        $contactAR = [
            [
                'type' => 'phone',
                'title' => 'الهاتف',
                'value' => '920006900',
                'icon' => 'fa-solid fa-phone-alt',
                'order' => 0,
            ],
            [
                'type' => 'email',
                'title' => 'البريد الإلكتروني',
                'value' => 'info@ot.com.sa',
                'icon' => 'fa-solid fa-envelope',
                'order' => 1,
            ],
            [
                'type' => 'address',
                'title' => 'الموقع',
                'value' => 'الرياض، المملكة العربية السعودية',
                'icon' => 'fa-solid fa-map-marker-alt',
                'order' => 2,
            ],
        ];

        foreach ($contactAR as $contact) {
            ContactInfo::create(array_merge($contact, [
                'locale' => 'ar',
                'is_active' => true,
            ]));
        }

        $this->command->info('✅ Complete CMS data seeded successfully!');
        $this->command->info('📊 Seeded: Features, Services, Pricing, Stats, Sectors, Trust Badges, Contact Info');
        $this->command->info('🌐 Languages: English (EN) & Arabic (AR)');
    }
}
