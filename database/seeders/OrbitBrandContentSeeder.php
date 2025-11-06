<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    AboutSection,
    MissionVision,
    CoreValue,
    LogoIdentity,
    ColorPalette,
    Typography,
    VisualStyle,
    StrategyApplication
};

class OrbitBrandContentSeeder extends Seeder
{
    public function run(): void
    {
        // ==== ABOUT SECTION ====
        $aboutSections = [
            [
                'locale' => 'en',
                'title' => 'About ORBIT',
                'description' => 'ORBIT is a forward-thinking brand built on creativity, clarity, and consistency. Our visual identity guidelines empower designers, partners, and collaborators to express the ORBIT brand confidently across all digital and print platforms.',
                'image_url' => null,
                'is_active' => true,
                'order' => 0,
            ],
            [
                'locale' => 'ar',
                'title' => 'عن ORBIT',
                'description' => 'ORBIT هي علامة تجارية تفكر في المستقبل مبنية على الإبداع والوضوح والاتساق. تمكّن إرشادات هويتنا البصرية المصممين والشركاء والمتعاونين من التعبير عن علامة ORBIT بثقة عبر جميع المنصات الرقمية والمطبوعة.',
                'image_url' => null,
                'is_active' => true,
                'order' => 0,
            ],
        ];

        foreach ($aboutSections as $about) {
            AboutSection::create($about);
        }

        // ==== MISSION & VISION ====
        $missionVisions = [
            [
                'locale' => 'en',
                'section_title' => 'Mission & Vision',
                'vision_title' => 'Vision',
                'vision_text' => 'To build a coordinated, consistent, and effective brand presence that inspires trust and innovation.',
                'mission_title' => 'Mission',
                'mission_text' => 'To empower creativity while maintaining integrity and coherence across all expressions.',
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'section_title' => 'المهمة والرؤية',
                'vision_title' => 'الرؤية',
                'vision_text' => 'بناء حضور متناسق ومتسق وفعال للعلامة التجارية يلهم الثقة والابتكار.',
                'mission_title' => 'المهمة',
                'mission_text' => 'تمكين الإبداع مع الحفاظ على النزاهة والتماسك عبر جميع التعبيرات.',
                'is_active' => true,
            ],
        ];

        foreach ($missionVisions as $mv) {
            MissionVision::create($mv);
        }

        // ==== CORE VALUES ====
        $coreValues = [
            // English
            ['locale' => 'en', 'name' => 'Integrity', 'description' => 'Transparency & trust in everything we do.', 'icon' => 'fa-solid fa-shield-halved', 'is_active' => true, 'order' => 1],
            ['locale' => 'en', 'name' => 'Commitment', 'description' => 'Inspiring full potential in every project.', 'icon' => 'fa-solid fa-handshake', 'is_active' => true, 'order' => 2],
            ['locale' => 'en', 'name' => 'Teamwork', 'description' => 'We Are One - collaboration at our core.', 'icon' => 'fa-solid fa-users', 'is_active' => true, 'order' => 3],
            ['locale' => 'en', 'name' => 'Respect', 'description' => 'Courtesy and consideration for all viewpoints.', 'icon' => 'fa-solid fa-heart', 'is_active' => true, 'order' => 4],
            ['locale' => 'en', 'name' => 'Passion', 'description' => 'Motivation through purpose and dedication.', 'icon' => 'fa-solid fa-fire', 'is_active' => true, 'order' => 5],
            ['locale' => 'en', 'name' => 'Agility', 'description' => 'Growth through challenge and adaptation.', 'icon' => 'fa-solid fa-bolt', 'is_active' => true, 'order' => 6],
            // Arabic
            ['locale' => 'ar', 'name' => 'النزاهة', 'description' => 'الشفافية والثقة في كل ما نقوم به.', 'icon' => 'fa-solid fa-shield-halved', 'is_active' => true, 'order' => 1],
            ['locale' => 'ar', 'name' => 'الالتزام', 'description' => 'إلهام الإمكانات الكاملة في كل مشروع.', 'icon' => 'fa-solid fa-handshake', 'is_active' => true, 'order' => 2],
            ['locale' => 'ar', 'name' => 'العمل الجماعي', 'description' => 'نحن واحد - التعاون في صميم عملنا.', 'icon' => 'fa-solid fa-users', 'is_active' => true, 'order' => 3],
            ['locale' => 'ar', 'name' => 'الاحترام', 'description' => 'الكياسة والاعتبار لجميع وجهات النظر.', 'icon' => 'fa-solid fa-heart', 'is_active' => true, 'order' => 4],
            ['locale' => 'ar', 'name' => 'الشغف', 'description' => 'الحافز من خلال الهدف والتفاني.', 'icon' => 'fa-solid fa-fire', 'is_active' => true, 'order' => 5],
            ['locale' => 'ar', 'name' => 'المرونة', 'description' => 'النمو من خلال التحدي والتكيف.', 'icon' => 'fa-solid fa-bolt', 'is_active' => true, 'order' => 6],
        ];

        foreach ($coreValues as $value) {
            CoreValue::create($value);
        }

        // ==== LOGO IDENTITY ====
        $logoIdentities = [
            [
                'locale' => 'en',
                'section_title' => 'Logo & Identity',
                'description' => 'Our logo is the cornerstone of our visual identity. Always use master artwork; never alter proportions or colors.',
                'primary_logo_url' => '/logo.png',
                'symbol_logo_url' => '/favicon.ico',
                'usage_rules' => [
                    'do' => [
                        'Use master artwork files',
                        'Maintain clear space',
                        'Use approved colors only',
                        'Ensure proper contrast',
                    ],
                    'dont' => [
                        'Distort or stretch the logo',
                        'Change logo colors',
                        'Add effects or shadows',
                        'Place on busy backgrounds',
                    ],
                ],
                'is_active' => true,
            ],
            [
                'locale' => 'ar',
                'section_title' => 'الشعار والهوية',
                'description' => 'شعارنا هو حجر الزاوية في هويتنا البصرية. استخدم دائمًا الملفات الأصلية؛ لا تغير النسب أو الألوان أبدًا.',
                'primary_logo_url' => '/logo.png',
                'symbol_logo_url' => '/favicon.ico',
                'usage_rules' => [
                    'do' => [
                        'استخدام ملفات العمل الأصلية',
                        'الحفاظ على المساحة الواضحة',
                        'استخدام الألوان المعتمدة فقط',
                        'ضمان التباين المناسب',
                    ],
                    'dont' => [
                        'تشويه أو تمديد الشعار',
                        'تغيير ألوان الشعار',
                        'إضافة تأثيرات أو ظلال',
                        'الوضع على خلفيات مشغولة',
                    ],
                ],
                'is_active' => true,
            ],
        ];

        foreach ($logoIdentities as $logo) {
            LogoIdentity::create($logo);
        }

        // ==== COLOR PALETTE ====
        $colorPalettes = [
            // English
            ['locale' => 'en', 'section_title' => 'Color Palette', 'description' => 'Our palette represents balance between strength, elegance, and neutrality.', 'color_name' => 'Burgundy', 'hex_code' => '#7B1E3C', 'rgb_value' => 'rgb(123, 30, 60)', 'usage_context' => 'Brand accent, CTAs, emphasis', 'is_active' => true, 'order' => 1],
            ['locale' => 'en', 'section_title' => 'Color Palette', 'description' => 'Our palette represents balance between strength, elegance, and neutrality.', 'color_name' => 'Beige', 'hex_code' => '#E6D5C3', 'rgb_value' => 'rgb(230, 213, 195)', 'usage_context' => 'Backgrounds, softness, warmth', 'is_active' => true, 'order' => 2],
            ['locale' => 'en', 'section_title' => 'Color Palette', 'description' => 'Our palette represents balance between strength, elegance, and neutrality.', 'color_name' => 'Cool Gray', 'hex_code' => '#BFC0C0', 'rgb_value' => 'rgb(191, 192, 192)', 'usage_context' => 'Text, borders, neutral elements', 'is_active' => true, 'order' => 3],
            // Arabic
            ['locale' => 'ar', 'section_title' => 'لوحة الألوان', 'description' => 'تمثل لوحتنا التوازن بين القوة والأناقة والحياد.', 'color_name' => 'عنابي', 'hex_code' => '#7B1E3C', 'rgb_value' => 'rgb(123, 30, 60)', 'usage_context' => 'لون العلامة التجارية، أزرار الإجراء، التركيز', 'is_active' => true, 'order' => 1],
            ['locale' => 'ar', 'section_title' => 'لوحة الألوان', 'description' => 'تمثل لوحتنا التوازن بين القوة والأناقة والحياد.', 'color_name' => 'بيج', 'hex_code' => '#E6D5C3', 'rgb_value' => 'rgb(230, 213, 195)', 'usage_context' => 'الخلفيات، النعومة، الدفء', 'is_active' => true, 'order' => 2],
            ['locale' => 'ar', 'section_title' => 'لوحة الألوان', 'description' => 'تمثل لوحتنا التوازن بين القوة والأناقة والحياد.', 'color_name' => 'رمادي بارد', 'hex_code' => '#BFC0C0', 'rgb_value' => 'rgb(191, 192, 192)', 'usage_context' => 'النصوص، الحدود، العناصر المحايدة', 'is_active' => true, 'order' => 3],
        ];

        foreach ($colorPalettes as $color) {
            ColorPalette::create($color);
        }

        // ==== TYPOGRAPHY ====
        $typographies = [
            // English
            ['locale' => 'en', 'section_title' => 'Typography', 'description' => 'Our font system ensures clarity and consistency across all touchpoints.', 'font_category' => 'Primary', 'font_name' => 'Botera', 'font_weights' => ['Regular', 'Bold'], 'usage_context' => 'Headlines, hero sections', 'is_active' => true, 'order' => 1],
            ['locale' => 'en', 'section_title' => 'Typography', 'description' => 'Our font system ensures clarity and consistency across all touchpoints.', 'font_category' => 'Primary', 'font_name' => 'Montserrat', 'font_weights' => ['Regular', 'Medium', 'Bold'], 'usage_context' => 'Body text, UI elements', 'is_active' => true, 'order' => 2],
            ['locale' => 'en', 'section_title' => 'Typography', 'description' => 'Our font system ensures clarity and consistency across all touchpoints.', 'font_category' => 'Secondary', 'font_name' => 'Gotham', 'font_weights' => ['Light', 'Book', 'Bold', 'Black'], 'usage_context' => 'Print, presentations', 'is_active' => true, 'order' => 3],
            ['locale' => 'en', 'section_title' => 'Typography', 'description' => 'Our font system ensures clarity and consistency across all touchpoints.', 'font_category' => 'Arabic', 'font_name' => 'Somar', 'font_weights' => ['ExtraLight', 'Medium', 'ExtraBold'], 'usage_context' => 'Arabic content', 'is_active' => true, 'order' => 4],
            // Arabic
            ['locale' => 'ar', 'section_title' => 'الطباعة', 'description' => 'يضمن نظام الخطوط لدينا الوضوح والاتساق عبر جميع نقاط الاتصال.', 'font_category' => 'أساسي', 'font_name' => 'Botera', 'font_weights' => ['عادي', 'عريض'], 'usage_context' => 'العناوين الرئيسية، أقسام البطل', 'is_active' => true, 'order' => 1],
            ['locale' => 'ar', 'section_title' => 'الطباعة', 'description' => 'يضمن نظام الخطوط لدينا الوضوح والاتساق عبر جميع نقاط الاتصال.', 'font_category' => 'أساسي', 'font_name' => 'Montserrat', 'font_weights' => ['عادي', 'متوسط', 'عريض'], 'usage_context' => 'النص الأساسي، عناصر الواجهة', 'is_active' => true, 'order' => 2],
            ['locale' => 'ar', 'section_title' => 'الطباعة', 'description' => 'يضمن نظام الخطوط لدينا الوضوح والاتساق عبر جميع نقاط الاتصال.', 'font_category' => 'ثانوي', 'font_name' => 'Gotham', 'font_weights' => ['خفيف', 'كتاب', 'عريض', 'أسود'], 'usage_context' => 'المطبوعات، العروض التقديمية', 'is_active' => true, 'order' => 3],
            ['locale' => 'ar', 'section_title' => 'الطباعة', 'description' => 'يضمن نظام الخطوط لدينا الوضوح والاتساق عبر جميع نقاط الاتصال.', 'font_category' => 'عربي', 'font_name' => 'سمر', 'font_weights' => ['خفيف جداً', 'متوسط', 'عريض جداً'], 'usage_context' => 'المحتوى العربي', 'is_active' => true, 'order' => 4],
        ];

        foreach ($typographies as $typo) {
            Typography::create($typo);
        }

        // ==== VISUAL STYLES ====
        $visualStyles = [
            [
                'locale' => 'en',
                'section_title' => 'Visual Style',
                'description' => "ORBIT's visual rhythm emphasizes clarity through structure.",
                'style_elements' => [
                    'Plenty of whitespace for breathing room',
                    'Clean grid-based layouts',
                    'Minimal ornamentation',
                    'Professional, neutral-toned photography',
                    'Consistent linear iconography',
                    'Balanced compositions',
                ],
                'mockup_image_url' => null,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'locale' => 'ar',
                'section_title' => 'الأسلوب البصري',
                'description' => 'يؤكد الإيقاع البصري لـ ORBIT على الوضوح من خلال البنية.',
                'style_elements' => [
                    'الكثير من المساحات البيضاء للتنفس',
                    'تخطيطات قائمة على شبكة نظيفة',
                    'الحد الأدنى من الزخرفة',
                    'تصوير فوتوغرافي احترافي بألوان محايدة',
                    'أيقونات خطية متسقة',
                    'تركيبات متوازنة',
                ],
                'mockup_image_url' => null,
                'is_active' => true,
                'order' => 1,
            ],
        ];

        foreach ($visualStyles as $style) {
            VisualStyle::create($style);
        }

        // ==== STRATEGY APPLICATIONS ====
        $strategyApplications = [
            // English
            ['locale' => 'en', 'section_title' => 'Brand Applications', 'description' => 'Consistency in every touchpoint.', 'application_type' => 'Business Proposal', 'preview_image_url' => null, 'details' => 'Professional presentation template following brand guidelines', 'is_active' => true, 'order' => 1],
            ['locale' => 'en', 'section_title' => 'Brand Applications', 'description' => 'Consistency in every touchpoint.', 'application_type' => 'Brand Deck', 'preview_image_url' => null, 'details' => 'Comprehensive brand identity showcase', 'is_active' => true, 'order' => 2],
            ['locale' => 'en', 'section_title' => 'Brand Applications', 'description' => 'Consistency in every touchpoint.', 'application_type' => 'Infographic', 'preview_image_url' => null, 'details' => 'Data visualization using brand colors and typography', 'is_active' => true, 'order' => 3],
            // Arabic
            ['locale' => 'ar', 'section_title' => 'تطبيقات العلامة التجارية', 'description' => 'الاتساق في كل نقطة اتصال.', 'application_type' => 'اقتراح عمل', 'preview_image_url' => null, 'details' => 'قالب عرض تقديمي احترافي يتبع إرشادات العلامة التجارية', 'is_active' => true, 'order' => 1],
            ['locale' => 'ar', 'section_title' => 'تطبيقات العلامة التجارية', 'description' => 'الاتساق في كل نقطة اتصال.', 'application_type' => 'مجموعة العلامة التجارية', 'preview_image_url' => null, 'details' => 'عرض شامل لهوية العلامة التجارية', 'is_active' => true, 'order' => 2],
            ['locale' => 'ar', 'section_title' => 'تطبيقات العلامة التجارية', 'description' => 'الاتساق في كل نقطة اتصال.', 'application_type' => 'رسم معلوماتي', 'preview_image_url' => null, 'details' => 'تصور البيانات باستخدام ألوان العلامة التجارية والطباعة', 'is_active' => true, 'order' => 3],
        ];

        foreach ($strategyApplications as $app) {
            StrategyApplication::create($app);
        }

        $this->command->info('✅ ORBIT Brand Content seeded successfully!');
        $this->command->info('📊 Summary:');
        $this->command->info('   - About Sections: ' . AboutSection::count());
        $this->command->info('   - Mission & Vision: ' . MissionVision::count());
        $this->command->info('   - Core Values: ' . CoreValue::count());
        $this->command->info('   - Logo Identities: ' . LogoIdentity::count());
        $this->command->info('   - Color Palette: ' . ColorPalette::count());
        $this->command->info('   - Typography: ' . Typography::count());
        $this->command->info('   - Visual Styles: ' . VisualStyle::count());
        $this->command->info('   - Strategy Applications: ' . StrategyApplication::count());
    }
}
