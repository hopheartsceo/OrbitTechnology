<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPageTranslation extends Model
{
    protected $fillable = [
        'locale',
        'site_title',
        'site_description',
        'nav_home',
        'nav_services',
        'nav_pricing',
        'nav_contact',
        'nav_login',
        'footer_copyright',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }
}
