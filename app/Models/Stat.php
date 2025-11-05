<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Stat extends Model {
    protected $fillable = ['locale', 'number', 'label', 'order', 'is_active'];
    protected $casts = ['is_active' => 'boolean', 'order' => 'integer'];
    public function scopeActive($query) { return $query->where('is_active', true); }
    public function scopeForLocale($query, $locale) { return $query->where('locale', $locale); }
    public function scopeOrdered($query) { return $query->orderBy('order'); }
}
