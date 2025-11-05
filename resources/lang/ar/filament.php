<?php

return [
    'navigation' => [
        'landing_page' => 'الصفحة الرئيسية',
        'settings' => 'الإعدادات',
    ],

    'resources' => [
        'landing_page_translation' => 'ترجمات الصفحة',
        'hero_section' => 'قسم البطل',
        'feature' => 'المميزات',
        'service' => 'الخدمات',
        'pricing_tier' => 'خطط الأسعار',
        'stat' => 'الإحصائيات',
        'sector' => 'القطاعات',
        'trust_badge' => 'شارات الثقة',
        'contact_info' => 'معلومات الاتصال',
        'system_setting' => 'إعدادات النظام',
        'seo_setting' => 'إعدادات SEO',
    ],

    'fields' => [
        'locale' => 'اللغة',
        'is_active' => 'نشط',
        'order' => 'الترتيب',
        'created_at' => 'تاريخ الإنشاء',
        'updated_at' => 'تاريخ التحديث',
        'description' => 'الوصف',
        'title' => 'العنوان',
        'subtitle' => 'العنوان الفرعي',
        'icon' => 'الأيقونة',
        'name' => 'الاسم',
        'text' => 'النص',
        'value' => 'القيمة',
        'status' => 'الحالة',
    ],

    'landing_translation' => [
        'site_title' => 'عنوان الموقع',
        'site_description' => 'وصف الموقع',
        'nav_home' => 'التنقل: الرئيسية',
        'nav_features' => 'التنقل: المميزات',
        'nav_services' => 'التنقل: الخدمات',
        'nav_pricing' => 'التنقل: الأسعار',
        'nav_contact' => 'التنقل: اتصل بنا',
        'footer_rights' => 'التذييل: الحقوق',
        'footer_privacy' => 'التذييل: الخصوصية',
        'footer_terms' => 'التذييل: الشروط',
    ],

    'hero' => [
        'title' => 'عنوان البطل',
        'subtitle' => 'العنوان الفرعي',
        'primary_button_text' => 'نص الزر الأساسي',
        'primary_button_url' => 'رابط الزر الأساسي',
        'secondary_button_text' => 'نص الزر الثانوي',
        'secondary_button_url' => 'رابط الزر الثانوي',
    ],

    'feature' => [
        'icon' => 'أيقونة الميزة',
        'title' => 'عنوان الميزة',
        'description' => 'وصف الميزة',
    ],

    'service' => [
        'icon' => 'أيقونة الخدمة',
        'title' => 'عنوان الخدمة',
        'description' => 'وصف الخدمة',
    ],

    'pricing' => [
        'tier_name' => 'اسم الخطة',
        'price' => 'السعر',
        'per_message_text' => 'نص لكل رسالة',
        'features' => 'المميزات',
        'is_popular' => 'خطة شائعة',
    ],

    'stat' => [
        'number' => 'الرقم',
        'label' => 'التسمية',
    ],

    'sector' => [
        'name' => 'اسم القطاع',
    ],

    'trust_badge' => [
        'icon' => 'أيقونة الشارة',
        'text' => 'نص الشارة',
    ],

    'contact' => [
        'type' => 'نوع الاتصال',
        'title' => 'عنوان الاتصال',
        'value' => 'قيمة الاتصال',
        'icon' => 'أيقونة الاتصال',
        'type_labels' => [
            'email' => 'البريد الإلكتروني',
            'phone' => 'الهاتف',
            'address' => 'العنوان',
        ],
    ],

    'system_setting' => [
        'key' => 'مفتاح الإعداد',
        'value' => 'قيمة الإعداد',
        'group' => 'المجموعة',
        'description' => 'الوصف',
        'groups' => [
            'general' => 'عام',
            'analytics' => 'التحليلات',
            'social' => 'وسائل التواصل',
            'email' => 'البريد الإلكتروني',
            'api' => 'API',
            'security' => 'الأمان',
        ],
        'key_helper' => 'معرف فريد لهذا الإعداد (مثال: site_name، maintenance_mode)',
        'property' => 'الخاصية',
    ],

    'seo' => [
        'page' => 'الصفحة',
        'page_helper' => 'معرف الصفحة (مثال: landing، about، contact)',
        'meta_title' => 'عنوان Meta',
        'meta_title_helper' => 'موصى به: 50-60 حرف',
        'meta_description' => 'وصف Meta',
        'meta_description_helper' => 'موصى به: 150-160 حرف',
        'meta_keywords' => 'كلمات Meta الرئيسية',
        'meta_keywords_helper' => 'كلمات مفصولة بفواصل',
        'canonical_url' => 'الرابط الأساسي',
        'robots' => 'Robots',
        'robots_options' => [
            'index_follow' => 'فهرسة، متابعة',
            'noindex_follow' => 'عدم فهرسة، متابعة',
            'index_nofollow' => 'فهرسة، عدم متابعة',
            'noindex_nofollow' => 'عدم فهرسة، عدم متابعة',
        ],
        'og_title' => 'عنوان OG',
        'og_title_helper' => 'عنوان للمشاركة على فيسبوك/لينكد إن',
        'og_description' => 'وصف OG',
        'og_description_helper' => 'وصف لمشاركة وسائل التواصل الاجتماعي',
        'og_image' => 'رابط صورة OG',
        'og_image_helper' => 'موصى به: 1200x630 بكسل',
        'og_type' => 'نوع OG',
        'og_type_options' => [
            'website' => 'موقع ويب',
            'article' => 'مقالة',
            'product' => 'منتج',
        ],
        'twitter_card' => 'نوع البطاقة',
        'twitter_card_options' => [
            'summary' => 'ملخص',
            'summary_large_image' => 'ملخص صورة كبيرة',
            'app' => 'تطبيق',
            'player' => 'مشغل',
        ],
        'twitter_site' => 'موقع تويتر',
        'twitter_site_helper' => 'اسم المستخدم على تويتر (مثال: @username)',
        'twitter_title' => 'عنوان تويتر',
        'twitter_description' => 'وصف تويتر',
        'twitter_image' => 'رابط صورة تويتر',
        'twitter_image_helper' => 'موصى به: 1200x600 بكسل',
        'structured_data' => 'بيانات JSON-LD المنظمة',
        'structured_data_helper' => 'أدخل مخطط JSON-LD صالح (مثال: Organization، WebSite، LocalBusiness)',
    ],

    'sections' => [
        'page_info' => 'معلومات الصفحة',
        'setting_info' => 'معلومات الإعداد',
        'seo_content' => 'محتوى SEO',
        'content' => 'المحتوى',
        'basic_info' => 'المعلومات الأساسية',
    ],

    'tabs' => [
        'meta_tags' => 'علامات Meta',
        'open_graph' => 'Open Graph',
        'twitter_card' => 'بطاقة تويتر',
        'structured_data' => 'البيانات المنظمة',
    ],

    'columns' => [
        'language' => 'اللغة',
        'last_updated' => 'آخر تحديث',
        'key' => 'المفتاح',
        'meta_title' => 'عنوان Meta',
    ],

    'filters' => [
        'status' => 'الحالة',
        'all_settings' => 'كل الإعدادات',
        'active_only' => 'النشطة فقط',
        'inactive_only' => 'غير النشطة فقط',
    ],

    'languages' => [
        'en' => 'الإنجليزية',
        'ar' => 'العربية',
    ],
];
