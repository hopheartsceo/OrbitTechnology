# Quick Reference: Settings Management

## Access Points

### Admin Panel URLs
- System Settings: `http://localhost:8000/admin/system-settings`
- SEO Settings: `http://localhost:8000/admin/seo-settings`
- Dashboard: `http://localhost:8000/admin`

### Login Credentials
- Email: `info@ot.com.sa`
- Password: `password`

---

## System Settings - Default Keys

| Key | Group | Purpose |
|-----|-------|---------|
| `site_name` | general | Website name (EN/AR) |
| `maintenance_mode` | general | Enable maintenance mode |
| `contact_email` | general | Primary contact email |
| `google_analytics` | analytics | Google Analytics tracking ID |
| `facebook_pixel` | analytics | Facebook Pixel ID |
| `social_facebook` | social | Facebook page URL |
| `social_twitter` | social | Twitter profile URL |
| `social_linkedin` | social | LinkedIn company page URL |
| `social_instagram` | social | Instagram profile URL |

---

## SEO Settings - Current Pages

| Locale | Page | Status |
|--------|------|--------|
| `en` | `landing` | ✅ Configured |
| `ar` | `landing` | ✅ Configured |

---

## Code Usage Examples

### Get a System Setting
```php
use App\Models\SystemSetting;

// Get single setting
$siteName = SystemSetting::getSetting('site_name');

// Get with default
$email = SystemSetting::getSetting('contact_email', 'default@example.com');

// Get all settings in a group
$socialSettings = SystemSetting::getGroupSettings('social');
```

### Set a System Setting
```php
SystemSetting::setSetting(
    'new_feature',
    ['enabled' => true, 'value' => 100],
    'general',
    'New feature configuration'
);
```

### Get SEO Settings for a Page
```php
use App\Models\SeoSetting;

// Get SEO for specific page and locale
$seo = SeoSetting::getForPage('landing', 'en');

// Access properties
$metaTitle = $seo->meta_title;
$ogImage = $seo->og_image;

// Get structured data script
$jsonLd = $seo->structured_data_script;
```

### In Blade Templates
```blade
@if($seo)
    <title>{{ $seo->meta_title }}</title>
    <meta name="description" content="{{ $seo->meta_description }}">
    
    @if($seo->structured_data)
        {!! $seo->structured_data_script !!}
    @endif
@endif
```

---

## JSON-LD Structured Data Examples

### Organization Schema
```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Orbit Technology",
  "url": "https://yourdomain.com",
  "logo": "https://yourdomain.com/logo.png",
  "description": "Your company description",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "SA",
    "addressRegion": "Riyadh"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+966-XX-XXX-XXXX",
    "contactType": "customer service",
    "email": "info@ot.com.sa"
  }
}
```

### WebSite Schema
```json
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Orbit Technology",
  "url": "https://yourdomain.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://yourdomain.com/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
```

### LocalBusiness Schema
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Orbit Technology",
  "image": "https://yourdomain.com/logo.png",
  "telephone": "+966-XX-XXX-XXXX",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Your Street",
    "addressLocality": "Riyadh",
    "addressCountry": "SA"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Sunday"],
    "opens": "09:00",
    "closes": "17:00"
  }
}
```

---

## Artisan Commands

### Re-seed Settings
```bash
php artisan db:seed --class=SettingsSeeder
```

### Check Routes
```bash
php artisan route:list --name=filament
```

### Run Migrations
```bash
php artisan migrate
```

### Rollback Last Migration
```bash
php artisan migrate:rollback --step=1
```

---

## File Locations

- **Models**: `app/Models/SystemSetting.php`, `app/Models/SeoSetting.php`
- **Resources**: `app/Filament/Resources/SystemSettingResource.php`, `app/Filament/Resources/SeoSettingResource.php`
- **Migrations**: `database/migrations/2025_11_05_140000_*.php`
- **Seeder**: `database/seeders/SettingsSeeder.php`
- **Controller**: `app/Http/Controllers/LandingPageController.php`
- **View**: `resources/views/landing.blade.php`

---

## Testing SEO

### View Page Source
1. Visit: `http://localhost:8000/en` or `http://localhost:8000/ar`
2. Right-click → View Page Source
3. Check `<head>` section for:
   - `<title>` tag
   - `<meta name="description">` tag
   - `<meta property="og:*">` tags (Open Graph)
   - `<meta name="twitter:*">` tags (Twitter Card)
   - `<script type="application/ld+json">` (Structured Data)

### Validate Structured Data
- Use Google's Rich Results Test: https://search.google.com/test/rich-results
- Paste your page URL or HTML code

### Test Open Graph
- Use Facebook Sharing Debugger: https://developers.facebook.com/tools/debug/
- Paste your page URL to see OG preview

### Test Twitter Cards
- Use Twitter Card Validator: https://cards-dev.twitter.com/validator
- Paste your page URL to see card preview

---

## Common Tasks

### Add New System Setting
1. Go to `/admin/system-settings`
2. Click "New System Setting"
3. Fill form:
   - Key: `my_custom_setting`
   - Group: Select appropriate group
   - Value: Add key-value pairs
   - Description: Explain the setting
   - Active: Toggle on
4. Save

### Add SEO for New Page
1. Go to `/admin/seo-settings`
2. Click "New SEO Setting"
3. Fill form:
   - Locale: `en` or `ar`
   - Page: `about` (your page identifier)
   - Fill all tabs (Meta Tags, Open Graph, Twitter Card, Structured Data)
4. Save
5. Repeat for other locale if needed

### Update Social Media Links
1. Go to `/admin/system-settings`
2. Find settings with keys starting with `social_*`
3. Click edit icon
4. Update URL in value field
5. Save

---

**Pro Tip**: Use the KeyValue component for system settings to store multiple related properties in a single setting. For example:

```
Key: email_smtp
Value:
  - host: smtp.gmail.com
  - port: 587
  - encryption: tls
  - username: your@email.com
```

This keeps related settings organized and easy to manage!
