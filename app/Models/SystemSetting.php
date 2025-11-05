<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'description',
        'is_active',
    ];

    protected $casts = [
        'value' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get active settings
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get settings by group
     */
    public function scopeInGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    /**
     * Get a setting value by key
     */
    public static function getSetting($key, $default = null)
    {
        $setting = static::where('key', $key)
            ->where('is_active', true)
            ->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key
     */
    public static function setSetting($key, $value, $group = 'general', $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'description' => $description,
                'is_active' => true,
            ]
        );
    }

    /**
     * Get all settings in a group
     */
    public static function getGroupSettings($group)
    {
        return static::where('group', $group)
            ->where('is_active', true)
            ->get()
            ->pluck('value', 'key')
            ->toArray();
    }
}
