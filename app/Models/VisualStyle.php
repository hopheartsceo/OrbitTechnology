<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisualStyle extends Model
{
    protected $fillable = [
        'locale',
        'section_title',
        'description',
        'style_elements',
        'mockup_image_url',
        'is_active',
        'order',
    ];

    protected $casts = [
        'style_elements' => 'array',
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
