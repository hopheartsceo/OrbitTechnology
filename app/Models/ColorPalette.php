<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorPalette extends Model
{
    protected $fillable = [
        'locale',
        'section_title',
        'description',
        'color_name',
        'hex_code',
        'rgb_value',
        'usage_context',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
