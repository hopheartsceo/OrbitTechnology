<?php

return [
    'navigation' => [
        'landing_page' => 'Landing Page',
        'content' => 'Content Management',
        'settings' => 'Settings',
        'customers' => 'Customers & Partners',
    ],

    'resources' => [
        'landing_page_translation' => 'Page Translations',
        'hero_section' => 'Hero Section',
        'hero_sections' => 'Hero Sections',
        'about_section' => 'About Section',
        'mission_vision' => 'Mission & Vision',
        'core_value' => 'Core Value',
        'core_values' => 'Core Values',
        'feature' => 'Features',
        'service' => 'Service',
        'services' => 'Services',
        'pricing_tier' => 'Pricing Tiers',
        'stat' => 'Statistics',
        'sector' => 'Sectors',
        'trust_badge' => 'Trust Badge',
        'trust_badges' => 'Trust Badges',
        'contact_info' => 'Contact Information',
        'customer' => 'Customer',
        'customers' => 'Customers',
        'system_setting' => 'System Settings',
        'seo_setting' => 'SEO Settings',
    ],

    'fields' => [
        'locale' => 'Language',
        'locale_en' => '🇬🇧 English',
        'locale_ar' => '🇸🇦 Arabic',
        'is_active' => 'Active',
        'order' => 'Display Order',
        'created_at' => 'Created',
        'updated_at' => 'Last Updated',
        'description' => 'Description',
        'title' => 'Title',
        'subtitle' => 'Subtitle',
        'icon' => 'Icon',
        'image' => 'Image',
        'logo' => 'Logo',
        'name' => 'Name',
        'text' => 'Text',
        'value' => 'Value',
        'status' => 'Status',
        'website_url' => 'Website URL',
        'featured' => 'Featured',
        'mission' => 'Mission',
        'vision' => 'Vision',
    ],

    'helpers' => [
        'order' => 'Lower numbers appear first',
        'is_active' => 'Show this item on the website',
        'locale' => 'Select the language for this content',
        'featured' => 'Show this item in featured sections',
        'icon_format' => 'Use Font Awesome icon classes (e.g., fa-star, fa-rocket)',
        'url_format' => 'Full URL or anchor link (e.g., #contact)',
        'image_optimization' => 'Images will be automatically optimized on upload',
    ],

    'placeholders' => [
        'title' => 'Enter a compelling title',
        'subtitle' => 'Enter a descriptive subtitle',
        'description' => 'Provide detailed description',
        'icon' => 'fa-star',
        'url' => 'https://example.com',
        'anchor' => '#section',
        'name' => 'Enter name',
        'text' => 'Enter text content',
    ],

    'actions' => [
        'activate' => 'Activate',
        'deactivate' => 'Deactivate',
        'optimize_logo' => 'Optimize Logo',
    ],

    'labels' => [
        'headline' => 'Headline',
        'subheadline' => 'Subheadline',
        'primary_button' => 'Primary Button',
        'secondary_button' => 'Secondary Button',
        'button_text' => 'Button Text',
        'button_url' => 'Button URL',
        'language' => 'Language',
        'active_status' => 'Active Status',
        'last_updated' => 'Last Updated',
    ],

    'landing_translation' => [
        'site_title' => 'Site Title',
        'site_description' => 'Site Description',
        'nav_home' => 'Navigation: Home',
        'nav_features' => 'Navigation: Features',
        'nav_services' => 'Navigation: Services',
        'nav_pricing' => 'Navigation: Pricing',
        'nav_contact' => 'Navigation: Contact',
        'footer_rights' => 'Footer: Rights',
        'footer_privacy' => 'Footer: Privacy',
        'footer_terms' => 'Footer: Terms',
    ],

    'hero' => [
        'title' => 'Hero Title',
        'subtitle' => 'Hero Subtitle',
        'primary_button_text' => 'Primary Button Text',
        'primary_button_url' => 'Primary Button URL',
        'secondary_button_text' => 'Secondary Button Text',
        'secondary_button_url' => 'Secondary Button URL',
    ],

    'feature' => [
        'icon' => 'Feature Icon',
        'title' => 'Feature Title',
        'description' => 'Feature Description',
    ],

    'service' => [
        'icon' => 'Service Icon',
        'title' => 'Service Title',
        'description' => 'Service Description',
    ],

    'pricing' => [
        'tier_name' => 'Tier Name',
        'price' => 'Price',
        'per_message_text' => 'Per Message Text',
        'features' => 'Features',
        'is_popular' => 'Popular Tier',
    ],

    'stat' => [
        'number' => 'Number',
        'label' => 'Label',
    ],

    'sector' => [
        'name' => 'Sector Name',
    ],

    'trust_badge' => [
        'icon' => 'Badge Icon',
        'text' => 'Badge Text',
    ],

    'contact' => [
        'type' => 'Contact Type',
        'title' => 'Contact Title',
        'value' => 'Contact Value',
        'icon' => 'Contact Icon',
        'type_labels' => [
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
        ],
    ],

    'system_setting' => [
        'key' => 'Setting Key',
        'value' => 'Setting Value',
        'group' => 'Group',
        'description' => 'Description',
        'groups' => [
            'general' => 'General',
            'analytics' => 'Analytics',
            'social' => 'Social Media',
            'email' => 'Email',
            'api' => 'API',
            'security' => 'Security',
        ],
        'key_helper' => 'Unique identifier for this setting (e.g., site_name, maintenance_mode)',
        'property' => 'Property',
    ],

    'seo' => [
        'page' => 'Page',
        'page_helper' => 'Page identifier (e.g., landing, about, contact)',
        'meta_title' => 'Meta Title',
        'meta_title_helper' => 'Recommended: 50-60 characters',
        'meta_description' => 'Meta Description',
        'meta_description_helper' => 'Recommended: 150-160 characters',
        'meta_keywords' => 'Meta Keywords',
        'meta_keywords_helper' => 'Comma-separated keywords',
        'canonical_url' => 'Canonical URL',
        'robots' => 'Robots',
        'robots_options' => [
            'index_follow' => 'Index, Follow',
            'noindex_follow' => 'No Index, Follow',
            'index_nofollow' => 'Index, No Follow',
            'noindex_nofollow' => 'No Index, No Follow',
        ],
        'og_title' => 'OG Title',
        'og_title_helper' => 'Title for Facebook/LinkedIn sharing',
        'og_description' => 'OG Description',
        'og_description_helper' => 'Description for social media sharing',
        'og_image' => 'OG Image URL',
        'og_image_helper' => 'Recommended: 1200x630px',
        'og_type' => 'OG Type',
        'og_type_options' => [
            'website' => 'Website',
            'article' => 'Article',
            'product' => 'Product',
        ],
        'twitter_card' => 'Card Type',
        'twitter_card_options' => [
            'summary' => 'Summary',
            'summary_large_image' => 'Summary Large Image',
            'app' => 'App',
            'player' => 'Player',
        ],
        'twitter_site' => 'Twitter Site',
        'twitter_site_helper' => 'Your Twitter username (e.g., @username)',
        'twitter_title' => 'Twitter Title',
        'twitter_description' => 'Twitter Description',
        'twitter_image' => 'Twitter Image URL',
        'twitter_image_helper' => 'Recommended: 1200x600px',
        'structured_data' => 'JSON-LD Structured Data',
        'structured_data_helper' => 'Enter valid JSON-LD schema (e.g., Organization, WebSite, LocalBusiness)',
    ],

    'sections' => [
        'page_info' => 'Page Information',
        'setting_info' => 'Setting Information',
        'seo_content' => 'SEO Content',
        'content' => 'Content',
        'basic_info' => 'Basic Information',
    ],

    'tabs' => [
        'meta_tags' => 'Meta Tags',
        'open_graph' => 'Open Graph',
        'twitter_card' => 'Twitter Card',
        'structured_data' => 'Structured Data',
    ],

    'columns' => [
        'language' => 'Language',
        'last_updated' => 'Last Updated',
        'key' => 'Key',
        'meta_title' => 'Meta Title',
    ],

    'filters' => [
        'status' => 'Status',
        'all_settings' => 'All settings',
        'active_only' => 'Active only',
        'inactive_only' => 'Inactive only',
    ],

    'languages' => [
        'en' => 'English',
        'ar' => 'Arabic',
    ],
];
