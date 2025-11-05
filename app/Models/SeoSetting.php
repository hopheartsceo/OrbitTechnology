<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'locale',
        'page',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_site',
        'structured_data',
        'robots',
        'is_active',
    ];

    protected $casts = [
        'structured_data' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get active SEO settings
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get SEO settings by locale
     */
    public function scopeForLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }

    /**
     * Scope to get SEO settings by page
     */
    public function scopeForPage($query, $page)
    {
        return $query->where('page', $page);
    }

    /**
     * Get SEO settings for a specific page and locale
     */
    public static function getForPage($page, $locale = 'en')
    {
        return static::where('page', $page)
            ->where('locale', $locale)
            ->where('is_active', true)
            ->first();
    }

    /**
     * Get structured data as JSON-LD script
     */
    public function getStructuredDataScriptAttribute()
    {
        if (!$this->structured_data) {
            return null;
        }

        return '<script type="application/ld+json">' . json_encode($this->structured_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    }
}
