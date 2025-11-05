<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingTier extends Model
{
    protected $fillable = ['locale', 'tier_name', 'price', 'per_message_text', 'is_featured', 'order', 'is_active'];
    protected $casts = ['price' => 'decimal:2', 'is_featured' => 'boolean', 'is_active' => 'boolean', 'order' => 'integer'];
    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeForLocale($query, $locale) { return $query->where('locale', $locale); }
    public function scopeOrdered($query) { return $query->orderBy('order'); }
    public function scopeFeatured($query) { return $query->where('is_featured', true); }
}
