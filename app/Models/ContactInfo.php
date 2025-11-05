<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContactInfo extends Model {
    protected $fillable = ['locale', 'type', 'icon', 'title', 'value', 'link', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];
    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeForLocale($query, $locale) { return $query->where('locale', $locale); }
    public function scopeOrdered($query) { return $query->orderBy('order'); }
    public function scopeOfType($query, $type) { return $query->where('type', $type); }
}
