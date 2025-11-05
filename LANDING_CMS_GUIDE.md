# Landing Page CMS - Admin Guide

## 🎯 Overview

You now have a complete Content Management System (CMS) for your landing page with **Laravel Filament**!

## 🔐 Access

- **URL**: `http://localhost:8000/admin`
- **Email**: `info@ot.com.sa`
- **Password**: (the one you entered during setup)

## 📚 What's Available

Your Filament admin panel now has 9 resource sections to manage all landing page content:

### 1. **Landing Page Translations**
- Site title and description
- Navigation menu labels (Home, Services, Pricing, Contact, Login)
- Footer copyright text
- **Locale**: `ar` or `en`

### 2. **Hero Sections**
- Main title and subtitle
- Primary and secondary buttons (text + URLs)
- Order and active status
- **Supports both AR/EN**

### 3. **Features** (Why Choose Us)
- Icon (FontAwesome class, e.g., `fa-solid fa-rocket`)
- Title and description
- Order and active status
- **Multilingual**

### 4. **Services**
- Icon (FontAwesome class)
- Title and description
- Order and active status
- **Multilingual**

### 5. **Pricing Tiers**
- Tier name (e.g., "1 - 1,000 messages")
- Price per message
- Featured flag (for highlighting)
- Order and active status
- **Multilingual**

### 6. **Stats** (Our Trusted Customers)
- Number (e.g., "500+", "99.9%")
- Label
- Order and active status
- **Multilingual**

### 7. **Sectors** (Customer Industries)
- Sector name (e.g., "Government", "Healthcare")
- Order and active status
- **Multilingual**

### 8. **Trust Badges** (Certifications)
- Icon (FontAwesome)
- Text (supports line breaks)
- Order and active status
- **Multilingual**

### 9. **Contact Info**
- Type: `phone`, `email`, `whatsapp`
- Icon, title, value
- Link (tel:, mailto:, https://wa.me/)
- Order and active status
- **Multilingual**

## 🎨 Features

- ✅ **Bilingual Support**: All content supports Arabic (ar) and English (en)
- ✅ **Drag & Drop Ordering**: Use the `order` field to sort items
- ✅ **Active/Inactive**: Toggle visibility without deleting
- ✅ **FontAwesome Icons**: Easy icon selection (use full class name)
- ✅ **Auto-generated Forms**: Filament creates beautiful forms automatically
- ✅ **Search & Filters**: Built-in search and locale filtering
- ✅ **Responsive**: Admin panel works on mobile and desktop

## 🚀 Next Steps

### 1. **Update the Landing Page Controller**

The controller needs to fetch data from the database instead of hardcoded arrays. 

**File**: `app/Http/Controllers/LandingController.php` (or your routes file)

**Example**:
```php
use App\Models\{LandingPageTranslation, HeroSection, Feature, Service, PricingTier, Stat, Sector, TrustBadge, ContactInfo};

public function index($locale = 'en')
{
    $translations = LandingPageTranslation::forLocale($locale)->active()->first();
    $hero = HeroSection::forLocale($locale)->active()->ordered()->first();
    $features = Feature::forLocale($locale)->active()->ordered()->get();
    $services = Service::forLocale($locale)->active()->ordered()->get();
    $pricing = PricingTier::forLocale($locale)->active()->ordered()->get();
    $stats = Stat::forLocale($locale)->active()->ordered()->get();
    $sectors = Sector::forLocale($locale)->active()->ordered()->get();
    $trustBadges = TrustBadge::forLocale($locale)->active()->ordered()->get();
    $contactInfos = ContactInfo::forLocale($locale)->active()->ordered()->get();

    return view('landing', compact(
        'translations', 'hero', 'features', 'services', 
        'pricing', 'stats', 'sectors', 'trustBadges', 'contactInfos', 'locale'
    ));
}
```

### 2. **Seed Initial Data**

Create seeders to populate initial content:

```bash
php artisan make:seeder LandingPageSeeder
```

### 3. **Update Blade Template**

Modify `landing.blade.php` to use database content:

```blade
{{-- Example for hero section --}}
<h1>{{ $hero->title }}</h1>
<p>{{ $hero->subtitle }}</p>

{{-- Example for features --}}
@foreach($features as $feature)
    <div class="feature-item">
        <i class="{{ $feature->icon }}"></i>
        <h3>{{ $feature->title }}</h3>
        <p>{{ $feature->description }}</p>
    </div>
@endforeach
```

## 🎯 Filament Enhancements (Optional)

You can further customize the Filament resources:

1. **Add locale tabs** for easier switching
2. **Add rich text editor** for descriptions
3. **Add image upload** for custom graphics
4. **Add bulk actions** for quick management
5. **Add custom navigation groups** to organize sections

## 📝 Database Structure

All tables follow this pattern:
- `id`: Primary key
- `locale`: Language code (ar/en)
- Content fields (title, description, etc.)
- `order`: Display order
- `is_active`: Visibility toggle
- `created_at`, `updated_at`: Timestamps

## 🔒 Security

- Admin panel is protected by Laravel authentication
- Only authenticated users can access `/admin`
- Add more users with: `php artisan make:filament-user`

## 🛠️ Commands

```bash
# Create new admin user
php artisan make:filament-user

# Clear Filament cache
php artisan filament:optimize-clear

# Publish Filament config (for customization)
php artisan vendor:publish --tag=filament-config
```

## 🎨 Icon Reference

Use FontAwesome 6 icons in your content:

- Rocket: `fa-solid fa-rocket`
- Shield: `fa-solid fa-shield-halved`
- Phone: `fa-solid fa-phone`
- Email: `fa-solid fa-envelope`
- WhatsApp: `fa-brands fa-whatsapp`
- Message: `fa-solid fa-message`
- Check: `fa-solid fa-check`
- Star: `fa-solid fa-star`

Full list: https://fontawesome.com/icons

---

**✨ Your landing page CMS is ready to use!**
