<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogoIdentity extends Model
{
    protected $fillable = [
        'locale',
        'section_title',
        'description',
        'primary_logo_url',
        'symbol_logo_url',
        'usage_rules',
        'is_active',
    ];

    protected $casts = [
        'usage_rules' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }
}
