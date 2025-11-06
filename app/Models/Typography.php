<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typography extends Model
{
    protected $fillable = [
        'locale',
        'section_title',
        'description',
        'font_category',
        'font_name',
        'font_weights',
        'usage_context',
        'is_active',
        'order',
    ];

    protected $casts = [
        'font_weights' => 'array',
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
